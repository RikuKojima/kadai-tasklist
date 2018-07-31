@extends('layouts.app')

@section('content')
    @include('users.users', ['users' => $users]);
@endsection

<!--ユーザー一覧ページだが、不要？-->