@extends('layouts.app')

@section('content')
    <h1>id= {{ $task->id}} の詳細ページ</h1>
    
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
   
    {!! link_to_route('tasklist.edit', 'このメッセージを編集' ,['id' => $task->id ],['class' => 'btn btn-default']) !!}
    
    {!! Form::model($task, ['route' => ['tasklist.destroy',$task->id],'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection