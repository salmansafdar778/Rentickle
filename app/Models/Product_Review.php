<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Review extends Model
{
    protected $table = 'product_reviews';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rating','review','product_id',
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
