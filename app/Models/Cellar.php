<?php

namespace App\Models;

use App\Models\User;
use App\Models\Bottle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cellar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];


    /**
     * Un cellier appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un cellier peut contenir plusieurs bouteilles
     */
    public function bottles()
    {
        return $this->belongsToMany(Bottle::class);
    }
}
