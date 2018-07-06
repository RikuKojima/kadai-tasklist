@extends('layouts.app')

@section('content')

    <h2>タスク新規作成ページ</h2>
    
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::model($task, ['route' => 'tasklist.store']) !!}
    
    <!--contentカラムを追加する-->
    {!! Form::label('content','タスク') !!}
    {!! Form::text('content') !!}
    
    <!--statusカラムを追加する-->
    {!! Form::label('status','ステータス') !!}
    {!! Form::text('status') !!}
    {!! Form::submit('投稿')!!}
    
    {!! Form::close() !!}
    
@endsection