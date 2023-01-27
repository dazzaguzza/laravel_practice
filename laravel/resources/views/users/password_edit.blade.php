<x-app>
    <h4>Change password</h4>
    <form action="/users/{{ $user->id }}/password" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control-plaintext" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">new password</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">submit</button>
        <a href="/users" class="btn btn-secondary">cancel</a>
    </form>
</x-app>