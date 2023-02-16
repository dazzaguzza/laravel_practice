<x-app :userIp="$ip">
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
    <form action="/items" method="POST">
        @csrf 
        <div class="form-group">
            <label for="name">
                name
            </label>
            <input type="text" id="name" name="name" 
            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <br>

            <label for="total">
                total
            </label>
            <input type="text" id="total" name="total" 
            value="{{old('total')}}" class="form-control @error('total') is-invalid @enderror">
            @error('total')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <br>
            <button type="submit" class="btn btn-primary">
                submit
            </button>
        </div>
    </form>
</x-app>