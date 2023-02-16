<x-app :userIp="$ip">

    <h4>Edit user</h4>
    <form action="/users/{{$user->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control-plaintext">
        </div>

        <div class="form-group">
            <label for="role_id">role</label>
            <select name="role_id" id="role_id" class="form_control">
                <option value="">-- select --</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{$role->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">submit</button>
        <a href="/users" class="btn btn-secondary">cancel</a>
    </form>
</x-app>