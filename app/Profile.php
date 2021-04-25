<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [
        'id'
    ];

    public static $rules = [
        'name' => 'required',
        'age' => 'required',
        'experience' => 'required'
    ];
    
    public function users() {
        return $this->belongsTo('App\User');
    }
}