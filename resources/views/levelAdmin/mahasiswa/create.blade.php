@extends('template.app')
@section('content')
<div class="section-header">
  <h1>Tambah Mahasiswa</h1>
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
        <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlSelect1">Email</label>
            <select class="form-control" name="user_id" id="exampleFormControlSelect1">
              @foreach ($user as $data_user)
              <option value="{{ $data_user->id }}">{{ $data_user->email }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter nama mahasiswa">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @error('nama_mahasiswa')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">NIM</label>
            <input type="text" name="nim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @error('nim')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <br>
            <input class="form-control-input" value="L" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Laki-Laki
            </label>
            <input class="form-control-input" value="P" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Perempuan
            </label>
            @error('jenis_kelamin')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat Mahasiswa</label>
            <textarea class="form-control" name="alamat_mhs" id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('alamat_mhs')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Nama Kelas</label>
            <select class="form-control" name="id_kelas" id="exampleFormControlSelect1">
              @foreach ($kelas as $data_kelas)
              <option value="{{ $data_kelas->id }}">{{ $data_kelas->nama_kelas }}</option>
              @endforeach
            </select>
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