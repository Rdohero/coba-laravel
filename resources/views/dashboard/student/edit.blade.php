@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Student</h1>
        <a href="/dashboard/student" class="btn btn-primary mb-3">Back</a>
    </div>

    @if(session()->has('error'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-lg-8">
        <form method="post" action="/dashboard/student/{{ $student->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <input type="hidden" name="oldImage" value="{{ $student->image }}">
                @if($student->image)
                    <img src="{{ asset('storage/'. $student->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">Nis</label>
                <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" required autofocus value="{{ old('nis', $student->nis) }}">
                @error('nis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $student->nama) }}">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Class</label>
                <select class="form-select" name="kelas_id">
                    <option selected>Open this select menu</option>
                    @foreach($classs as $class)
                        @if(old('kelas_id',$student->kelas_id) == $class->id)
                            <option value="{{ $class->id }}" selected>{{ $class->kelas }}</option>
                        @else
                            <option value="{{ $class->id }}">{{ $class->kelas }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat', $student->alamat) }}">
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit Student</button>
        </form>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();
        })

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
