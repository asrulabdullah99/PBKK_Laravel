@extends('template.app')
@section('content')

                        <a href="{{ route('pengguna.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Level</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $index => $pengguna)
                                    <tr>
                                        <td class="text-center">
                                            {{ ++$index }}
                                        </td>
                                        <td>{{ $pengguna->username }}</td>
                                        <td>{{ $pengguna->email }}</td>
                                        <td>{{ $pengguna->password }}</td>
                                        <td>{{ $pengguna->level }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST">
                                                <a href="{{ route('pengguna.show', $pengguna->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                            </tbody>
                        </table>
                        {{-- {{ $user->links() }} --}}
@endsection

