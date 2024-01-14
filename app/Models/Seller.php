<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'name',
    ];
    /*
    *::::::Relacion de N a 1::::::::
    */
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
