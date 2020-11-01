<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concession extends Model
{
    protected $table = 'consessions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'priority','concession','user_id','challan_id','isActive',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function concession_challan(){

        return $this->hasOne(\App\Challan::class,'id','challan_id');
        
    }//end of concession challan
}
