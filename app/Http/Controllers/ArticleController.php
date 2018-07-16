<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if($user->can('create', Article::class)){
            return view('articles.create');
        }
        return redirect('/articles')->with('error', 'Unauthorized Page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if($user->can('create', Article::class)){
            $this->validate($request, [
                'title' => 'required',
                'text' => 'required'
            ]);

            $article = new Article();

            $article->title = $request->input('title');
            $article->text = $request->input('text');
            $article->save();

            $user->articles()->attach($article->id);

            return redirect('/articles')->with('success', 'Article Created');
        }

        return redirect('/articles')->with('error', 'Unauthorized Page');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $user = Auth::user();

        //Task 4 test
        if($article->checkUser($user)){
            return view('articles.edit')->with('article', $article);
        }

        /*if ($user->can('update', $article)) {
            return view('articles.edit')->with('article', $article);
        }*/
        return redirect('/articles')->with('error', 'Unauthorized Page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);

        $user = Auth::user();
        $article = Article::find($id);

        if ($user->can('update', $article)) {
            $article->title = $request->input('title');
            $article->text = $request->input('text');
            $article->save();
            return redirect('/articles')->with('success', 'Article Updated');
        }
        return redirect('/articles')->with('error', 'Unauthorized Page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $article = Article::find($id);

        if ($user->can('delete', $article)) {
            $article->delete();
            return redirect('/articles')->with('success', 'Article removed!');
        }
        return redirect('/articles')->with('error', 'Unauthorized Page');
    }
}
