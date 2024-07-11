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
        <a href="{{ route('admin.pengguna.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
      </div>
      <div class="card-body p-0">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
            <h4> Ini adalah dashboard admin </h4>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection