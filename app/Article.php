<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    //Table name
    protected $table = 'article';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
    ];

    /**
     * The users that belong to article.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
