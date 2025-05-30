@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 mt-16">
        <!-- Header -->
        <div class="mb-6" >
            <h1 class="text-2xl font-bold text-gray-800">Profil Saya</h1>
            <p class="text-gray-600">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Sidebar -->
            <div class="lg:col-span-4 xl:col-span-3" >
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <!-- Profile Photo -->
                    <div class="text-center">
                        <div class="relative inline-block mb-4">
                            <div class="w-32 h-32 relative mx-auto">
                                <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/user.svg') }}"
                                    class="w-full h-full object-cover rounded-full border-4 border-white shadow"
                                    alt="Profile Photo">

                                <form id="profilePhotoForm" action="{{ route('pelanggan.profile.update') }}" method="POST"
                                    enctype="multipart/form-data" class="absolute -bottom-2 -right-2">
                                    @csrf
                                    @method('PATCH')
                                    <label for="photoUpload"
                                        class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center cursor-pointer hover:bg-gray-50 transition-colors">
                                        <i class="bi bi-camera-fill text-custom"></i>
                                    </label>
                                    <input type="file" id="photoUpload" name="photo" class="hidden" accept="image/*"
                                        onchange="uploadProfilePhoto(this)">
                                </form>
                            </div>
                        </div>

                        <h2 class="text-xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                        <p class="text-gray-500 mb-4">
                            <i class="bi bi-person-badge me-2"></i>Pelanggan
                        </p>

                        <!-- Stats -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="text-sm text-gray-600">Total Pesanan</div>
                                <div class="text-sm font-bold text-custom-secondary">
                                    {{ Auth::user()->order ? Auth::user()->order->count() : 0 }}</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="text-sm text-gray-600">Bergabung Sejak</div>
                                <div class=" text-sm font-bold text-custom-secondary">
                                    {{ Auth::user()->created_at->locale('id')->diffForHumans() }}
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="space-y-3">
                            <a href="{{ route('home.index') }}"
                                class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                <i class="bi bi-arrow-left me-2"></i>
                                Kembali ke Beranda
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center px-4 py-2 border border-custom rounded-lg text-custom hover:bg-red-50 transition-colors">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-8 xl:col-span-9" >
                <div class="bg-white rounded-lg shadow-sm">
                    <!-- Tabs -->
                    <div class="border-b border-gray-200">
                        <nav class="flex -mb-px overflow-x-auto no-scrollbar">
                            <button data-tab="profile"
                                class="tab-button px-4 sm:px-6 py-3 sm:py-4 border-b-2 border-custom font-medium transition-colors whitespace-nowrap">
                                <i class="bi bi-person me-2"></i><span class="hidden sm:inline">Informasi
                                    Pribadi</span><span class="sm:hidden">Profil</span>
                            </button>
                            <button data-tab="orders"
                                class="tab-button px-4 sm:px-6 py-3 sm:py-4 border-b-2 border-transparent font-medium transition-colors whitespace-nowrap">
                                <i class="bi bi-bag me-2"></i><span class="hidden sm:inline">Riwayat Pesanan</span><span
                                    class="sm:hidden">Pesanan</span>
                            </button>
                            <button data-tab="addresses"
                                class="tab-button px-4 sm:px-6 py-3 sm:py-4 border-b-2 border-transparent font-medium transition-colors whitespace-nowrap">
                                <i class="bi bi-geo-alt me-2"></i><span class="hidden sm:inline">Alamat
                                    Tersimpan</span><span class="sm:hidden">Alamat</span>
                            </button>
                            <button data-tab="stats" id="statsTab"
                                class="tab-button px-4 sm:px-6 py-3 sm:py-4 border-b-2 border-transparent font-medium transition-colors whitespace-nowrap">
                                <i class="bi bi-graph-up me-2"></i><span class="hidden sm:inline">Statistik</span><span
                                    class="sm:hidden">Stats</span>
                            </button>
                        </nav>
                    </div>

                    <!-- Tab Contents -->
                    <div id="profileContent" class="tab-content">
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                                <!-- Email Section -->
                                <div class="md:col-span-2">
                                    <div class="bg-gray-50 p-4 sm:p-6 rounded-lg border border-gray-200">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                            <i class="bi bi-envelope me-2 text-custom"></i>Email
                                        </h3>

                                        <form action="{{ route('pelanggan.profile.change-email') }}" method="POST"
                                            id="emailForm">
                                            @csrf
                                            @method('PATCH')

                                            <div class="flex flex-col sm:flex-row gap-3">
                                                <input type="email" name="email" value="{{ auth()->user()->email }}"
                                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom focus:border-custom transition duration-150 @error('email') border-red-500 @enderror"
                                                    {{ auth()->user()->email_changed ? 'disabled' : '' }} required>

                                                @if (!auth()->user()->email_changed)
                                                    <button type="submit"
                                                        class="w-full sm:w-44 px-4 py-2 bg-custom text-white font-medium rounded-lg hover:bg-red-600 transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                                        <i class="bi bi-arrow-clockwise me-2"></i>
                                                        <span>Update Email</span>
                                                    </button>
                                                @endif
                                            </div>

                                            @if (auth()->user()->email_changed)
                                                <div class="flex items-center mt-3 p-3 bg-red-50 text-red-600 rounded-lg">
                                                    <i class="bi bi-info-circle me-2"></i>
                                                    <p class="text-sm">
                                                        Email hanya dapat diubah 1 kali dan Anda sudah menggunakan
                                                        kesempatan tersebut.
                                                    </p>
                                                </div>
                                            @else
                                                <div
                                                    class="flex items-center mt-3 p-3 bg-gray-100 text-gray-600 rounded-lg">
                                                    <i class="bi bi-info-circle me-2"></i>
                                                    <p class="text-sm">
                                                        Perhatian: Email hanya dapat diubah 1 kali.
                                                    </p>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <!-- Password Section -->
                                <div class="md:col-span-2">
                                    <div class="bg-gray-50 p-4 sm:p-6 rounded-lg border border-gray-200">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                            <i class="bi bi-key-fill me-2 text-custom"></i>Password
                                        </h3>

                                        <form action="{{ route('pelanggan.profile.change-password') }}" method="POST"
                                            id="passwordForm">
                                            @csrf
                                            @method('PATCH')

                                            <div class="flex flex-col sm:flex-row gap-3">
                                                <input type="password" name="password"
                                                    placeholder="Masukkan password baru"
                                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom focus:border-custom transition duration-150 @error('password') border-red-500 @enderror"
                                                    {{ (int) auth()->user()->password_changed >= 3 ? 'disabled' : '' }}
                                                    required>

                                                @if ((int) auth()->user()->password_changed < 3)
                                                    <button type="submit"
                                                        class="w-full sm:w-44 px-4 py-2 bg-custom text-white font-medium rounded-lg hover:bg-red-600 transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                                        <i class="bi bi-key-fill me-2"></i>
                                                        <span>Ubah Password</span>
                                                    </button>
                                                @endif
                                            </div>

                                            @if ((int) auth()->user()->password_changed >= 3)
                                                <div class="flex items-center mt-3 p-3 bg-red-50 text-red-600 rounded-lg">
                                                    <i class="bi bi-info-circle me-2"></i>
                                                    <p class="text-sm">
                                                        Password hanya dapat diubah 3 kali dan Anda sudah menggunakan
                                                        kesempatan tersebut.
                                                    </p>
                                                </div>
                                            @else
                                                <div
                                                    class="flex items-center mt-3 p-3 bg-gray-100 text-gray-600 rounded-lg">
                                                    <i class="bi bi-info-circle me-2"></i>
                                                    <p class="text-sm">
                                                        Sisa kesempatan mengubah password:
                                                        {{ 3 - (int) auth()->user()->password_changed }}
                                                    </p>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <!-- Form Informasi Pribadi -->
                                <form action="{{ route('pelanggan.profile.update') }}" method="POST"
                                    class="md:col-span-2">
                                    @csrf
                                    @method('PUT')

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                        <!-- Personal Information -->
                                        <div class="space-y-6">
                                            <h3 class="text-lg font-semibold text-gray-900">Informasi Pribadi</h3>

                                            <div class="space-y-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                                        <i class="bi bi-person me-2 text-custom"></i>Nama Lengkap
                                                    </label>
                                                    <input type="text" name="name"
                                                        value="{{ Auth::user()->name }}"
                                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom focus:border-custom transition duration-150">
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                                        <i class="bi bi-phone me-2 text-custom"></i>Nomor Telepon
                                                    </label>
                                                    <input type="tel" name="telepon"
                                                        value="{{ Auth::user()->telepon }}"
                                                        class="w-full px-4 py-3 border @error('telepon') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-custom focus:border-custom transition duration-150"
                                                        required pattern="[0-9]{10,13}"
                                                        title="Masukkan nomor telepon yang valid (10-13 digit)">
                                                    @error('telepon')
                                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Additional Information -->
                                        <div class="space-y-6">
                                            <h3 class="text-lg font-semibold text-gray-900">Informasi Tambahan</h3>

                                            <div class="space-y-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                                        <i class="bi bi-calendar me-2 text-custom"></i>Tanggal Lahir
                                                    </label>
                                                    <input type="date" name="tgl_lahir"
                                                        value="{{ Auth::user()->tgl_lahir }}"
                                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom focus:border-custom transition duration-150">
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                                        <i class="bi bi-gender-ambiguous me-2 text-custom"></i>Jenis
                                                        Kelamin
                                                    </label>
                                                    <input type="text" name="jenis_kelamin"
                                                        value="{{ Auth::user()->jenis_kelamin }}" disabled
                                                        class="w-full px-4 py-3 border border-gray-300 bg-gray-50 text-gray-600 rounded-lg cursor-not-allowed">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mt-2 flex justify-end">
                                        <button type="submit"
                                            class="px-8 py-2 bg-custom text-white font-medium rounded-lg hover:bg-red-600 transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @include('components.profile_user.order_profile')
                    @include('components.profile_user.address_profile')
                    @include('components.profile_user.statistik_profile')
                    @include('components.profile_user.address-modals-profile')
                </div>
            </div>
        </div>

        @push('scripts')
            <script src="{{ asset('js/profile.js') }}"></script>
            <script src="{{ asset('js/address-profile.js') }}"></script>
        @endpush

        {{-- Kode Memanggil Modal Alamat --}}
        @push('scripts')
            <script>
                // Address Modal Functions
                function showAddAddressModal() {
                    document.getElementById('modalTitle').textContent = 'Tambah Alamat Baru';
                    document.getElementById('addressForm').action = "{{ route('addresses.store') }}";
                    document.getElementById('methodField').innerHTML = '@csrf';

                    // Reset form
                    document.getElementById('addressLabel').value = '';
                    document.getElementById('receiverName').value = '';
                    document.getElementById('phoneNumber').value = '';
                    document.getElementById('fullAddress').value = '';

                    document.getElementById('addressModal').classList.remove('hidden');
                }

                function editAddress(addressId) {
                    fetch(`/addresses/${addressId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('modalTitle').textContent = 'Edit Alamat';
                            document.getElementById('addressForm').action = `/addresses/${addressId}`;
                            document.getElementById('methodField').innerHTML = `
                    @csrf
                    @method('PUT')
                `;

                            // Fill form with address data
                            document.getElementById('addressLabel').value = data.label;
                            document.getElementById('receiverName').value = data.receiver_name;
                            document.getElementById('phoneNumber').value = data.phone_number;
                            document.getElementById('fullAddress').value = data.full_address;

                            document.getElementById('addressModal').classList.remove('hidden');
                        });
                }

                function closeAddressModal() {
                    document.getElementById('addressModal').classList.add('hidden');
                }
            </script>
        @endpush

        {{-- Kode Notif --}}
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // SweetAlert2 configuration
                    @if (session('success'))
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: "{{ session('success') }}",
                            timer: 2000,
                            showConfirmButton: false,
                            background: '#fff',
                            iconColor: '#4CAF50'
                        });
                    @endif

                    @if (session('error'))
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan!',
                            text: "{{ session('error') }}",
                            timer: 3000,
                            showConfirmButton: false
                        });
                    @endif

                    @if ($errors->any())
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan!',
                            text: "{{ $errors->first() }}",
                            timer: 3000,
                            showConfirmButton: false
                        });
                    @endif
                });
            </script>
        @endpush

        {{-- Kode untuk Menginisialisasi Tabs Aktif --}}
        @push('scripts')
            <script>
                const tabs = document.querySelectorAll('.tab-button');
                const contents = document.querySelectorAll('.tab-content');

                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        const target = tab.getAttribute('data-tab');

                        // Remove active class from all tabs
                        tabs.forEach(t => {
                            t.classList.remove('border-custom');
                            t.classList.add('border-transparent');
                        });

                        // Add active class to clicked tab
                        tab.classList.remove('border-transparent');
                        tab.classList.add('border-custom');

                        // Hide all contents
                        contents.forEach(content => {
                            content.classList.add('hidden');
                        });

                        // Show target content
                        document.getElementById(`${target}Content`).classList.remove('hidden');

                        // Initialize charts if stats tab is clicked
                        if (target === 'stats') {
                            setTimeout(initCharts, 100);
                        }
                    });
                });
            </script>
        @endpush

        <!-- Chart.js -->
        @push('scripts')
            <script>
                let orderChart = null;
                let statusChart = null;

                // Data untuk grafik
                const orderData = {!! json_encode([
                    'labels' => Auth::user()->order->groupBy(function ($order) {
                            return $order->created_at->format('F Y');
                        })->map(function ($items) {
                            return $items->count();
                        })->keys()->toArray(),
                    'data' => Auth::user()->order->groupBy(function ($order) {
                            return $order->created_at->format('F Y');
                        })->map(function ($items) {
                            return $items->count();
                        })->values()->toArray(),
                ]) !!};

                const statusData = {!! json_encode([
                    'labels' => Auth::user()->order->groupBy('status')->map(function ($orders, $status) {
                            return ucfirst($orders->first()->status_label);
                        })->values()->toArray(),
                    'data' => Auth::user()->order->groupBy('status')->map(function ($items) {
                            return $items->count();
                        })->values()->toArray(),
                ]) !!};

                function initCharts() {
                    // Destroy existing charts if they exist
                    if (orderChart) {
                        orderChart.destroy();
                    }
                    if (statusChart) {
                        statusChart.destroy();
                    }

                    // Grafik Pesanan per Bulan
                    const orderCtx = document.getElementById('orderChart');
                    if (orderCtx) {
                        orderChart = new Chart(orderCtx, {
                            type: 'line',
                            data: {
                                labels: orderData.labels,
                                datasets: [{
                                    label: 'Jumlah Pesanan',
                                    data: orderData.data,
                                    borderColor: '#FF6B6B',
                                    backgroundColor: 'rgba(255, 107, 107, 0.1)',
                                    borderWidth: 2,
                                    fill: true
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1
                                        }
                                    }
                                }
                            }
                        });
                    }

                    // Grafik Status Pesanan
                    const statusCtx = document.getElementById('statusChart');
                    if (statusCtx) {
                        statusChart = new Chart(statusCtx, {
                            type: 'doughnut',
                            data: {
                                labels: statusData.labels,
                                datasets: [{
                                    data: statusData.data,
                                    backgroundColor: [
                                        '#FF6B6B',
                                        '#4ECDC4',
                                        '#45B7D1',
                                        '#96CEB4',
                                        '#FFEEAD'
                                    ]
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }
                        });
                    }
                }
            </script>
        @endpush
    @endsection
