@extends('layouts.master')
@section('title')
    Halaman Detail Genre
@endsection()
@section('h2')
    Detail Genre
@endsection
@section('content')
    <h1 class="text-primary">{{ $genre->name }}</h1>
    <p>{{ $genre->description }}</p>

    <hr>
    <div class="row">
        @forelse ($genre->Books as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex">
                <div class="card h-100 d-flex flex-column w-100">
                    <img src="{{ asset('image/' . $item->image) }}" class="card-img-top" height="300px" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ Str::limit($item->summary, 100) }}</p>

                        {{-- Grup bagian bawah: stok + tombol --}}
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <small class="text-muted">Stok tersedia:</small>
                                <span class="badge {{ $item->stok > 0 ? 'bg-primary' : 'bg-danger' }} rounded-pill">
                                    {{ $item->stok }}
                                </span>
                            </div>
                            <div class="d-grid gap-2 mb-2">
                                <a href="/book/{{ $item->id }}" class="btn btn-info">Detail</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <h1 class="text-muted text-center">Tidak ada Buku di Genre ini</h1>
        @endforelse
    </div>

    <a href="/genre" class="btn btn-secondary btn-sm my-3">Kembali</a>
@endsection
