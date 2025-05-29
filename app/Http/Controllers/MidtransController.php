<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function handleCallback(Request $request)
    {
        $payload = $request->all();
        Log::info('Midtrans callback received', $payload);

        $orderId = $payload['order_id'] ?? null;
        $transactionStatus = $payload['transaction_status'] ?? null;
        $paymentType = $payload['payment_type'] ?? null;
        $fraudStatus = $payload['fraud_status'] ?? null;

        $order = Orders::where('order_number', $orderId)->first();
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update status order sesuai status dari Midtrans
        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            $order->payment_status = 'paid';
            $order->status = 'confirmed';
        } elseif ($transactionStatus == 'pending') {
            $order->payment_status = 'pending';
            $order->status = 'pending';
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $order->payment_status = 'failed';
            $order->status = 'cancelled';
        }
        $order->save();

        return response()->json(['message' => 'Callback processed']);
    }
} 