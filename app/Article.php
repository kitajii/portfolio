<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [
        'id'
    ];

    public static $rules = [
        'weather_id' => 'required', 'size' => 'required'
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function weathers() {
        return $this->hasOne('App\Weather');
    }
    
}