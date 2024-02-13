@extends('dashboard.layouts.main')
@section('container')
    <h1>Halaman Student</h1>
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-start mb-3 mt-3">
        <div class="col-md-6">
            <form action="/dashboard/student">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Student" name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive col-lg-8">
        <a href="/dashboard/student/create" class="btn btn-primary mb-3">Create New Student</a>
        <table class="table table-striped table-sm text-center align-middle">
            <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>
                        <img src="{{ asset($student->image ? 'storage/' . $student->image : 'storage/post-images/default-avatar.png') }}" width="100" height="100" class="rounded-circle">
                    </td>
                    <td>0{{ $student->nis }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->kelas->kelas }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td>
                        @auth()
                        <button type="button" class="badge btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $student->id }}" data-bs-whatever="@mdo"><span data-feather="info"></span></button>
                        <a href="/dashboard/student/{{ $student->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/student/{{ $student->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/student/{{ $student->id }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                        </form>
                        @else
                            Login For Action
                        @endauth
                    </td>
                </tr>
                <div class="modal fade" id="exampleModal{{ $student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Image :</label>
                                        <input type="hidden" name="oldImage" value="{{ $student->image }}">
                                        @if($student->image)
                                            <img src="{{ asset('storage/'. $student->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                        @else
                                            <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nis :</label>
                                        <input type="text" class="form-control" id="recipient-name" value="0{{ $student->nis }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nama :</label>
                                        <input type="text" class="form-control" id="recipient-name" value="{{ $student->nama }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Kelas :</label>
                                        <input type="text" class="form-control" id="recipient-name" value="{{ $student->kelas->kelas }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Alamat :</label>
                                        <input type="text" class="form-control" id="recipient-name" value="{{ $student->alamat }}" readonly>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $students->links() }}
        </div>
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
