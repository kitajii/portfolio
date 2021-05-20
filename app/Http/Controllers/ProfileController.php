<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Article;

class ProfileController extends Controller
{
    public function detail(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::find($request->id); //idからレコードを取得
        if(empty($profile)){
            abort(404);
        }
        //リクエストのuser_idとArticleのuser_idが一致する記事のみを取得
        $articles = Article::where('user_id', $request->id)->get()->sortByDesc('created_at');

        return view('profile.detail',['profile' => $profile, 'user' => $user, 'articles' => $articles]);
    }
    
    public function edit(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::find($request->id); //idからレコードを取得
        if(empty($profile)){
            abort(404);
        }
        return view('profile.edit',['profile' => $profile, 'user' => $user]);
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
        
        $user['name'] = $new_profile['name'];
        $user->save();
        
        return redirect(route('profile_detail',['id' => $profile->id]));
    }
}