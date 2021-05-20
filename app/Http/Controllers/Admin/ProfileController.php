<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Article;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    
    public function mypage()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.mypage',['admin' => $admin]);
    }
    
    public function detail(Request $request)
    {
        $profile = Profile::find($request->id); //idからレコードを取得
        if(empty($profile)){
            abort(404);
        }
        //リクエストのuser_idとArticleのuser_idが一致する記事のみを取得
        $articles = Article::where('user_id', $request->id)->get()->sortByDesc('created_at');
        
        return view('admin.profile.detail',['profile' => $profile, 'articles' => $articles]);
    }
    
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id); //idからレコードを取得
        if(empty($profile)){
            abort(404);
        }
        return view('admin.profile.edit',['profile' => $profile]);
    }
    
    public function update(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $new_profile = $request->all();
        
        if (isset($new_profile['icon_path'])) {
            $path = Storage::disk('s3')->putFile('/images/icon',$form['icon_path'],'public');
            $profile->image_path = Storage::disk('s3')->url($path);
        } else {
            $profile->icon_path = $profile->icon_path;
        }

        unset($new_profile['icon_path']);
        unset($new_profile['_token']);

        $profile->fill($new_profile)->save();
    
        return redirect(route('profile_detail',['id' => $profile->id]));
    }
}