@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['ArticleController@update', $article->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $article->title, ['class' => 'form-control',
                                    'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('text', 'Body')}}
        {{Form::textarea('text', $article->text, ['id' => 'article-ckeditor', 'class' => 'form-control',
                                  'placeholder' => 'Text'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection