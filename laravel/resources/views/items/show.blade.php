<x-app :userIp="$ip">
    item show <br>
    <div class="from-group">
        <label for="name">
            name
        </label>
        <input type="text" id="name" value="{{$item->name}}" readonly class="form-control-plaintext">

        <label for="total">
            name
        </label>
        <input type="text" id="total" value="{{$item->total}}" readonly class="form-control-plaintext">
    </div>
    <hr>
    <a href="/items/{{ $item->id }}/tracks/create" class="btn btn-success">create new track</a>
    <a href="/items" class="btn btn-secondary">back to list</a>

    <table class="table">
        <thead>
            <tr>
                <th>Date/Time</th>
                <th>type</th>
                <th>quantity</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($item->tracks as $track)
            <tr>
                <td>{{  $track->created_at }}</td>
                <td>{{ $track->type }}</td>
                <td>{{ $track->quantity }}</td>
                <td>
                    <form action="/tracks/{{ $track->id }}" method="POST">
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