<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['name', 'email', 'body'];

    protected $attributes = [
        'status' => 0
    ];

    public function article()
    {
        return $this->belongsTo(article::class);
    }

}
