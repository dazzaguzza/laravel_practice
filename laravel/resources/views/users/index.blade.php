<x-app :userIp="$ip">
    <div class="d-flex justify-content-between mt-2 mb-2">
        <h4>Users</h4>
        <a href="/users/create" class="btn btn-success">create new user</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Email</th>
                <th>Name</th>
                <th>role</th>
                <th>permissions</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                    <ul>
                        @foreach($user->role->permissions as $permission)
                            <li>
                                {{$permission->name}}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="/users/{{$user->id}}/edit" class="btn btn-dark">edit</a>
                    <a href="/users/{{ $user->id }}/password" class="btn btn-info">change password</a>
                    <form action="/users/{{$user->id}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app>