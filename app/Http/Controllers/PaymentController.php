<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $order = Order::findOrFail($request->order_id);

            if ($order->status === 'paid' || $order->status === 'completed') {
                return response()->json(['message' => 'Pesanan ini sudah dibayar atau tidak dapat diproses lagi.'], 400);
            }

            $transactionId = 'TXN-' . Str::uuid()->toString();

            $payment = Payment::create([
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'amount' => $request->amount,
                'currency' => 'IDR',
                'method' => 'dummy_gateway',
                'status' => 'paid', // Always set as paid for dummy gateway
                'transaction_id' => $transactionId,
                'paid_at' => now(),
                'payment_gateway_response' => [
                    'status' => 'paid',
                    'message' => 'Transaksi berhasil.',
                    'transaction_id' => $transactionId,
                    'amount' => $request->amount,
                    'timestamp' => now()->toDateTimeString(),
                ],
            ]);

            $order->update(['status' => 'paid']);

            Log::info('Pembayaran diproses:', [
                'payment_id' => $payment->id,
                'order_id' => $order->id,
                'status' => 'paid',
            ]);

            return response()->json([
                'message' => 'Pembayaran berhasil diproses.',
                'payment_id' => $payment->id,
                'order_id' => $order->id,
                'status' => 'paid',
                'transaction_id' => $transactionId,
            ], 200);

        } catch (\Throwable $th) {
            Log::error('Error saat inisiasi pembayaran: ' . $th->getMessage(), [
                'trace' => $th->getTraceAsString(),
                'request_data' => $request->all(),
            ]);
            return response()->json(['message' => 'Gagal menginisiasi pembayaran.', 'error' => $th->getMessage()], 500);
        }
    }
    // old code that simulates stupid fucking payment gateway and could fail sometimes 
    // public function initiatePayment(Request $request)
    // {
    //     $request->validate([
    //         'order_id' => 'required|exists:orders,id',
    //         'amount' => 'required|numeric|min:1',
    //     ]);

    //     try {
    //         $order = Order::findOrFail($request->order_id);

    //         if ($order->status === 'paid' || $order->status === 'completed') {
    //             return response()->json(['message' => 'Pesanan ini sudah dibayar atau tidak dapat diproses lagi.'], 400);
    //         }

    //         $payment = Payment::create([
    //             'order_id' => $order->id,
    //             'user_id' => $order->user_id,
    //             'amount' => $request->amount,
    //             'currency' => 'IDR',
    //             'method' => 'dummy_gateway',
    //             'status' => 'pending',
    //             'transaction_id' => null,
    //             'payment_gateway_response' => null,
    //         ]);

    //         $isPaid = ($request->amount % 2 == 0);
    //         $simulatedStatus = $isPaid ? 'paid' : 'failed';
    //         $simulatedTransactionId = 'TXN-' . Str::uuid()->toString();

    //         $payment->update([
    //             'status' => $simulatedStatus,
    //             'transaction_id' => $simulatedTransactionId,
    //             'paid_at' => $isPaid ? now() : null,
    //             'payment_gateway_response' => [
    //                 'status' => $simulatedStatus,
    //                 'message' => 'Simulasi transaksi ' . ($isPaid ? 'berhasil' : 'gagal') . '.',
    //                 'transaction_id' => $simulatedTransactionId,
    //                 'amount' => $request->amount,
    //                 'timestamp' => now()->toDateTimeString(),
    //             ],
    //         ]);

    //         $orderStatus = $simulatedStatus === 'paid' ? 'paid' : 'payment_failed';
    //         $order->update(['status' => $orderStatus]);

    //         Log::info('Pembayaran dummy diproses:', [
    //             'payment_id' => $payment->id,
    //             'order_id' => $order->id,
    //             'status' => $simulatedStatus,
    //         ]);

    //         return response()->json([
    //             'message' => 'Pembayaran dummy diproses.',
    //             'payment_id' => $payment->id,
    //             'order_id' => $order->id,
    //             'status' => $simulatedStatus,
    //             'transaction_id' => $simulatedTransactionId,
    //         ], 200);

    //     } catch (\Throwable $th) {
    //         Log::error('Error saat inisiasi pembayaran dummy: ' . $th->getMessage(), [
    //             'trace' => $th->getTraceAsString(),
    //             'request_data' => $request->all(),
    //         ]);
    //         return response()->json(['message' => 'Gagal menginisiasi pembayaran.', 'error' => $th->getMessage()], 500);
    //     }
    // }

    public function handlePaymentNotification(Request $request)
    {
        Log::info('Notifikasi pembayaran dummy diterima:', $request->all());

        $paymentId = $request->input('payment_id');
        $newStatus = $request->input('status');
        $transactionId = $request->input('transaction_id');

        if (!$paymentId || !$newStatus || !$transactionId) {
            Log::warning('Payload notifikasi tidak valid.', $request->all());
            return response('Payload notifikasi tidak valid', 400);
        }

        try {
            $payment = Payment::where('id', $paymentId)
                              ->where('transaction_id', $transactionId)
                              ->first();

            if (!$payment) {
                Log::warning('Pembayaran tidak ditemukan untuk notifikasi.', ['payment_id' => $paymentId, 'transaction_id' => $transactionId]);
                return response('Pembayaran tidak ditemukan', 404);
            }

            if ($payment->status === 'paid' || $payment->status === 'refunded' || $payment->status === 'canceled') {
                Log::info('Pembayaran sudah dalam status final, abaikan notifikasi.', ['payment_id' => $payment->id, 'current_status' => $payment->status]);
                return response('Pembayaran sudah diproses', 200);
            }

            $payment->update([
                'status' => $newStatus,
                'payment_gateway_response' => array_merge($payment->payment_gateway_response ?? [], $request->all()),
                'paid_at' => ($newStatus === 'paid') ? now() : $payment->paid_at,
            ]);

            if ($payment->order) {
                if ($newStatus === 'paid') {
                    $payment->order->update(['status' => 'paid']);
                } else if ($newStatus === 'failed') {
                    $payment->order->update(['status' => 'payment_failed']);
                } else if ($newStatus === 'canceled') {
                    $payment->order->update(['status' => 'canceled']);
                }
            }

            Log::info('Status pembayaran diperbarui dari notifikasi.', [
                'payment_id' => $payment->id,
                'new_status' => $newStatus,
            ]);

            return response('Notifikasi berhasil diproses', 200);

        } catch (\Throwable $th) {
            Log::error('Error saat memproses notifikasi pembayaran: ' . $th->getMessage(), [
                'trace' => $th->getTraceAsString(),
                'request_data' => $request->all(),
            ]);
            return response('Internal Server Error', 500);
        }
    }
}
