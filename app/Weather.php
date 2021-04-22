<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $guarded = [
        'id'
    ];

    public function articles() {
        return $this->hasOne('App\Article');
    }
}