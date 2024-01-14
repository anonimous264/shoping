<?php

namespace App\Models;

use App\Models\Custumer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shoping_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'custumer_id',
        'date',
    ];
    /*
    *::::::::::::::1 a N:::::::::::::
    */
    public function Transaction_Report(){
        return $this->hasMany(Transaction_Report::class);
    }
    /*
    *::::::::::::::N a 1:::::::::::::
    */
    public function Custumer(){
        return $this->belongsTo(Custumer::class);
    }
}
