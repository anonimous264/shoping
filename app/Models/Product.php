<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'custumer_id',
        'name',
    ];
    /*
    *:::::::::::::Relacion de N a 1 :::::::::::::
    */
    public function Custumer(){
        return $this->belongsTo(Custumer::class);
    }
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    /*
    *:::::::::::::Relacion 1 a N::::::
    */
    public function Transaction_Report(){
        return $this->hasMany(Transaction_Report::class);
    }
}
