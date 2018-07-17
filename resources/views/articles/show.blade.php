@extends('layouts.app')

@section('content')
    <a href="/articles" class="btn btn-default">Go Back</a>
    <h1>{{$article->title}}</h1>
    <div>
        {!!$article->text!!}
    </div>
    <hr>
    <small>Written on {{$article->created_at}} by
        @foreach($article->users()->get() as $user)
            {{ $user->nickname }}
        @endforeach
    </small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->can('update', $article))
            <a href="/articles/{{$article->id}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action' => ['ArticleController@destroy',
                            $article->id], 'method' => 'POST',
                             'class' => 'pull-right'])!!}

            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection