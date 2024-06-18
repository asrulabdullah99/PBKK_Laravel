@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Tambah Kelas</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-0">
                <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" placeholder="Enter nama kelas">
                        <small id="emailHelp" class="form-text text-muted">Silahkan input nama kelas, contoh : Kelas 10.</small>
                        @error('nama_kelas')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <br />
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                {{-- {{ $user->links() }} --}}
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection