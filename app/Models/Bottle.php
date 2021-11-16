<?php

namespace App\Models;

use App\Models\Cellar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bottle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'ml_quantity',
        'country',
        'code',
        'price',
        'image_link',
    ];

    public function cellars()
    {
        return $this->belongsToMany(Cellar::class, 'bottles_cellars');
    }
}
