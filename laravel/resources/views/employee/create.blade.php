<x-app>
    <h4>create new employee</h4>

    <form action="/employees" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="gender">gender</label>
            <div class="form-check" >
                <input type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" id="genderM" value="M" {{ old('gender') == 'M' ? 'checked' : '' }}>
                <label for="genderM" class="form-check-label">Male</label>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" id="genderF" value="F" {{ old('gender') == 'F' ? 'checked' : '' }} >
                <label for="genderF" class="form-check-label">Female</label>
                @error('gender')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="hobbies">hobbies</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="music" name="hobbies[]" value="music"
                @if ( in_array('music',old('hobbies',[])) )
                checked
                @endif>
                <label for="form-check-label" for="music">music</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="sport" name="hobbies[]" value="sport"
                @if ( in_array('sport',old('hobbies',[])) )
                checked
                @endif>
                <label for="sport" class="form-check-label">sport</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="netflix" name="hobbies[]" value="netflix"
                @if ( in_array('netflix',old('hobbies',[])) )
                checked
                @endif>
                <label for="netflix" class="form-check-label">netflix</label>
            </div>
        </div>
        <div class="form-group">
            <label for="started_at">started at</label>
            <input type="date" id="started_at" name="started_at" class="form-control @error('started_at') is-invalid @enderror"
            value="{{ old('started_at') }}">

            @error('started_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="photo">
                photo
            </label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</x-app>