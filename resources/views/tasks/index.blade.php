@extends('layouts.app')

@section('content')
    <ul>
    @foreach ($all_lists as $list)
        <li>{!! link_to_route('tasklist.show',$list->id,['id'=>$list->id]) !!} : {{ $list->content }}</li>
    @endforeach
   </ul>
   {!! link_to_route('tasklist.create','新規タスクの追加')!!}
@endsection