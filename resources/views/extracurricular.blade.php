@extends('layouts.main')
@section('container')
    <h1>Halaman Extracurricular</h1>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Pembina</th>
                <th scope="col">Deskripsi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($extras as $extra)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $extra['nama'] }}</td>
                    <td>{{ $extra['pembina'] }}</td>
                    <td>{{ $extra['deskripsi'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/database2" class="btn btn-primary mb-3">With Database</a>
    </div>
@endsection
