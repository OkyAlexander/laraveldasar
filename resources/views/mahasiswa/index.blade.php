<!DOCTYPE html>
<html lang="en">
@include('layout/head')
@include('layout/navbar')
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Pendaftaran Mahasiswa</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-md btn-success mb-3">ADD MAHASISWA</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NPM</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">JENKEL</th>
                                    <th scope="col">KELAS</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col" style="width: 15%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $mahasiswa)
                                    <tr>
                                        <td>{{ $mahasiswa->npm }}</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        <td>{{ $mahasiswa->jenkel }}</td>
                                        <td>{{ $mahasiswa->kelas }}</td>
                                        <td>{{ $mahasiswa->alamat }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                                                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Products belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('layout/footer')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>