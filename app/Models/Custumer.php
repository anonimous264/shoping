<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custumer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
    ];
    /*
    *:::::::::::::::::::::::::Relacion de 1 a N :::::::::::::::::::::::::::
    */
    public function Category(){
        return $this->hasMany(Category::class);
    }
    public function Product(){
        return $this->hasMany(Product::class);
    }
    public function Shoping_Order(){
        return $this->hasMany(Shoping_Order::class);
    }
    public function Delivery(){
        return $this->hasMany(Delivery::class);
    }
    public function Pyment(){
        return $this->hasMany(Pyment::class);
    }
    public function Transaction_Report(){
        return $this->hasMany(Transaction_Report::class);
    }
}
