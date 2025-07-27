@extends('layouts.master')
@section('title')
    Halaman Tampil Book
@endsection()
@section('h2')
    Daftar Buku
@endsection
@section('content')
    @auth
        @if (Auth()->user()->role === 'admin')
            <a href="/book/create" class="btn btn-primary my-3">Tambah</a>
        @endif
    @endauth

    <div class="row">
        @forelse ($book as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('image/' . $item->image) }}" class="card-img-top"
                        style="height: 300px; object-fit: cover;" alt="{{ $item->title }}">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-2">{{ $item->title }}</h5>
                        <span class="badge bg-success mb-2 align-self-start">{{ $item->genre->name }}</span>
                        <p class="card-text text-muted small flex-grow-1 mb-2">{{ Str::limit($item->summary, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-muted">Stok tersedia:</small>
                            <span class="badge {{ $item->stok > 0 ? 'bg-primary' : 'bg-danger' }} rounded-pill">
                                {{ $item->stok }}
                            </span>
                        </div>

                        <div class="mt-auto">
                            <div class="d-grid gap-2 mb-2">
                                <a href="/book/{{ $item->id }}" class="btn btn-info">Detail</a>
                            </div>

                            @auth
                                @if (Auth()->user()->role === 'admin')
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="d-grid">
                                                <a href="/book/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <form action="/book/{{ $item->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-grid">
                                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center">
                    <h3 class="text-muted">Belum ada buku tersedia</h3>
                </div>
            </div>
        @endforelse
    </div>
@endsection
