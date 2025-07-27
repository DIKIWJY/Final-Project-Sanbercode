@extends('layouts.master')
@section('title')
    Halaman Home
@endsection()
@section('h2')
    HOME
@endsection()
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    @auth
        <h2>Selamat Datang {{ Auth()->user()->name }}
            @if (Auth()->user()->profile)
                ({{ Auth()->user()->profile->age }})
            @else
                null
            @endif
        @endauth

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row position-relative">

                    <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><img
                            src="{{ asset('image/bukuu.jpg') }}">
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="inner-title">ReviewBook — Ulas Buku, Bagikan Wawasan</h2>
                        <div class="our-story">
                            <h4>Est 2025</h4>
                            <h3>Review Book</h3>
                            <p>
                                Belajar dan Berbagi agar hidup ini semakin santai dan berkualitas
                            </p>

                            <ul>
                                <h4>Cara bergabung ke ReviewBook</h4>
                                <li><i class="bi bi-check-circle"></i> <span>Mengunjungi website ini</span></li>
                                <li><i class="bi bi-check-circle"></i> <span>Mendaftar di <a href="register">Form Sign Up
                                        </a></span></li>
                                <li><i class="bi bi-check-circle"></i> <span>Dibuat oleh calon web developer terbaik</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


        </section><!-- /About Section -->
    @endsection
