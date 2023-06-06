<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Customer API
Route::post('/register/customer', [DeliveryController::class, 'registerCustomer']);

Route::post('/update/customer', [DeliveryController::class, 'updateCustomer']);

Route::post('/add/order', [DeliveryController::class, 'addOrder']);

Route::post('/update/order', [DeliveryController::class, 'updateOrder']);

Route::get('/get/customer/orders/{customer_id}', [DeliveryController::class, 'getCustomerOders']);

Route::post('/cancel/order', [DeliveryController::class, 'cancelOrder']);


//Deliverer API
Route::post('/order/payment', [DeliveryController::class, 'orderPayment']);

Route::post('/get/orders/per/area', [DeliveryController::class, 'getOrdersPerArea']);

Route::post('/update/status/of/order', [DeliveryController::class, 'updateStatusOfOrder']);

Route::post('/add/delivered/by', [DeliveryController::class, 'addDeliveredBy']);

Route::post('/reason/for/nondelivery', [DeliveryController::class, 'reasonForNonDelivery']);
