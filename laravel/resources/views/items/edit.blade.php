<x-app>
    items edit<br>
    <form action="/items/{{$item->id}}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" id="name" name="name" value="{{old('name', $item->name)}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
            @enderror
            <br>
            <label for="total">total</label>
            <input type="text" id="total" name="total" value="{{old('total',$item->total)}}" class="form-control @error('total') is-invalid @enderror">
            @error('total')
                <div class="invalid-feedback">
                    {{$message}}
            @enderror
            <br>

            <button type="submit" class="btn btn-primary">
                submit
            </button>
            <a href="/items" class="btn btn-secondary">cancel</a>
        </div>
    </form>
</x-app>