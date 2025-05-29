@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <!-- Card Pending -->
                <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
                    <!-- Icon Pending -->
                    <div class="flex justify-center mb-6">
                        <div class="w-20 h-20 rounded-full bg-yellow-100 flex items-center justify-center">
                            <i class="bi bi-hourglass-split text-4xl text-yellow-500"></i>
                        </div>
                    </div>

                    <!-- Pesan Pending -->
                    <div class="text-center mb-8">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">
                            Pembayaran Sedang Diproses
                        </h1>
                        <p class="text-gray-600">
                            Terima kasih <span class="font-bold">{{ explode(' ', Auth::user()->name)[0] }}</span> telah berbelanja di AlfazaGrilled.<br>
                            Pembayaran Anda sedang diproses oleh Midtrans. Silakan cek status pembayaran secara berkala.
                        </p>
                    </div>

                    <!-- Detail Pesanan -->
                    <div class="space-y-6">
                        <!-- Nomor Pesanan -->
                        <div class="bg-gray-50 rounded-xl p-4">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                <span class="text-gray-600 mb-1 sm:mb-0">Nomor Pesanan:</span>
                                <span class="font-semibold text-gray-800">ORD-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>
                        <!-- Tanggal Pesanan -->
                        <div class="bg-gray-50 rounded-xl p-4">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                <span class="text-gray-600 mb-1 sm:mb-0">Tanggal Pesanan:</span>
                                <span class="font-semibold text-gray-800">{{ $order->created_at->format('d F Y H:i') }}</span>
                            </div>
                        </div>
                        <!-- Total Pembayaran -->
                        <div class="bg-gray-50 rounded-xl p-4">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                <span class="text-gray-600 mb-1 sm:mb-0">Total Pembayaran:</span>
                                <span class="font-bold text-lg sm:text-xl text-custom">
                                    Rp{{ number_format($order->total_amount, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                        <!-- Metode Pembayaran -->
                        <div class="bg-gray-50 rounded-xl p-4">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                <span class="text-gray-600 mb-1 sm:mb-0">Metode Pembayaran:</span>
                                <span class="font-semibold text-gray-800">
                                    @if ($order->payment_method === 'midtrans')
                                        Midtrans (Virtual Account, e-Wallet, dll)
                                    @elseif($order->payment_method === 'transfer')
                                        Transfer Bank
                                    @elseif($order->payment_method === 'Cash on Delivery')
                                        Cash on Delivery (COD)
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Status Pesanan -->
                    <div class="bg-yellow-50 rounded-xl p-4 mt-6">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                            <span class="text-yellow-700 mb-2 sm:mb-0">Status:</span>
                            <span class="px-3 py-1 rounded-full text-sm font-medium self-start sm:self-auto bg-yellow-100 text-yellow-800">
                                Pending
                            </span>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-8 space-y-4 sm:space-y-0 sm:flex sm:space-x-4">
                        <a href="{{ route('home.index') }}"
                            class="w-full sm:w-1/2 block text-center px-6 py-3 border-2 border-custom text-custom font-semibold rounded-lg hover:bg-red-50 transition duration-200">
                            <i class="bi bi-house-door mr-2"></i>Kembali ke Beranda
                        </a>
                        <a href="{{ route('orders.detail', $order->id) }}"
                            class="w-full sm:w-1/2 block text-center px-6 py-3 bg-custom text-white font-semibold rounded-lg hover:bg-red-700 transition duration-200">
                            <i class="bi bi-box-seam mr-2"></i>Lihat Detail Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 