<tr>
    <td>{{ $round->fordulo_id }}</td>
    <td>
        <a href="{{ route('round', ['fordulo_id' => $round->fordulo_id]) }}">{{ $round->name }}</a>
    </td>
    <td>{{ $round->date }}</td>
</tr>
