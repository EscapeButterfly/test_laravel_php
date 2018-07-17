@extends('layouts.app')

@section('content')
    <h1>Articles</h1>
    <a href="/articles/create" class="btn btn-default">Create new</a>
    @if(count($articles) > 0)
        @foreach($articles as $article)
            <div class="well">
                <h3><a href="/articles/{{$article->id}}">{{$article->title}}</a></h3>
                <small>Written on {{$article->created_at}} by
                    @foreach($article->users()->get() as $user)
                        {{ $user->nickname }}
                    @endforeach
                </small>
            </div>
        @endforeach
        {{$articles->links()}}
    @else
        <p>No articles found</p>
    @endif
@endsection