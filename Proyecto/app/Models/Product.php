<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'productName',
        'productPrice',
        'ProductDescription',
        'productQualication',
        'image'
        
    ];

    //Relación de muchos a muchos
    public function purcharses (){
        return $this->belongsToMany('App\Models\Purcharse');
    }
}
