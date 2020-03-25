<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    protected $table = 'user_follows';
    protected $fillable = [
        'user_id',
        'follower',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
