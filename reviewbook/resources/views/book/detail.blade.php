@extends('layouts.master')
@section('title')
    Halaman Detail Book
@endsection()
@section('h2')
    Detail Book
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset('image/' . $book->image) }}" class="card-img-top"
                    style="height: 500px; object-fit: contain; background-color: #f8f9fa; padding: 15px;"
                    alt="{{ $book->title }}">
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h1 class="text-primary mb-3">{{ $book->title }}</h1>
                    <div class="mb-3">
                        <span class="badge bg-success fs-6">{{ $book->genre->name }}</span>
                    </div>
                    <div class="flex-grow-1 mb-4">
                        <h5 class="text-muted mb-3">Ringkasan:</h5>
                        <p class="fs-6 lh-lg">{{ $book->summary }}</p>
                    </div>
                    <div class="mt-auto">
                        <div class="d-flex align-items-center">
                            <strong class="me-2">Stok:</strong>
                            <span class="badge {{ $book->stok > 0 ? 'bg-primary' : 'bg-danger' }} rounded-pill px-2 py-1">
                                {{ $book->stok }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <h1>Komentar</h1>
    @forelse ($book->comments as $item)
        <div class="card my-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>{{ $item->owner->name }}</strong>
                <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $item->content }}</p>
            </div>
        </div>
    @empty
        <div class="text-center py-4">
            <h5 class="text-muted">Belum ada komentar</h5>
            <p class="text-muted">Jadilah yang pertama memberikan komentar untuk buku ini!</p>
        </div>
    @endforelse

    <hr>
    @auth
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Buat Komentar</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/comments/{{ $book->id }}" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>Ada kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="content" class="form-label fw-semibold">Komentar Anda:</label>
                        <textarea name="content" id="content" class="form-control" placeholder="Bagikan pendapat Anda tentang buku ini..."
                            rows="5" style="resize: vertical; min-height: 120px;"></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Kirim Komentar</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center">
            <h5 class="mb-3">Ingin Berkomentar?</h5>
            <p class="mb-3">Anda harus login terlebih dahulu untuk dapat memberikan komentar pada buku ini.</p>
            <div>
                <a href="/login" class="btn btn-primary me-2">Login</a>
                <a href="/register" class="btn btn-outline-primary">Daftar</a>
            </div>
        </div>
    @endauth
@endsection
