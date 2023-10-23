<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->MorphMany('App\Models\Comment', 'commentable');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
