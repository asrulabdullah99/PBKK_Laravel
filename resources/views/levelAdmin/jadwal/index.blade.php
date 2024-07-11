@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Halaman Jadwal</h1>
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
                <a href="{{ route('admin.jadwal.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Nama Dosen</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col" style="width: 20%">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwal as $index => $data_jadwal)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{ $data_jadwal->nama_kelas }}</td>
                        <td>{{ $data_jadwal->hari }}</td>
                        <td>{{ $data_jadwal->waktu }}</td>
                        <td>{{ $data_jadwal->nama_dosen }}</td>
                        <td>{{ $data_jadwal->nama_matakuliah }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.jadwal.destroy', $data_jadwal->id) }}" method="POST">
                                <a href="{{ route('admin.jadwal.show', $data_jadwal->id) }}" class="btn btn-sm btn-dark tooltip-test" title="Tooltip">SHOW</a>
                                <a href="{{ route('admin.jadwal.edit', $data_jadwal->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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