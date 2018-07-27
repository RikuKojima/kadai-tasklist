@extends('layouts.app')

@section('content')
    @if(Auth::check())
    <h1>id= {{ $task->id}} の詳細ページ</h1>
    <div class="row">
    <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id}}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $task->status}}</td>
        </tr>
        <tr>
            <th>コンテンツ</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
    </div>
    </div>
   
    {!! link_to_route('tasklist.edit', 'このメッセージを編集' ,['id' => $task->id ],['class' => 'btn btn-default']) !!}
    
    {!! Form::model($task, ['route' => ['tasklist.destroy',$task->id],'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
    @else
    
@endsection