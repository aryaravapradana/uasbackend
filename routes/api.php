<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/payments/initiate', [PaymentController::class, 'initiatePayment']);

Route::post('/payments/notification', [PaymentController::class, 'handlePaymentNotification']);
