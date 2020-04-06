<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected $table = 'book_user';
    protected $fillable = [
        'book_id',
        'user_id',
        'favorite',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopebookuser($query, $id_book)
    {
        return $query->where([
            ['book_id', '=', $id_book],
            ['user_id', '=', Auth::user()->id]]);
    }
}
