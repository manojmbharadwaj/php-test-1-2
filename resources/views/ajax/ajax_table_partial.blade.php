@if ( count($users) > 0 )
    @foreach ($users as $user)
        <tr>
            <td>
                {{ $loop->iteration  }}
                <input type="hidden" class="u_name" value="{{ $user->name }}">
                <input type="hidden" class="u_email" value="{{ $user->email }}">
                <input type="hidden" class="u_phone" value="{{ $user->phone }}">
                <input type="hidden" class="u_city" value="{{ $user->city }}">
                <input type="hidden" class="u_id" value="{{ $user->id }}">
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->city }}</td>
            <td>
                <button class="btn btn-sm btn-info edit-modal-btn text-white">Edit</button>
            </td>
            <td>
                <button class="btn btn-sm btn-danger text-white delete-user-btn">Delete</button>
            </td>
        </tr>
    @endforeach
@endif
