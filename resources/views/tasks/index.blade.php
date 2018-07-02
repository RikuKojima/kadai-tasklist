@extends('layouts.app')

@section('content')
    <ul>
    @foreach ($all_lists as $list)
        <li>{{ $list->content }}</li>
    @endforeach
   </ul>
@endsection