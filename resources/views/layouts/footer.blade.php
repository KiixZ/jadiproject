<!-- Footer -->
<footer class="bg-white border-t border-gray-100" >
    <div class="container mx-auto px-4 py-12">
        <!-- Grid Container -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Brand Section -->
            <div class="space-y-6">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('/images/alfaza.png') }}" alt="Logo" class="w-10 h-10">
                    <span class="text-2xl font-bold text-custom-secondary bg-clip-text">
                        {{ 'AlfazaGrilled' }}
                    </span>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Nikmati pengalaman kuliner terbaik dengan berbagai pilihan makanan lezat dari AlfazaGrilled.
                </p>
                <!-- Social Media Icons -->
                <div class="flex space-x-5">
                    <a href="#" class="hover:scale-110 transform transition-all duration-300" aria-label="Facebook">
                        <div class="w-10 h-10 bg-custom rounded-lg flex items-center justify-center shadow-lg hover:shadow-custom/50">
                            <i class="bi bi-facebook text-xl text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="hover:scale-110 transform transition-all duration-300" aria-label="Instagram">
                        <div class="w-10 h-10 bg-custom rounded-lg flex items-center justify-center shadow-lg hover:shadow-custom/50">
                            <i class="bi bi-instagram text-xl text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="hover:scale-110 transform transition-all duration-300" aria-label="Twitter">
                        <div class="w-10 h-10 bg-custom rounded-lg flex items-center justify-center shadow-lg hover:shadow-custom/50">
                            <i class="bi bi-twitter text-xl text-white"></i>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="mt-8 md:mt-0">
                <h3 class="text-xl font-bold text-gray-800 mb-6 relative inline-block">
                    Menu Cepat
                    <div class="absolute bottom-0 left-0 w-1/2 h-1 bg-custom rounded-full"></div>
                </h3>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('home.index') }}" class="text-gray-600 hover:text-custom flex items-center space-x-2 group">
                            <i class="bi bi-house text-custom group-hover:translate-x-1 transition-transform"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-custom flex items-center space-x-2 group">
                            <i class="bi bi-cart text-custom group-hover:translate-x-1 transition-transform"></i>
                            <span>Keranjang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transactions.index') }}" class="text-gray-600 hover:text-custom flex items-center space-x-2 group">
                            <i class="bi bi-clock-history text-custom group-hover:translate-x-1 transition-transform"></i>
                            <span>Riwayat Transaksi</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="mt-8 md:mt-0">
                <h3 class="text-xl font-bold text-gray-800 mb-6 relative inline-block">
                    Hubungi Kami
                    <div class="absolute bottom-0 left-0 w-1/2 h-1 bg-custom rounded-full"></div>
                </h3>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-custom rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="bi bi-telephone-fill text-white"></i>
                        </div>
                        <span class="text-gray-600">+62 812-3456-7890</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-custom rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="bi bi-envelope-fill text-white"></i>
                        </div>
                        <span class="text-gray-600">bisnis@alfazagrilled.biz.id</span>
                    </li>
                </ul>
            </div>

            <!-- Maps (replace Newsletter) -->
            <div class="mt-8 md:mt-0">
                <h3 class="text-xl font-bold text-gray-800 mb-6 relative inline-block">
                    Lokasi Kami
                    <div class="absolute bottom-0 left-0 w-1/2 h-1 bg-custom rounded-full"></div>
                </h3>
                <p class="text-gray-600 text-sm mb-6">Kunjungi lokasi kami di peta berikut:</p>
                <div class="rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                    <iframe
                        width="100%"
                        height="200"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.313492415425!2d109.1457562!3d-6.852975600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb79c0e41f47b%3A0x8645589da09dd1c!2sWarung%20Makan%20Kharisma!5e0!3m2!1sid!2sid!4v1748546058570!5m2!1sid!2sid">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-100 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-sm text-gray-600">
                Dibuat oleh tim AlfazaGrilled di Tegal
                </p>
                <div class="flex items-center space-x-6 text-sm text-gray-600">
                &copy; {{ date('Y') }} AlfazaGrilled. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</footer>