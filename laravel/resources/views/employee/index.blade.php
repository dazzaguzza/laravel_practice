<x-app :userIp="$ip">
    <h4>Employees</h4>
    <a href="/employees/create" class="btn btn-success">create new employee</a>

    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>gender</th>
                <th>hobbies</th>
                <th>started at</th>
                <th>photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->hobbies }}</td>
                    <td>{{ $employee->started_at ? Carbon\Carbon::parse($employee->started_at)->format('Y-m-d') : '-' }}</td>
                    <td>
                        <!-- <img height=100 src="/storage/{{ str_replace('public/','',$employee->photo) }}"> -->
                        <img height=100 src="{{ env('AWS_S3_URL')}}{{ $employee->photo }}">

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</x-app>