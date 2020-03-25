<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewLike extends Model
{
    protected $table = 'review_like';
    protected $fillable = [
        'review_id',
        'user_id',
        'like',
        'unlike',

    ];

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function review()
    {
        return $this->belongsTo(Book::class, 'review_id');
    }
}
