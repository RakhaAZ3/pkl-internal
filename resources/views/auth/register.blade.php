<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- ... meta tags ... -->

    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Stack untuk
    script tambahan dari child view --}} @stack('scripts')
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSRF Token untuk AJAX --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Meta Tags --}}
    <title>@yield('title', 'Toko Online') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', 'Toko online terpercaya dengan produk berkualitas')">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Stack untuk CSS tambahan per halaman --}}
    @stack('styles')
</head>
<body class="bg-primary">
<section class="login-section">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card login-card border-0 shadow-lg">

                    {{-- Header --}}
                    <div class="login-header text-center text-white">
                        <i class="bi bi-person-plus-fill fs-1 mb-2"></i>
                        <h4 class="fw-bold mb-0">Buat Akun Baru</h4>
                        <small class="opacity-75">
                            Daftar untuk belanja perlengkapan olahraga
                        </small>
                    </div>

                    {{-- Body --}}
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- NAME --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input id="name"
                                           type="text"
                                           name="name"
                                           value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Nama lengkap"
                                           required autofocus>
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input id="email"
                                           type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="nama@email.com"
                                           required>
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input id="password"
                                           type="password"
                                           name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="••••••••"
                                           required>
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- CONFIRM PASSWORD --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Konfirmasi Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-shield-lock"></i>
                                    </span>
                                    <input id="password-confirm"
                                           type="password"
                                           name="password_confirmation"
                                           class="form-control"
                                           placeholder="••••••••"
                                           required>
                                </div>
                            </div>

                            {{-- BUTTON REGISTER --}}
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-person-check me-2"></i>
                                    Register
                                </button>
                            </div>

                            <hr>

                            {{-- GOOGLE REGISTER --}}
                            <div class="d-grid mb-3">
                                <a href="{{ route('auth.google') }}"
                                   class="btn btn-outline-danger">
                                    <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                                         width="18" class="me-2">
                                    Daftar dengan Google
                                </a>
                            </div>

                            {{-- LOGIN --}}
                            <p class="text-center mb-0">
                                Sudah punya akun?
                                <a href="{{ route('login') }}"
                                   class="fw-bold text-decoration-none">
                                    Login
                                </a>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>