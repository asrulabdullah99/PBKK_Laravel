@extends('template.app')
@section('content')
<div class="section-header">
  <h1>Edit Dosen</h1>
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
        <form action="{{ route('dosen.update',$dosen->nidn) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="exampleFormControlSelect1">Username</label>
            <select class="form-control" name="user_id" id="exampleFormControlSelect1">
              @foreach ($user as $data_user)
              <option value="{{ $data_user->id }}">{{ $data_user->email }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Dosen</label>
            <input type="text" name="nama_dosen" class="form-control" id="exampleInputEmail1" value="{{ old('nama_dosen', $dosen->nama_dosen) }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @error('nama_dosen')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">NIDN</label>
            <input type="text" name="nidn" class="form-control" id="exampleInputEmail1" value="{{ old('nidn', $dosen->nidn) }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @error('nidn')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <br>
            <input class="form-control-input" value="L" {{ $dosen->jenis_kelamin == 'L' ? 'checked':''  }} type="radio" name="jenis_kelamin" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Laki-Laki
            </label>
            <input class="form-control-input" value="P" {{ $dosen->jenis_kelamin == 'P' ? 'checked':''  }} type="radio" name="jenis_kelamin" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Perempuan
            </label>
          </div>
          <br />
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
        {{-- {{ $user->links() }} --}}
      </div>
      @endsection