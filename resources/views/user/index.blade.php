<table class="table table-striped" id="table-1">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $index => $pengguna)
        <tr>
            <td>{{ ++$index }}</td>
            <td>{{ $pengguna->username }}</td>
            <td>{{ $pengguna->email }}</td>
            <td>{{ $pengguna->password }}</td>
            <td>{{ $pengguna->level }}</td>
        </tr>
        @endforeach
    </tbody>
</table>