@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($articles) > 0)
        @foreach($articles as $article)
            <div class="well">
                <h3><a href="/articles/{{$article->id}}">{{$article->title}}</a></h3>
                <small>Written on {{$article->created_at}}</small>
            </div>
        @endforeach
        {{$articles->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection