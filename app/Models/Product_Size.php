<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Size extends Model
{
    protected $table = 'product_sizes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'size','product_id',
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
