<?php

namespace App\Http\Controllers;

use App\Classes\Data;
use App\Classes\Queries;
use App\Classes\Response;
use App\Http\Requests\AddAreaRequest;
use App\Http\Requests\AddCylinderRequest;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DateOfDeliveryRequest;
use App\Http\Requests\PaymentDateRequest;
use App\Http\Requests\PaymentNumberRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UpdateCylinderRequest;
use App\Http\Requests\UpdateDispatcherRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Gas_Exchange;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{

    public function addAdmin(CreateAdminRequest $request)
    {
        try {
            Queries::createAdmin($request);

            return Response::response(true, 'Admin added successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }



    public function addCylinder(AddCylinderRequest $request)
    {
        try {
            Queries::addCylinder($request);

            return Response::response(true, 'Cylinder added successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function updateCylinder(UpdateCylinderRequest $request)
    {
        try {
            Queries::updateCylinder($request);
            return Response::response(true, 'Cylinder updated successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function addArea(AddAreaRequest $request)
    {
        try {
            Queries::addArea($request);
            return Response::response(true, 'Area added successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }


    public function filterOrdersByCustomer($customer_id)
    {
        return Data::getOrderByCustomerId($customer_id);
    }

    public function filterOrdersByDateOfDelivery(DateOfDeliveryRequest $request)
    {
        return Data::getOrdersByDateOfDelivery($request);
    }

    public function filterOrdersByDateDelivered(DateOfDeliveryRequest $request)
    {
        return Data::getOrdersByDateDelivered($request);
    }


    public function filterCustomers(SearchRequest $request)
    {
        return  Data::searchCustomers($request);
    }

    public function filterUsers(SearchRequest $request)
    {
        return Data::searchUsers($request);
    }

    public function filterPaymentsByPaymentNumber(PaymentNumberRequest $request)
    {
        return Data::searchPaymentsByPaymentNumber($request);
    }

    public function filterPaymentsByPaymentDate(PaymentDateRequest $request)
    {
        return Data::searchPaymentsByPaymentDate($request);
    }

    public function listOfAdmins()
    {
        $admins = Data::getAllAdmins();
        return $admins;
    }

    public function listOfCustomers()
    {
        $customers = Data::getAllCustomers();
        return $customers;
    }

    public function listOfPayments()
    {
        $payments = Data::getAllPayments();

        return $payments;
    }

    public function getAllOrders()
    {
        $orders = Data::getOrders();

        return $orders;
    }

    public function areaList()
    {
        $areas = Data::areaList();
        return $areas;
    }



    public function getGasExchanges()
    {
        $exchanges = Data::gasExchanges();
        return $exchanges;
    }
}
