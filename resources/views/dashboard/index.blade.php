@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
        <a href="/dashboard/profile/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
    </div>
    @if(auth()->user()->image)
        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="{{ auth()->user()->image }}" width="200" height="200" class="img-thumbnail rounded-circle">
    @else
        <img src="https://source.unsplash.com/200x200/?person" width="200" height="200" class="img-thumbnail rounded-circle" alt="{{ auth()->user()->name }}">
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
@endsection
