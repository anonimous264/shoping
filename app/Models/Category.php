<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'custumer_id',
        'name',
        'type',
    ];
    /*
    *:::::::::::::::Relacion de N a 1 :::::::::::::::::::::::
    */
    public function Custumer(){
        return $this->belongsTo(Custumer::class);
    }
}
