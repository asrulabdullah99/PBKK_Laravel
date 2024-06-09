<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <form action="{{ route('jadwal.store') }}" method="POST"  >
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
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('waktu')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Hari</label>
                                <input type="text" name="hari" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('hari')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              
                              <br/>
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
</body>
</html>



