@extends('layouts.master')
@section('title')
    Halaman Edit Genre
@endsection()
@section('h2')
    Edit Genre
@endsection
@section('content')
    <form action="/genre/{{ $genre->id }}" method="POST">
        @method("PUT")
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
            <label class="form-label">Genre Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $genre->name) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Genre Description</label>
            <textarea class="form-control" name="description">{{ old('description',$genre->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
