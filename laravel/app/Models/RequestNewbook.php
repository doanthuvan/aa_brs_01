<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestNewbook extends Model
{
    protected $table = 'request_newbooks';
    protected $fillable = [
        'book_name',
        'author',
        'request_content',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
