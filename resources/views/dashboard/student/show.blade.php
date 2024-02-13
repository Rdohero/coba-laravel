@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $title }}</h1>

                <a href="/dashboard/student" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
                <a href="/dashboard/student/{{ $student->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/student/{{ $student->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>
                <h3 class="my-3 fs-5">
                    0{{ $student->nis }}
                </h3>
                <h3 class="my-3 fs-5">
                    {{ $student->nama }}
                </h3>
                @if($student->image)
                        <img src="{{ asset('storage/' . $student->image) }}" class="img-preview img-fluid mb-3 col-sm-4 d-block" alt="{{ $student->name }}">
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $student->name }}" width="200" class="img-thumbnail rounded-circle" alt="{{ $student->name }}">
                @endif
                <article class="my-3 fs-5">
                    {{ $student->kelas->kelas }}
                </article>
                <article class="my-3 fs-5">
                    {{ $student->alamat }}
                </article>
            </div>
        </div>
    </div>
@endsection
