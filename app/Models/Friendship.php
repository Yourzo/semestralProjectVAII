<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Friendship extends Model
{
    public function user(): BelongsTo
        {
        return $this->belongsTo(User::class, 'user_id1');
        }

        public function friend(): BelongsTo
        {
            return $this->belongsTo(User::class, 'user_id2');
        }
}
