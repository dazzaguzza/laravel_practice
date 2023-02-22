<x-app :userIp="$ip">
    <form action="/login" method="POST">

    @csrf
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
        <div class="invalid-feedback">
             {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
    </form>
</x-app>
