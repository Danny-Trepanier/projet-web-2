<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottleCellar extends Model
{
    use HasFactory;

    protected $table = "bottles_cellars";

    protected $fillable = [
        'bottle_id',
        'cellar_id',
    ];
}
