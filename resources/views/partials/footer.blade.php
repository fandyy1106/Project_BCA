<footer class="bg-dark text-light pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold text-white mb-3">Hubungi Kami</h5>
                <p class="mb-1">Halo BCA 1500888</p>
                <p>Email: halobca@bca.co.id</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold text-white mb-3">Tautan Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('about') }}" class="text-light text-decoration-none">Tentang Kami</a></li>
                    <li><a href="{{ route('product') }}" class="text-light text-decoration-none">Produk & Layanan</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold text-white mb-3">Lokasi Kantor Pusat</h5>
                <p>Menara BCA, Grand Indonesia<br>Jl. MH Thamrin No. 1, Jakarta</p>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center text-secondary small">
            <p class="mb-0">&copy; {{ date('Y') }} PT Bank Central Asia Tbk. Hak cipta dilindungi Undang-Undang.</p>
            <p class="mt-1 text-warning fw-bold">DISCLAIMER: Website ini adalah proyek simulasi/tugas akademik dan tidak berafiliasi dengan BCA.</p>
        </div>
    </div>
</footer>