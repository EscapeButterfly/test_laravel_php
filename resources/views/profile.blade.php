@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>{{ $user->name }}'s Profile</h2>
                <img src="/storage/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h3>{{ $user->nickname }}</h3>
                <h3>{{ $user->name. ' '. $user->second_name }}</h3>
                <h3>{{ $user->phone_number }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Your articles</h1>
                @if(count($articles) > 0)
                    @foreach($articles as $article)
                        <div class="well">
                            <h3><a href="/articles/{{$article->id}}">{{$article->title}}</a></h3>
                            <small>Written on {{$article->created_at}} by
                                @foreach($article->users()->get() as $user)
                                    {{ $user->nickname }}
                                @endforeach
                            </small>

                            {!!Form::open(['action' => ['ArticleController@destroy',
                                            $article->id], 'method' => 'POST',
                                             'class' => 'pull-right'])!!}

                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!! Form::close() !!}
                            <a href="/articles/{{$article->id}}/edit" class="btn btn-default pull-right">Edit</a>

                        </div>
                    @endforeach
                        {{$articles->links()}}
                @else
                    <p>No articles found</p>
                @endif
              </div>
        </div>
    </div>
@endsection