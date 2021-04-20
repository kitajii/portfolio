<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function detail()
    {
        return view('article.detail');
    }
    
    public function edit()
    {
        return view('article.edit');
    }
    public function update()
    {
        return view('article.detail');
    }
}