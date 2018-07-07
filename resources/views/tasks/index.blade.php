@extends('layouts.app')

@section('content')
    @if (count($all_lists) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>コンテンツ</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($all_lists as $list)
            <tr>
                <td>{!! link_to_route('tasklist.show',$list->id,['id'=>$list->id]) !!}</td>
                <td>{{ $list->status }}</td>
                <td>{{ $list->content }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    @endif
   {!! link_to_route('tasklist.create','新規タスクの追加', null, ['class' => 'btn btn-primary'])!!}
@endsection