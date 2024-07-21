@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap">
        <div class="pagetitle">
            <h1>Pengguna</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Data Pengguna</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <a class="btn btn-success mb-auto ms-auto" href="{{ route('users.create') }}"> Create New User</a>
    </div>

    <section class="section">
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Pengguna</h5>

                <div class="table-responsive">
                    <table class="datatable table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Jabatan</th>
                                <th>Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->no_hp }}</td>
                                    <td>{{ $user->jabatan }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-sm btn-outline-info me-1"
                                            href="{{ route('users.show', $user) }}"><i class="bi bi-eye"></i></a>
                                        <a class="btn btn-sm btn-outline-warning me-1"
                                            href="{{ route('users.edit', $user) }}"><i class="bi bi-pen"></i></a>

                                        <form
                                            onsubmit="return confirm('Do you really want to delete user {{ $user->nama }}?');"
                                            action="{{ route('users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger me-1"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
