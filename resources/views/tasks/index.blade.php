@extends('layouts.app')

@section('content')
    <ul>
    @foreach ($all_lists as $list)
        <li>{!! link_to_route('show',$list->id,['id'=>$list->id]) !!} : {{ $list->content }}</li>
    @endforeach
   </ul>
   {!! link_to_route('index','新規タスクの追加')!!}
@endsection