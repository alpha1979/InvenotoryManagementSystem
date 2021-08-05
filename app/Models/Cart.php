<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable =[];

    public function products(){
        return $this->morphToMany(Product::class,'productable')->withPivot('quantity');
    }
}