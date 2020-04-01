<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rate;
class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'title',
        'book_content',
        'image',
        'price',
        'number_page',
        'view',
        'publisher_id',
        'category_id',
    ];

    public function scopeFindbook($query, $search)
    {
        return $query->where('title', 'LIKE', '%' . $search . '%');
    }
    public function scopebookOfPubliser($query, $id)
    {
        return $query->where('publisher_id',$id)->paginate(16);
    }
    public function scopebookOfCategory($query, $id)
    {
        return $query->where('category_id',$id)->paginate(16);
    }   
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

}
