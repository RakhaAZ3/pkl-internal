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
        <div class="mt-3">
        @include('profile.partials.flash-messages')
    </div>
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card login-card border-0 shadow-lg">

                    {{-- Header --}}
                    <div class="login-header text-center text-white">
                        <i class="bi bi-person-circle fs-1 mb-2"></i>
                        <h4 class="fw-bold mb-0">Masuk ke Akun Anda</h4>
                        <small class="opacity-75">
                            Kelola pesanan & wishlist perlengkapan olahraga
                        </small>
                    </div>

                    {{-- Body --}}
                    <div class="card-body p-4">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="nama@email.com"
                                           required autofocus>
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
                                    <input type="password"
                                           name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="••••••••"
                                           required>
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- REMEMBER & FORGOT --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="remember"
                                           {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Ingat Saya
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                       class="text-decoration-none small">
                                        Lupa Password?
                                    </a>
                                @endif
                            </div>

                            {{-- BUTTON LOGIN --}}
                            <div class="d-grid mb-3">
                                <button class="btn btn-primary btn-lg">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Login
                                </button>
                            </div>

                            <hr>

                            {{-- GOOGLE LOGIN --}}
                            <div class="d-grid mb-3">
                                <a href="{{ route('auth.google') }}"
                                   class="btn btn-outline-danger">
                                    <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                                         width="18" class="me-2">
                                    Login dengan Google
                                </a>
                            </div>

                            {{-- REGISTER --}}
                            <p class="text-center mb-0">
                                Belum punya akun?
                                <a href="{{ route('register') }}"
                                   class="fw-bold text-decoration-none">
                                    Daftar Sekarang
                                </a>
                            </p>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
</body>
</html>