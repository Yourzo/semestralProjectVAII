<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Friendship extends Model
{
    protected $fillable = ['user_id1', 'user_id2'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id1');
    }

    public function friend(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id2');
    }

    public static function getFriends($id)
    {
        $friends = Friendship::where('user_id1', $id)
            ->orWhere('user_id2', $id)
            ->with(['user', 'friend'])
            ->get()
            ->map(function ($friendship) use ($id) {
                return $friendship->user_id1 == $id
                    ? $friendship->friend
                    : $friendship->user;
            });
        return $friends;
    }
}
