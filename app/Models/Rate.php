<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';
    protected $fillable = [
        'book_id',
        'user_id',
        'stars',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    public function scopeUserRateBook($query, $id_book)
    {
        return $query->where([
            ['book_id', '=', $id_book],
            ['user_id', '=', Auth::user()->id]]);
    }
}
