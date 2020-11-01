<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challan extends Model
{
    protected $table = 'challans';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','fee','user_id','priority','concession',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
