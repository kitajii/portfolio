<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [
        'id','user_id'
    ];

    public static $rules = [
        'name' => 'required'
    ];
    
    public function users() {
        return $this->hasOne('App\User'); //プロフィールに対して作成者は1
    }
}