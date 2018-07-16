<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserArticle extends Model
{
    //Table name
    protected $table = 'user_article';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'article_id',
    ];
}
