<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Desk extends Model
{
    protected $fillable = ['name', 'description'];
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'users_desks',
            'desk_id',
            'user_id'
        );
    }
}
