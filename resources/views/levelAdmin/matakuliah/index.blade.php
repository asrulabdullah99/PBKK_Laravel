@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Halaman Mata Kuliah</h1>
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
           <a href="{{ route('admin.matakuliah.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col" style="width: 20%">ACTIONS</th>
                </tr>
                <tr>
                    @forelse ($dataMatakuliah as $index => $matakuliah)
                    <tr>
                        <td class="text-center">{{ ++$index }} </td>
                        <td>{{ $matakuliah->nama_matakuliah }}</td>
                        <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.matakuliah.destroy', $matakuliah->id) }}" method="POST">
                            <a href="{{ route('admin.matakuliah.show', $matakuliah->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <a href="{{ route('admin.matakuliah.edit', $matakuliah->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                        </td>
                      </tr>
                      @empty
                      <div class="alert alert-danger">Data Mata Kuliah Belum Ada.</div>
                      @endforelse
                </tr>
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


