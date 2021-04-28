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
        return view('profile.detail',['profile' => $profile, 'user' => $user]);
    }
    
    public function edit(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::find($request->id); //idからレコードを取得
        if(empty($profile)){
            abort(404);
        }
        return view('profile.edit',['profile'=>$profile, 'user'=>$user]);
    }
    
    public function update(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $new_profile = $request->all();
        
        if (isset($new_profile['icon_path'])) {
            $path = $request->file('icon_path')->store('public/images/icon');
            $profile->icon_path = basename($path);
        } else {
            $profile->icon_path = $profile->icon_path;
        }

        unset($new_profile['icon_path']);
        unset($new_profile['_token']);

        $profile->fill($new_profile)->save();
        
        return view('profile.detail',['profile'=>$profile, 'user'=>$user]);
    }
}