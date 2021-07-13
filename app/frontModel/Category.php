<?php

namespace App\frontModel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'slug'];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
