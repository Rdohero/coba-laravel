@extends('layouts.main')
@section('container')
    <h1 class="d-flex justify-content-center">Halaman {{ $title }}</h1>
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center mb-3 mt-3">
        <div class="col-md-6">
            <form action="/students">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if($students->count())
        <div class="d-flex justify-content-center">
            <div class="table-responsive justify-content-center col-lg-8">
                <table class="table table-striped table-sm text-center align-middle">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Alamat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td scope="row" style="">{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset($student->image ? 'storage/' . $student->image : 'storage/post-images/default-avatar.png') }}" width="100" height="100" class="rounded-circle">
                            </td>
                            <td>0{{ $student->nis }}</td>
                            <td>{{ $student->nama }}</td>
                            <td>{{ $student->kelas->kelas }}</td>
                            <td>{{ $student->alamat }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Student found.</p>
    @endif
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
