<?php

namespace App\Models;

use App\Models\Cellar;
use App\Models\Comment;
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

    /**
     * Une bouteille peut appartenir à plusieurs celliers
     */
    public function cellars()
    {
        return $this->belongsToMany(Cellar::class);
    }

    /**
     * Une bouteille peut avoir une note
     */
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
}
