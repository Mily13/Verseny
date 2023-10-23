<tr id="tr_{{$competitor->f_id}}">
    <td>{{ $competitor->f_id }}</td>
    <td>{{ $competitor->name }}</td>
    <td>{{ $competitor->age }}</td>
    <td>{{ $competitor->gender }}</td>
    <td>{{ $competitor->email }}</td>
    <td>{{ $competitor->phone }}</td>
    <td>
        <button class="btn btn-sm btn-danger me-2 delete-competitor"
                data-f-id="{{ $competitor->f_id }}"
                data-fordulo-id="{{ $round->fordulo_id }}"
                data-delete-competitor-route="{{ route('delete-competitor') }}">
            Törlés</button>
    </td>
</tr>
