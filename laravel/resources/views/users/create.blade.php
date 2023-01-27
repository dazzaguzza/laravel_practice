<x-app>
    <h4>create new user</h4>
    <form action="/users" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{$message}}</div>            
            @enderror
        </div>

        <div class="form-group">
            <label for="role_id">role</label>
            <select name="role_id" id="role_id" class="form-control">
                <option value="">-- select --</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">name</label>
            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" id="password" name="password" value="" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">comfirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control">
        </div>

        <br>
        <button type="submit" class="btn btn-primary">submit</button>
        <a href="/users" class="btn btn-secondary">cancel</a>
    </form>
</x-app>