<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'custumer_id',
        'shoping_order_id',
        'product_id',
        'pyment_id',
    ];
    /*
    *::::::::::::::::::Relacion de N a 1 :::::::::::::
    */
    public function Custumer(){
        return $this->belongsTo(Custumer::class);
    }
    public function Shoping_order(){
        return $this->belongsTo(Shoping_order::class);
    }
    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function Pyment(){
        return $this->belongsTo(Pyment::class);
    }
}
