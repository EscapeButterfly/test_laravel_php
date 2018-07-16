<?php

namespace App\Policies;

use App\User;
use App\Article;
use App\UserArticle;
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
        //All articles id where user is author.
        $userArticles = UserArticle::where('user_id', $user->id)->get();

        $confirmFlag = false; //check flag.
        //We compare article ids that belong to user with article id that we want to edit.
        foreach ($userArticles as $userArticle) {
            if ($userArticle->article_id != $article->id) {
                $confirmFlag = false;
            } else {
                $confirmFlag = true;
                break; // if we found that article that we want to edit
                // is belong to user then we break our foreach with $confirmFlag=true.
            }
        }
        return $confirmFlag == true ? true : false;
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
        //All articles id where user is author.
        $userArticles = UserArticle::where('user_id', $user->id)->get();

        $confirmFlag = false; //check flag.
        //We compare article ids that belong to user with article id that we want to edit.
        foreach ($userArticles as $userArticle) {
            if ($userArticle->article_id != $article->id) {
                $confirmFlag = false;
            } else {
                $confirmFlag = true;
                break; // if we found that article that we want to edit
                // is belong to user then we break our foreach with $confirmFlag=true.
            }
        }
        return $confirmFlag == true ? true : false;
    }
}
