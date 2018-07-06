@extends('layouts.app')

@section('content')

<!--Form::model(モデルのインスタンス、連想配列[route =>ルーティング名(formタグのaction属性に相当する。名前は、このポストを受け取って処理するコントローラの名前のController以前.処理してくれるアクション）-->
　<h1>{{ $task->id }}番のタスク編集ページ</h1>
　
　<!--エラーメッセージを表示-->
　@if(count($errors) > 0)
　    <ul>
　        @foreach($errors->all() as $error)
　            <li>{{ $error }}</li>
　        @endforeach
　    </ul>
　@endif
　
　{!! Form::model($task , ['route' => ['tasklist.update', $task->id], 'method' => 'put']) !!}
　
　{!! Form::label('content','タスク') !!}
    {!! Form::text('content') !!}
    
    <!--statusカラムを編集する-->
    {!! Form::label('status','ステータス') !!}
    {!! Form::text('status') !!}
    {!! Form::submit('投稿')!!}
　{!! Form::close() !!}

@endsection