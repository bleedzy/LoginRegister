<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Film</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>

<body>
    <ul class="nav nav-tabs bg-light">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('film') }}">Film</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Logout</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('login.logout') }}">Logout</a></li>
            </ul>
        </li>
    </ul>

    <div class="container">
        <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#tambah">
            Tambah
        </button>

        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Film</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('film.add') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" name="judul" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Judul</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" name="rilis" class="form-control" id="floatingdate" required>
                                <label for="floatingDate">Rilis</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="genre" class="form-select" id="floatingSelect" required>
                                    <option selected disabled value="">--Pilih--</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Aksi">Aksi</option>
                                    <option value="Komedi">Komedi</option>
                                    <option value="Olahraga">Olahraga</option>
                                </select>
                                <label for="floatingSelect">Genre</label>
                            </div>
                            <div class="form-floating">
                                <textarea name="deskripsi" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px" required></textarea>
                                <label for="floatingTextarea2">Deskripsi</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Rilis</th>
                    <th>Genre</th>
                    <th style="width: 50%;">Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($film as $index => $a)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $a->judul }}</td>
                        <td>{{ date_format(new DateTime($a->rilis), 'M-d-Y') }}</td>
                        <td>{{ $a->genre }}</td>
                        <td style="width: 50%;">{{ $a->deskripsi }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $a->filmID }}">Edit</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $a->filmID }}">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="edit{{ $a->filmID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Film</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('film.edit', $a->filmID) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="judul" class="form-control" id="floatingInput" value="{{ $a->judul }}" placeholder="" required>
                                            <label for="floatingInput">Judul</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" name="rilis" class="form-control" id="floatingdate" value="{{ $a->rilis }}" required>
                                            <label for="floatingDate">Rilis</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select name="genre" class="form-select" id="floatingSelect" required>
                                                <option value="Adventure" {{ $a->genre == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                                                <option value="Aksi" {{ $a->genre == 'Aksi' ? 'selected' : '' }}>Aksi</option>
                                                <option value="Komedi" {{ $a->genre == 'Komedi' ? 'selected' : '' }}>Komedi</option>
                                                <option value="Olahraga" {{ $a->genre == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                                            </select>
                                            <label for="floatingSelect">Genre</label>
                                        </div>
                                        <div class="form-floating">
                                            <textarea name="deskripsi" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px" required>{{ $a->deskripsi }}</textarea>
                                            <label for="floatingTextarea2">Deskripsi</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="hapus{{ $a->filmID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Hapus</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Hapus Film Dengan Judul {{ $a->judul }}.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <a href="{{ route('film.delete', $a->filmID) }}" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>

        </table>

    </div>

    {{-- <script src="{{ asset('bootstrap\js\bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
