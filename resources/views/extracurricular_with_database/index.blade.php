@extends('layouts.main')
@section('container')
    <h1>Halaman Extracurricular Database</h1>
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-8">
        <a href="/database2/create" class="btn btn-primary mb-3">Create New Extra</a>
        <table class="table table-striped table-sm text-center align-middle">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Pembina</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($extras as $extra)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/' . $extra->image) }}" width="100" height="100" class="rounded-circle"></td>
                    <td>{{ $extra->nama }}</td>
                    <td>{{ $extra->pembina }}</td>
                    <td>{!! $extra->deskripsi !!}</td>
                    <td>
                        <a href="/database2/{{ $extra->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/database2/{{ $extra->id }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/extracurricular" class="btn btn-primary mb-3">Back</a>
    </div>
@endsection
