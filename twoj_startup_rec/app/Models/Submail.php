<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Submail extends Model {
    //
    protected $fillable = [
        'id',
        'user_id',
        'email',
        'created_at',
        'updated_at'
    ];


    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
