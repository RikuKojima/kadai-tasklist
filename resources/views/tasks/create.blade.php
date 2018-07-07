@extends('layouts.app')

@section('content')

    <h2>タスク新規作成ページ</h2>
    
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <div class="row">
        <div class="col-xs-6">
    {!! Form::model($task, ['route' => 'tasklist.store']) !!}
    
    <!--contentカラムを追加する-->
    <div class="form-group">
    {!! Form::label('content','タスク') !!}
    {!! Form::text('content',null,  ['class' => 'form-control']) !!}
    </div>
    <!--statusカラムを追加する-->
    <div class="form-group">
    {!! Form::label('status','ステータス') !!}
    {!! Form::text('status',null,['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('投稿',['class' => 'btn btn-primary']) !!}
    
    {!! Form::close() !!}
        </div>
    </div>
    
    
@endsection