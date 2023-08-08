<?php

use App\Http\Controllers\AdminController;
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

Route::post('/add/gas/exchange', [DeliveryController::class, 'addGasExchange']);

Route::post('/update/gas/exchange', [DeliveryController::class, 'updateGasExchange']);

Route::post('/cancel/gas/exchange', [DeliveryController::class, 'cancelgasExchange']);


//Deliverer API
Route::post('/order/payment', [DeliveryController::class, 'orderPayment']);

Route::post('/get/orders/per/area', [DeliveryController::class, 'getOrdersPerArea']);

Route::post('/update/status/of/order', [DeliveryController::class, 'updateStatusOfOrder']);

Route::post('/add/delivered/by', [DeliveryController::class, 'addDeliveredBy']);

Route::post('/reason/for/nondelivery', [DeliveryController::class, 'reasonForNonDelivery']);


//Admin Dashboard API

//Route::get('/add/dispatcher/page', [AdminController::class, 'addDispatcherPage']);


Route::post('/add-dispatcher', [AdminController::class, 'addDispatcher']);


Route::get('/dispatcher/list', [AdminController::class, 'dispatcherList']);

Route::get('/cylinders', [AdminController::class, 'cylinderList']);

//Admin 
//Route::post('/add/user', [OrdersController::class, 'addUser']);

Route::post('/update/dispatcher', [OrdersController::class, 'updateDispatcher']);

Route::post('/filter/orders/by/customer', [OrdersController::class, 'filterOrdersByCustomer']);

Route::post('/filter/orders/by/date/of/delivery', [OrdersController::class, 'filterOrdersByDateOfDelivery']);

Route::post('/filter/customers', [OrdersController::class, 'filterCustomers']);

Route::post('/filter/users', [OrdersController::class, 'filterUsers']);

Route::post('/filter/payments/by/payment/number', [OrdersController::class, 'filterPaymentsByPaymentNumber']);

Route::post('/filter/payments/by/payment/date', [OrdersController::class, 'filterPaymentsByPaymentDate']);

Route::get('/list/of/admins', [OrdersController::class, 'listOfAdmins']);

Route::post('/add/admin', [OrdersController::class, 'addAdmin']);

Route::get('/list/of/customers', [OrdersController::class, 'listOfCustomers']);

Route::get('/list/of/payments', [OrdersController::class, 'listOfPayments']);


Route::post('/add/cylinder', [OrdersController::class, 'addCylinder']);

Route::post('/update/cylinder', [OrdersController::class, 'updateCylinder']);

Route::post('/add/area', [OrdersController::class, 'addArea']);

Route::get('/areas', [OrdersController::class, 'areaList']);

Route::get('/gas/orders', [OrdersController::class, 'getAllOrders']);

Route::get('/gas/exchanges', [OrdersController::class, 'getGasExchanges']);

Route::get('/order/details/{order_id}', [OrdersController::class, 'orderDetails']);
