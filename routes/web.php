<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [AdminController::class, 'dashboard']);

Route::get('/', [AdminController::class, 'loginPage']);

Route::get('/add/dispatcher/page', [AdminController::class, 'addDispatcherPage']);


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
