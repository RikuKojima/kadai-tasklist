<!--ログインしているとここに来る-->
@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="class-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <!--下がかなりややこしいので注意-->
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">Tasks <span class="badge">{{ $count_tasks }}</span></a></li>
                <li><a href="#">Followings</a></li>
                <li><a href="#">Followers</a></li>
            </ul>
            @if (Auth::id() ==$user->id)
                {!! Form::open(['route' => 'tasklists.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content',old('content'),['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::submit('Post',['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close()!!}    
            @endif
            @if (count($tasks) >0)
                @include('tasklist.tasklist',['tasks' => $tasks])
            @endif
        </div>
    </div>
@endsection