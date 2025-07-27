@extends('layouts.master')
@section('title')
    Halaman Tambah Book
@endsection()
@section('h2')
    Tambah Book
@endsection
@section('content')
    <form method="POST" action="/book" enctype="multipart/form-data">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre_id" id="" class="form-control">
                <option value="">--Pilih Genre--</option>
                @forelse ($genre as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>

                @empty
                    <option value="">Genre Belum ada</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Book Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Book Summary</label>
            <textarea name="summary" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
