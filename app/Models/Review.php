<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{   use LikableTrait;
    protected $table = 'reviews';
    protected $fillable = [
        'review_content',
        'user_id',
        'book_id',
        'title'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
