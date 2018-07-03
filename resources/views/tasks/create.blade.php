@extends('layouts.app')

@section('content')

    <h2>タスク新規作成ページ</h2>
    {!! Form::model($task, ['route' => 'tasklists.store']) !!}
    
    {!! Form::label('content','タスク') !!}
    {!! Form::text('content') !!}
    {!! Form::submit('投稿')!!}
    
    {!! Form::close() !!}
    
@endsection