<x-layout>
    <div class="container">
        <h2>Administrator Panel - Users</h2>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_revisor ? 'Revisor' : 'User' }}</td>
                        <td>
                            @if (!$user->is_revisor)
                                <form action="{{ route('admin.users.assign_revisor', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Assign Revisor</button>
                                </form>
                            @else
                                <form action="{{ route('admin.users.remove_revisor', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Remove Revisor</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
