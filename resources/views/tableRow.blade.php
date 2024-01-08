@foreach ($objectData->data as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->city }}</td>
        <td>{{ $user->images }}</td>
    </tr> 
@endforeach