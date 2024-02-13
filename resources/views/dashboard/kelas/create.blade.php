@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Class</h1>
        <a href="/dashboard/class" class="btn btn-primary mb-3">Back</a>
    </div>
    @if(session()->has('error'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="col-lg-8">
        <form method="post" action="/dashboard/class" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kelas" class="form-label">Class</label>
                <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" required autofocus value="{{ old('kelas') }}">
                @error('kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Class</button>
        </form>
    </div>
@endsection
