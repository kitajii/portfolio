<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [
        'id','user_id'
    ];

    public static $rules = [
        'weather_id' => 'required', 'size' => 'required'
    ];
    
    public function users() {
        return $this->hasOne('App\User'); //記事に対して作成者は1
    }
}