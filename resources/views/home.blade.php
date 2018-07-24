@extends('layouts.app')

@section('content')
<!--ログインで分岐-->
    @if(Auth::check())
        <?php $user = Auth::user() ?>
        {{ $user->name }} 
    @else
    
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>
        
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
