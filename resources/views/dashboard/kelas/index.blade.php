@extends('dashboard.layouts.main')
@section('container')
    <h1>Halaman Class</h1>
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-start mb-3 mt-3">
        <div class="col-md-6">
            <form action="/dashboard/class">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Class" name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive col-lg-8">
        @auth()
        <a href="/dashboard/class/create" class="btn btn-primary mb-3">Create New Class</a>
        @else
            <a href="/login" class="btn btn-primary mb-3">Create New Class</a>
        @endauth
        <table class="table table-striped table-sm text-center align-middle">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Class</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($kelass as $kelas)
                <tr>
                    <td scope="row" style="">{{ $loop->iteration }}</td>
                    <td>{{ $kelas->kelas }}</td>
                    <td>
                        @auth()
                            <a href="/students?kelas={{ $kelas->kelas }}" class="badge bg-info"><span data-feather="eye"></span></a>
                            <a href="/dashboard/class/{{ $kelas->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/class/{{ $kelas->id }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                        </form>
                        @else
                            Login For Action
                        @endauth
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <div class="d-flex justify-content-center">
                {{ $kelass->links() }}
            </div>
    </div>
@endsection
