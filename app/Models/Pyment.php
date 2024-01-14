<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pyment extends Model
{
    use HasFactory;
    protected $fillable = [
        'custumer_id',
        'date',
    ];
    /*
    *:::::::::::::Relacion N a 1::::::
    */
    public function Custumer(){
        return $this->belongsTo(Custumer::class);
    }
    /*
    *:::::::::::::Relacion 1 a N::::::
    */
    public function Transaction_Report(){
        return $this->hasMany(Transaction_Report::class);
    }
}
