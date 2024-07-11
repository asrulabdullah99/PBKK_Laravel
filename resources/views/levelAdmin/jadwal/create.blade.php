@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Tambah Jadwal</h1>
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
                <form action="{{ route('admin.jadwal.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Mata Kuliah</label>
                        <select class="form-control" name="id_matkul" id="exampleFormControlSelect1">
                            @foreach ($matakuliah as $data_matakuliah)
                            <option value="{{ $data_matakuliah->id }}">{{ $data_matakuliah->nama_matakuliah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Kelas</label>
                        <select class="form-control" name="id_kelas" id="exampleFormControlSelect1">
                            @foreach ($kelas as $data_kelas)
                            <option value="{{ $data_kelas->id }}">{{ $data_kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Dosen</label>
                        <select class="form-control" name="id_dosen" id="exampleFormControlSelect1">
                            @foreach ($dosen as $data_dosen)
                            <option value="{{ $data_dosen->user_id }}">{{ $data_dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Waktu</label>
                        <input type="time" name="waktu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">Masukan waktu misal 10:40.</small>
                        @error('waktu')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hari</label>
                        <input type="text" name="hari" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">Masukan nama hari, misal : Senin.</small>
                        @error('hari')
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