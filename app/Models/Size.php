<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name','products_id'];

    //relacion uno a muchos inversa
    public function product(){
        return $this->belongsTo(Product::class);
    }
    //relacion muchos a muchos
    public function colors(){
        return $this->belongsTo(Color::class);
    }
}
