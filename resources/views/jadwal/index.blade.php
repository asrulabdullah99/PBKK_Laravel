<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Dosen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Jadwal</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('dosen.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Mahasiswa </th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Dosen</th>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal as $index => $data_jadwal)
                                    <tr>
                                        <td class="text-center">{{ ++$index }}</td>
                                        <td>{{ $data_jadwal->nama_mahasiswa }}</td>
                                        <td>{{ $data_jadwal->hari }}</td>
                                        <td>{{ $data_jadwal->waktu }}</td>
                                        <td>{{ $data_jadwal->nama_dosen }}</td>
                                        <td>{{ $data_jadwal->nama_matakuliah }}</td>
                                        {{-- <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dosen.destroy', $data_dosen->nidn) }}" method="POST">
                                                <a href="{{ route('dosen.show', $data_dosen->nidn) }}" class="btn btn-sm btn-dark tooltip-test" title="Tooltip">SHOW</a>
                                                <a href="{{ route('dosen.edit', $data_dosen->nidn) }}" class="btn btn-sm btn-primary">EDIT</a>
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



