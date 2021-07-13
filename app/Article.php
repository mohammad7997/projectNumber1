<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    //
    use Sluggable;

    protected $fillable = ['name', 'slug', 'description','user_id','status','image'];
    protected $attributes = [
        'hits' => 300,
        'status' => 1,
        'image'=>0
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ''
            ]
        ];
    }

}
