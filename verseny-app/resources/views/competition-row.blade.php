<tr>
    <td>{{ $competition->v_id }}</td>
    <td>
        <a href="{{ route('competition', ['v_id' => $competition->v_id]) }}"><b>{{ $competition->name }}</b></a>
    </td>
    <td>{{ $competition->year }}</td>
    <td>{{ $competition->description }}</td>
    <td>{{ $competition->country }}</td>
    <td>{{ $competition->sport }}</td>
</tr>
