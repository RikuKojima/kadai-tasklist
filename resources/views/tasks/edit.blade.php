@extends('layouts.app')

@section('content')

//Form::model(モデルのインスタンス、連想配列[route =>ルーティング名(formタグのaction属性に相当する。名前は、このポストを受け取って処理するコントローラの名前のController以前.処理してくれるアクション）
　<h1>{{ タスク番号　$task->id 番のタスク編集ページ}}</h1>
　
　{!! form::model($task, ['route' => 'tasklist.update', $task->id], 'method' => 'put' ) !!}
@endsection