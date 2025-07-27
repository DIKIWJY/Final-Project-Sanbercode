@extends('layouts.master')
@section('title')
    Halaman Genre
@endsection()
@section('h2')
    Daftar Genre
@endsection
@section('content')
    @auth
        @if (Auth()->user()->role === 'admin')
            <a href="/genre/create" class="btn btn-primary btn-sm my-2">Create</a>
        @endif
    @endauth

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Genre</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($genres as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1 flex-wrap">
                                <a href="/genre/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>

                                @auth
                                    @if (Auth()->user()->role === 'admin')
                                        <a href="/genre/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="/genre/{{ $item->id }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus genre ini?')"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            <h1>Tidak ada Genre</h1>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    @endsection
