<ul class="media-list">
    <!--タスクのリストを受け取る-->
    @foreach ($tasks as $task)
        <?php $user = $task->user; ?>
        <li class="media">
            <div class="media-left">
                <img src="{{ Gravatar::src($user->email,50) }}" class="media-object img-rounded"></img>
            </div>
            <div class="media-body">
                <div>
                    <!--users.showの画面を表示-->
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $task->created_at }}</span>
                </div>
                <div>
                    <p>{!! nl2br(e($task->content)) !!}</p>
                </div>
                <div>
                    <!--//本人ならば削除ボタン-->
                    @if (Auth::id() == $task->user_id)
                        {!! Form::open(['route' => ['tasklists.destroy', $task->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete',['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close()!!}
                    @endif
                </div>
            </div>
        </li>
@endforeach
</ul>
<!--foreachの外にrenderがあることに注意！！ tasksのメソッドである-->
{!! $tasks->render() !!}
