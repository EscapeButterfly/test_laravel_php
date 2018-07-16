@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action' => 'ArticleController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control',
                                    'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('text', 'Body')}}
        {{Form::textarea('text', '', ['id' => 'article-ckeditor', 'class' => 'form-control',
                                  'placeholder' => 'Text'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection