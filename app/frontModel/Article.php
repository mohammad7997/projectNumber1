<?php

namespace App\frontModel;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['name', 'slug', 'description', 'user_id', 'status', 'image'];

    protected $attributes = [
        'hits' => 300,
        'status' => 1,
        'image' => 0
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
