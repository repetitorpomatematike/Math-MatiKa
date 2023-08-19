@foreach($logs as $day => $log)
    <h4><strong>{!! $day !!}</strong> <sup>{{count($log)}} действий</sup></h4>
    <table class="table">
        <thead class="text-primary">
        <tr>
            <th>
                Действие
            </th>
            <th>
                Пользователь
            </th>
            <th>
                Клиент
            </th>
            <th>
                Время
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($log as $inner)
            @php
                $user = $inner->user()->first();
                $client = $inner->client()->first();
            @endphp
            <tr data-action="{{ $inner->action }}">
                <td>
                    {!! $inner->name !!}
                </td>
                <td>
                    @if ($user->nick)
                        <a href="{{ route('ProfilePage', $user->nick) }}">
                            {{$user->name}}
                        </a>
                    @else
                        {{$user->name}}
                    @endif
                </td>
                <td>
                    <a href="{{ route('CrmPage', $client->id) }}">
                        {{ $client->name }}
                    </a>
                </td>
                <td>
                    {{ dateFormat($inner->created_at) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endforeach
