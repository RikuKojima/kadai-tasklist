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
　
　<div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
　{!! Form::model($task , ['route' => ['tasklist.update', $task->id], 'method' => 'put']) !!}
　
　  <div class="form-group">
　  {!! Form::label('content','タスク') !!}
    {!! Form::text('content', null, ['class' => 'form-controll']) !!}
    </div>
    
    <!--statusカラムを編集する-->
    <div class="form-group">
    {!! Form::label('status','ステータス') !!}
    {!! Form::text('status',null,  ['class' => 'form-controll']) !!}
    </div>
    {!! Form::submit('投稿', ['class' => 'btn btn-primary'])!!}
　{!! Form::close() !!}
　  </div>
　</div>

@endsection