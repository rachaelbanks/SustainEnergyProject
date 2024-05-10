<x-users-layout>

    <div class="container mt-5">
        <div class="row">
            <h1>Users</h1>
        </div>
        <div class="row">
            @if($users->isEmpty())
            <p>No users registered yet.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

</x-users-layout>


