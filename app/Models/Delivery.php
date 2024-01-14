<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'custumer_id',
        'date',
    ];
    /*
    *::::::::::::Relacion de N a 1 :::::::::::
    */
    public  function Custumer(){
        return $this->belongsTo(Custumer::class);
    }
}
