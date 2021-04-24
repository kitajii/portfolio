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
        return view('profile.detail',['profile'=>$profile, 'user'=>$user]);
    }
    public function update()
    {
        return view('profile.detail');
    }
}