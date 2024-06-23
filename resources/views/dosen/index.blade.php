@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Halaman Dosen</h1>
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
                <a href="{{ route('dosen.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIDN</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Dosen</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Username</th>
                        <th scope="col" style="width: 20%">ACTIONS</th>
                    </tr>
                    @forelse ($dosen as $index => $data_dosen)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{ $data_dosen->nidn }}</td>
                        <td>{{ $data_dosen->user->email }}</td>
                        <td>{{ $data_dosen->nama_dosen }}</td>
                        <td>{{ $data_dosen->jenis_kelamin }}</td>
                        <td>{{ $data_dosen->user->username }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dosen.destroy', $data_dosen->nidn) }}" method="POST">
                                <a href="{{ route('dosen.show', $data_dosen->nidn) }}" class="btn btn-sm btn-dark tooltip-test" title="Tooltip">SHOW</a>
                                <a href="{{ route('dosen.edit', $data_dosen->nidn) }}" class="btn btn-sm btn-primary">EDIT</a>
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