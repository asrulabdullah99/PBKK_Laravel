<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Mahasiswa</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $index => $data_mahasiswa)
                                    <tr>
                                        <td class="text-center">{{ ++$index }}</td>
                                        <td>{{ $data_mahasiswa->nim }}</td>
                                        <td>{{ $data_mahasiswa->user->email }}</td>
                                        <td>{{ $data_mahasiswa->nama_mahasiswa }}</td>
                                        <td>{{ $data_mahasiswa->jenis_kelamin }}</td>
                                        <td>{{ $data_mahasiswa->kelas->nama_kelas }}</td> 
                                        {{-- <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dosen.destroy', $data_mahasiswa->nidn) }}" method="POST">
                                                <a href="{{ route('dosen.show', $data_mahasiswa->nidn) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('dosen.edit', $data_mahasiswa->nidn) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data User Belum Ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



