@extends('layouts.main')
@section('container')
    <h1 class="text-center d-block mt-3 pb-4">Post Categories</h1>
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            @foreach($kelass as $kelas)
                <div class="col-md-4 mb-5">
                    <a href="/students?kelas={{ $kelas->kelas }}" class="text-decoration-none text-white">
                        <div class="card text-bg-dark">
                            <img src="https://source.unsplash.com/500x500/?Computer" class="card-img" alt="{{ $kelas->kelas }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $kelas->kelas }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $kelass->links() }}
        </div>
    </div>
@endsection
