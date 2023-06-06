<?php

namespace App\Http\Controllers;

use App\Classes\Queries;
use App\Classes\Response;

use App\Http\Requests\AddOrderRequest;
use App\Http\Requests\CancelOrderRequest;
use App\Http\Requests\DeliveredByRequest;
use App\Http\Requests\NonDeliveryReasonRequest;
use App\Http\Requests\OrderPaymentRequest;
use App\Http\Requests\RegisterCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\UpdateOrderStatusRequest;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeliveryController extends Controller
{
    //


    public function registerCustomer(RegisterCustomerRequest $request)
    {
        try {
            Queries::addCustomer($request);
            return Response::response(true, 'Customer added successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }


    public function updateCustomer(UpdateCustomerRequest $request)
    {
        try {
            Queries::updateCustomer($request);
            return Response::response(true, 'Customer updated successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }



    public function addOrder(AddOrderRequest $request)
    {
        try {
            Queries::addOrder($request);
            return Response::response(true, 'Order added successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function updateOrder(UpdateOrderRequest $request)
    {
        try {
            Queries::updateOrder($request);
            return Response::response(true, 'Order updated successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }


    public function updateStatusOfOrder(UpdateOrderStatusRequest $request)
    {
        try {
            Queries::changeStatusOfOrder($request);
            return Response::response(true, 'Status of order updated successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function addDeliveredBy(DeliveredByRequest $request)
    {
        try {
            Queries::addDeliveredBy($request);
            return Response::response(true, 'Delivered by added successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function reasonForNonDelivery(NonDeliveryReasonRequest $request)
    {
        try {
            Queries::addReasonForNonDelivery($request);
            return Response::response(true, 'Reason for non delivery added successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function orderPayment(OrderPaymentRequest $request)
    {
        try {
            Queries::addOrderPayment($request);
            return Response::response(true, 'Payment order added successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }
    public function cancelOrder(CancelOrderRequest $request)
    {
        try {
            Queries::cancelOrder($request);
            return Response::response(true, 'Order cancelled successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }



    public function getOrdersPerArea(Request $request)
    {

        return   Queries::getUserAreaOrders($request);
    }

    public function getCustomerOders($customer_id)
    {


        return   Queries::getCustomerOrders($customer_id);
    }
}
