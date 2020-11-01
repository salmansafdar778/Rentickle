<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generate_Challan extends Model
{
    protected $table = 'generate_challans';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'isActive','concession',
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
