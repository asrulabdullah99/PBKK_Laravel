@extends('template.app')
@section('content')
<div class="section-header">
  <h1>Halaman Pengguna</h1>
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
                <a href="{{ route('kelas.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataKelas as $index => $kelas)
                        <tr>
                            <td class="text-center">
                                {{ ++$index }}
                            </td>
                            <td>{{ $kelas->nama_kelas }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kelas.destroy', $kelas->id) }}" method="POST">
                                    <a href="{{ route('kelas.show', $kelas->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Kelas Belum Ada.
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