<x-app :userIp="$ip">
    items.index from view <br>

    @can('create',App\Models\Item::class)
        <a href="/items/create" class="btn btn-success">create new item</a>
    @endcan

    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>total</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->total}}</td>
                <td>
                    @can('view',$item)
                    <a href="/items/{{$item->id}}" class="btn btn-primary">view</a>
                    @endcan
                    @can('update',$item)
                    <a href="/items/{{$item->id}}/edit" class="btn btn-info">edit</a>
                    @endcan
                    @can('delete',$item)
                    <form action="/items/{{$item->id}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app>