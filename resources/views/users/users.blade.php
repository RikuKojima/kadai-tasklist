@if (count($users) > 0)
<ul class="media-list">
    @foreach($users as $user)
    <li class="media">
        <div class="media-left"></div>
        <div class="media-body">
            <div>
                {{ $user->name }}
            </div>
            <div>
                <p>{!! link_to_route('users.show','view profile', ['id' => $user->id]) !!}</p>
            </div>
        </div>
    </li>
    @endforeach
</ul>
{!! $users->render() !!}
@endif
