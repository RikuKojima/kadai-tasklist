@extends('layouts.app')

@section('content')
    @if (count($all_lists) > 0)
        <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
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
        </div>
        </div>
    @endif
   {!! link_to_route('tasklist.create','新規タスクの追加', null, ['class' => 'btn btn-primary'])!!}
@endsection