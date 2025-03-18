@if ($agents)
    <table class="table table-bordered">
        @foreach ($agents as $value)
            <tr>
                <td>
                    <a href="{{ route('agents.profile', ['id' => $value->id]) }}">{{ $value->name }}
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endif
