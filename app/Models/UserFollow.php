<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    protected $table = 'followers';
    protected $fillable = [
        'user_id',
        'follower',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeisfollower($query, $follow_id)
    {
        return $query->where([
            ['follows_id', '=', $follow_id],
            ['user_id', '=', Auth::user()->id]]);
    }

}
