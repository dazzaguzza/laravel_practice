<x-app>
    create new track for item : {{ $item->name }}
    <form action="/items/{{$item->id}}/tracks" method="POST">

        @csrf
        <div>type</div>
        <div class="form-check form-check-inline">
            <input type="radio" name="type" id="typeIn" value="in" 
            class="form-check-input @error('type') is-invalid @enderror">
            <label for="typeIn" class="form-check-label">in</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" name="type" id="typeOut" value="out"
            class="form-check-input @error('type') is-invalid @enderror">
            <label for="typeOut" class="form-check-label">out</label>
            @error('type')
            <div class="ml-2 invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">quantity</label>
            <input type="text" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror">
            @error('quantity')
            <div class="invalid-feddback">
                {{$message}}
            </div>
            @enderror
        </div>

        <br>
        <button type="submit" class="btn btn-primary">
            submit
        </button>
    </form>

</x-app>