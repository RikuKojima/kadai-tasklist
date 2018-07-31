@extends('layouts.app')

@section('content')
@if(Auth::check())
    @if (count($tasks) > 0)
        <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        <h1>タスク一覧ページ</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>コンテンツ</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{!! link_to_route('tasklist.show',$task->id,['id'=>$task->id]) !!}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->content }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
        </div>
    @endif
@endif
   <div class="row">
       
       <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
           {!! link_to_route('tasklist.create','新規タスクの追加', null, ['class' => 'btn btn-primary'])!!}
       </div>
   </div>
   
@endsection