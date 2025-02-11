<?php

use App\Http\Middleware\VendorMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderPaymentController;

// Authentication Routes
Route::post('register/', [AuthController::class, 'register']);

Route::post('login/', [AuthController::class, 'login'])->name('login');

Route::apiResource('products', ProductController::class);

Route::apiResource('sub-categories', SubCategoryController::class);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    // SubCategory Routes

    // Vendor Routes
    // Route::apiResource('vendors', VendorController::class);

   

    // Product Variants
    // Route::apiResource('product-variants', ProductVariantController::class);

    // Order Routes
    Route::apiResource('orders', OrderController::class);

    // Order Items
    Route::apiResource('order-items', OrderItemController::class);

    // Order Payments
    Route::apiResource('order-payments', OrderPaymentController::class);

    // Vendor-Specific Routes (Only Vendors Can Access)
    Route::middleware(['auth:sanctum', 'vendor'])->group(function () {
        Route::get('vendor/products', [VendorController::class, 'vendorProducts']);
        Route::post('vendor/products/', [VendorController::class, 'vendorStoreProducts']);
        Route::get('vendor/products/{id}', [VendorController::class, 'show']);
        Route::put('vendor/products/{id}', [VendorController::class, 'update']);
        Route::delete('vendor/products/{id}', [VendorController::class, 'destroy']);
        Route::get('vendor/orders', [VendorController::class, 'vendorOrders']);
        Route::put('vendor/orders/{id}/status', [VendorController::class, 'updateOrderStatus']);
        Route::apiResource('users', UserController::class);
        Route::apiResource('categories', CategoryController::class);

    });
});
