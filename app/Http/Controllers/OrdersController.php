<?php

namespace App\Http\Controllers;

use App\Classes\Data;
use App\Classes\Queries;
use App\Classes\Response;
use App\Http\Requests\AddAreaRequest;
use App\Http\Requests\AddCylinderRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DateOfDeliveryRequest;
use App\Http\Requests\PaymentDateRequest;
use App\Http\Requests\PaymentNumberRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UpdateCylinderRequest;
use App\Http\Requests\UpdateUserRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    //
    public function addUser(CreateUserRequest $request)
    {
        try {
            Queries::createUser($request);
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function updateUser(UpdateUserRequest $request)
    {
        try {
            Queries::updateUser($request);
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }


    public function addCylinder(AddCylinderRequest $request)
    {
        try {
            Queries::addCylinder($request);
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function updateCylinder(UpdateCylinderRequest $request)
    {
        try {
            Queries::updateCylinder($request);
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function addArea(AddAreaRequest $request)
    {
        try {
            Queries::addArea($request);
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
        return Data::getAllUsers();
    }

    public function listOfCustomers()
    {
        return Data::getAllCustomers();
    }

    public function listOfPayments()
    {
        return Data::getAllPayments();
    }
}
