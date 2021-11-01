<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','image','icon'];

    //relación uno a muchos
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    //relacion muchos a muchos
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    //relacion de uno a muchos a tra vez de
    public function products(){
        return $this->hasManyThrough(Product::class,Subcategory::class);
    }
}
