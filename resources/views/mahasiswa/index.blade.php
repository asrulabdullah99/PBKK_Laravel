@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Halaman Mahasiswa</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
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
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mahasiswa.destroy', $data_mahasiswa->nim) }}" method="POST">
                                <a href="{{ route('mahasiswa.show', $data_mahasiswa->nim) }}" class="btn btn-sm btn-dark">SHOW</a>
                                <a href="{{ route('mahasiswa.edit', $data_mahasiswa->nim) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
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
</div>
</div>
@endsection