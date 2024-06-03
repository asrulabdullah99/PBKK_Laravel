<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Dosen</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('dosen.store') }}" method="POST"  >
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
                                <label for="exampleInputEmail1">Nama Dosen</label>
                                <input type="text" name="nama_dosen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter nama dosen">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('nama_dosen')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">NIDN</label>
                                <input type="text" name="nidn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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
                                <input class="form-check-input" value="L" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Laki-Laki
                                </label>
                                <input class="form-check-input" value="P" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Perempuan
                                </label>
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



