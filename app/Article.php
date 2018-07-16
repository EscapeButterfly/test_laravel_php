<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    use SoftDeletes;

    //Table name
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'text',
    ];

    /**
     * The users that belong to article.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_article');
    }

    /**
     * Check is user the author of article.
     *
     * @param \App\User $user
     * @return bool|null
     */
    public function checkUser(User $user)
    {
        if($this->trashed()){
            return null;
        }else if($this->users()->where('id', $user->id)->get()->count()){
            return true;
        }
        return false;
    }
}
