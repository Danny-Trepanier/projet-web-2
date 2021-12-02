<?php

namespace App\Models;

use App\Models\Bottle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'bottle_id',
        'user_id',
    ];

    public function bottle()
    {
        return $this->belongsTo(Bottle::class);
    }
}
