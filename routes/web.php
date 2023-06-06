<?php

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

Route::get('/', function () {
    return view('starter');
});



//Admin 
Route::post('/add/user', [OrdersController::class, 'addUser']);

Route::post('/update/user', [OrdersController::class, 'updateUser']);

Route::post('/filter/orders/by/customer', [OrdersController::class, 'filterOrdersByCustomer']);

Route::post('/filter/orders/by/date/of/delivery', [OrdersController::class, 'filterOrdersByDateOfDelivery']);

Route::post('/filter/customers', [OrdersController::class, 'filterCustomers']);

Route::post('/filter/users', [OrdersController::class, 'filterUsers']);

Route::post('/filter/payments/by/payment/number', [OrdersController::class, 'filterPaymentsByPaymentNumber']);

Route::post('/filter/payments/by/payment/date', [OrdersController::class, 'filterPaymentsByPaymentDate']);

Route::post('/list/of/admins', [OrdersController::class, 'listOfAdmins']);

Route::post('/list/of/customers', [OrdersController::class, 'listOfCustomers']);

Route::post('/list/of/payments', [OrdersController::class, 'listOfPayments']);


Route::post('/add/cylinder', [OrdersController::class, 'addCylinder']);

Route::post('/update/cylinder', [OrdersController::class, 'updateCylinder']);

Route::post('/add/area', [OrdersController::class, 'addArea']);
