{{-- ================================================
     FILE: resources/views/partials/footer.blade.php
     FUNGSI: Footer website
     ================================================ --}}
<footer class="footer-skolafit text-light pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row g-4">

            {{-- Brand --}}
            <div class="col-lg-4 col-md-6">
                <h4 class="fw-bold mb-3 d-flex align-items-center">
                    <i class="bi bi-bag-heart-fill me-2 text-primary"></i>
                    Skolafit
                </h4>
                <p class="footer-desc">
                    Toko perlengkapan olahraga sekolah terpercaya.
                    Menyediakan jersey, sepatu, dan aksesoris olahraga berkualitas.
                </p>

                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            {{-- Menu --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-title">Menu</h6>
                <ul class="footer-list">
                    <li><a href="{{ route('catalog.index') }}">Katalog Produk</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>

            {{-- Bantuan --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-title">Bantuan</h6>
                <ul class="footer-list">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Cara Belanja</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div class="col-lg-4 col-md-6">
                <h6 class="footer-title">Hubungi Kami</h6>
                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-geo-alt"></i>
                        Jl. Contoh No. 123, Bandung
                    </li>
                    <li>
                        <i class="bi bi-telephone"></i>
                        (022) 123-4567
                    </li>
                    <li>
                        <i class="bi bi-envelope"></i>
                        info@skolafit.id
                    </li>
                </ul>
            </div>
        </div>

        <hr class="footer-divider my-4">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 small text-muted">
                    © {{ date('Y') }} Skolafit. All rights reserved.
                </p>
            </div>

            <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                <img src="{{ asset('images/payment-methods.png') }}" alt="Payment Methods" height="32">
            </div>
        </div>
    </div>
</footer>
