<div id="ordersContent" class="tab-content hidden">
    <div class="p-4 md:p-6">
        <div class="space-y-3 md:space-y-4">
            @forelse($orders as $order)
                <a href="{{ route('orders.detail', $order->id) }}" class="block">
                    <div
                        class="bg-white p-3 md:p-4 rounded-lg shadow-sm border border-gray-200 transition duration-300 ease-in-out hover:shadow-md">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-2">
                            <div class="mb-2 md:mb-0">
                                <div class="flex items-center">
                                    <span class="text-xs md:text-sm text-gray-500">ORD-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                                    <span
                                        class="ml-2 text-xs md:text-sm font-medium text-custom">{{ Carbon\Carbon::parse($order->created_at)->locale('id')->isoFormat('DD MMMM YYYY') }}</span>
                                </div>
                            </div>
                            <span
                                class="inline-block px-2 md:px-3 py-1 text-xs md:text-sm rounded-full 
                                @if ($order->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->status == 'awaiting payment') bg-blue-100 text-blue-800
                                @elseif($order->status == 'confirmed') bg-blue-100 text-blue-800
                                @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                @elseif($order->status == 'delivered') bg-blue-100 text-blue-800
                                @elseif($order->status == 'completed') bg-green-100 text-green-800
                                @elseif($order->status == 'cancelled') bg-red-100 text-red-800 @endif">
                                {{ ucfirst($order->status_label) }}
                            </span>
                        </div>
                        <div class="border-t border-gray-100 pt-2">
                            <div class="text-xs md:text-sm text-gray-600">
                                Total Pembayaran: <span class="font-medium text-gray-900">Rp
                                    {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="mt-2 text-xs md:text-sm text-custom">
                            <i class="bi bi-eye-fill mr-1"></i> Lihat Detail
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center py-6 md:py-8">
                    <i class="bi bi-bag-x text-3xl md:text-4xl text-gray-400"></i>
                    <i class="bi bi-emoji-frown text-3xl md:text-4xl text-gray-400 ml-2"></i>
                    <p class="mt-2 text-sm md:text-base text-gray-500">Belum ada riwayat pesanan </p>
                </div>
            @endforelse
        </div>
    </div>
    <div class="mt-4 flex justify-center">
        {{ $orders->links('vendor.pagination.custom') }}
    </div>
</div>
