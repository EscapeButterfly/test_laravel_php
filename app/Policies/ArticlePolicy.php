<?php

namespace App\Policies;

use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the article.
     *
     * @param  \App\User $user
     * @param  \App\Article $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        return true;
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if(Auth::user()){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\User $user
     * @param  \App\Article $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        if($article->users()->where('id', $user->id)->get()->count()){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param  \App\User $user
     * @param  \App\Article $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        if($article->users()->where('id', $user->id)->get()->count()){
            return true;
        }
        return false;
    }
}
