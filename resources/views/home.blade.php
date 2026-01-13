{{-- ================================================
     FILE: resources/views/home.blade.php
     FUNGSI: Halaman utama website
     ================================================ --}}

@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- Hero Section --}}
    <section class="hero-sport text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="badge bg-light text-primary mb-3 px-3 py-2">
                    Toko Perlengkapan Olahraga
                </span>

                <h1 class="display-4 fw-bold mb-3">
                    Lengkapi Gaya & Performa Olahragamu
                </h1>

                <p class="lead mb-4">
                    Sepatu, tas, dan aksesoris olahraga berkualitas
                    untuk latihan dan pertandingan.
                </p>

                <a href="{{ route('catalog.index') }}" class="btn btn-light btn-lg px-4">
                    <i class="bi bi-bag me-2"></i>Belanja Sekarang
                </a>
            </div>

            <div class="col-lg-6 d-none d-lg-block text-center">
                <img src="{{ asset('images/remove.png') }}"
                     class="img-fluid hero-img">
            </div>
        </div>
    </div>
</section>


    {{-- Kategori --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Kategori Populer</h2>
            <p class="text-muted">Perlengkapan olahraga favorit pilihan pelanggan</p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('catalog.index', ['category' => $category->slug]) }}"
                       class="text-decoration-none">
                        <div class="category-sport text-center h-100">

                            <div class="category-icon">
                                <img src="{{ $category->image_url }}" alt="{{ $category->name }}">
                            </div>

                            <h6 class="fw-semibold mt-3 text-dark">
                                {{ $category->name }}
                            </h6>

                            <small class="text-muted">
                                {{ $category->products_count }} produk
                            </small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>



    {{-- Produk Unggulan --}}
    <section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Produk Unggulan</h2>
            <a href="{{ route('catalog.index') }}" class="btn btn-outline-primary">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @foreach($featuredProducts as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    @include('profile.partials.product-card', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>
</section>


    {{-- Promo Banner --}}
    <section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-6">
                <div class="promo-card promo-sale">
                    <h3>Flash Sale Olahraga</h3>
                    <p>Produk pilihan untuk menunjang performa terbaikmu</p>
                    <a href="{{ route('catalog.index', ['on_sale' => 1]) }}"
                       class="btn btn-light">
                        Lihat Produk
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="promo-card promo-register">
                    <h3>Gabung Jadi Member</h3>
                    <p>
                        Simpan wishlist, pantau pesanan,
                        dan nikmati pengalaman belanja lebih praktis.
                    </p>
                    <a href="{{ route('register') }}"
                       class="btn btn-outline-light">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


    {{-- Produk Terbaru --}}
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Produk Terbaru</h2>
            <div class="row g-4">
                @foreach($latestProducts as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        @include('profile.partials.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection