<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purcharse extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'purcharseDate',
        'purcharsePrice',
        'purcharseType',
    ];

    //Relación de muchos a muchos
    public function products (){
        return $this->belongsToMany('App\Models\Product');
    }

    //Relacion de uno a muchos
    public function user (){
        return $this->belongsTo('App\Models\User');
    }
}
