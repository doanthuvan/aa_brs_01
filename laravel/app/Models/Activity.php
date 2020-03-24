<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = [
        'activity_name',
        'type',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
