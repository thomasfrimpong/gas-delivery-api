<?php

namespace App\Classes;

use App\Models\Admin;
use App\Models\Area;
use App\Models\Customer;
use App\Models\Cylinder;
use App\Models\Dispatcher;
use App\Models\Gas_Exchange;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;

class Queries
{
    public static function listOfDispatchers()
    {
        return Dispatcher::all();
    }

    public static function createAdmin($data)
    {
        $admin = new Admin;
        $admin->first_name = $data->first_name;
        $admin->last_name = $data->last_name;
        $admin->phone_number = $data->phone_number;

        $admin->email = $data->email;
        $admin->save();
    }

    public static function updateAdmin($data)
    {
        $admin = Admin::find($data->admin_id);
        $admin->first_name = $data->first_name;
        $admin->last_name = $data->last_name;
        $admin->phone_number = $data->phone_number;

        $admin->email = $data->email;
        $admin->save();
    }

    public static function createDispatcher($data)
    {
        $dispatcher = new Dispatcher;
        $dispatcher->first_name = $data->first_name;
        $dispatcher->last_name = $data->last_name;
        $dispatcher->phone_number = $data->phone_number;
        $dispatcher->area_of_operation = json_encode($data->area_of_operation);
        $dispatcher->email = $data->email;
        $dispatcher->save();
    }

    public static function updateDispatcher($data)
    {

        $dispatcher = Dispatcher::find($data->dispatcher_id);
        $dispatcher->first_name = $data->first_name;
        $dispatcher->last_name = $data->last_name;
        $dispatcher->phone_number = $data->phone_number;
        $dispatcher->area_of_operation = $data->area_of_operation;
        $dispatcher->email = $data->email;
        $dispatcher->save();
    }

    public static function addCustomer($data)
    {
        $customer = new Customer;
        $customer->first_name = $data->first_name;
        $customer->other_names = $data->other_names;
        $customer->phone_number = $data->phone_number;
        $customer->save();
    }

    public static function updateCustomer($data)
    {
        $customer = Customer::find($data->customer_id);
        $customer->first_name = $data->first_name;
        $customer->other_names = $data->other_names;
        $customer->phone_number = $data->phone_number;
        $customer->save();
    }

    public static function addCylinder($data)
    {

        $cylinder = new Cylinder;
        $cylinder->size_of_cylinder = $data->size_of_cylinder;
        $cylinder->cost_per_unit = $data->cost_per_unit;
        $cylinder->number_of_units_available = $data->number_of_units;
        $cylinder->save();
    }

    public static function updateCylinder($data)
    {
        $cylinder = Cylinder::find($data->id);
        $cylinder->size_of_cylinder = $data->size_of_cylinder;
        $cylinder->cost_per_unit = $data->cost_per_unit;
        $cylinder->number_of_units_available = $data->number_of_units_available;
        $cylinder->save();
    }

    public static function addArea($data)
    {
        $area = new Area;
        $area->name_of_location = $data->name_of_location;
        $area->save();
    }

    public static function addOrder($data)
    {
        $order = new Order;
        $order->date_of_order = Carbon::now();
        $order->size_of_cylinder = $data->size_of_cylinder;
        $order->quantity = $data->quantity;
        $order->cost_of_delivery = $data->cost_of_delivery;
        $order->cost_of_gas = $data->cost_of_gas;
        $order->total_cost_of_order = $data->cost_of_gas + $data->cost_of_delivery;
        $order->customer_id = $data->customer_id;
        $order->date_of_delivery = $data->date_of_delivery;
        $order->delivery_time_frame = $data->delivery_time_frame;
        $order->delivery_location = $data->delivery_location;
        $order->digital_location = $data->digital_location;
        $order->save();
    }

    public static function updateOrder($data)
    {
        $order = Order::find($data->order_id);
        $order->date_of_order = $data->date_of_order;
        $order->size_of_cylinder = $data->size_of_cylinder;
        $order->quantity = $data->quantity;
        $order->date_of_delivery = $data->date_of_delivery;
        $order->delivery_time_frame = $data->delivery_time_frame;
        $order->delivery_location = $data->delivery_location;
        $order->date_delivered = $data->date_delivered;
        $order->digital_location = $data->digital_location;
        $order->cost_of_delivery = $data->cost_of_delivery;
        $order->cost_of_gas = $data->cost_of_gas;
        $order->total_cost_of_order = $data->cost_of_gas + $data->cost_of_delivery;
        $order->customer_id = $data->customer_id;
        $order->date_of_order = $data->date_of_order;
        $order->save();
    }

    public static function changeStatusOfOrder($data)
    {
        $order = Order::find($data->order_id);
        $order->status_of_order = $data->status_of_order;
        $order->save();
    }

    public static function addDeliveredBy($data)
    {
        $order = Order::find($data->order_id);
        $order->delivered_by = $data->delivered_by;
        $order->save();
    }

    public static function addReasonForNonDelivery($data)
    {
        $order = Order::find($data->order_id);
        $order->reason_for_non_delivery = $data->reason_for_non_delivery;
        $order->status_of_order = 'Not Delivered';
        $order->save();
    }



    public static function addOrderPayment($data)
    {
        $payment = new Payment;
        $payment->date_of_payment = $data->date_of_payment;
        $payment->order_id = $data->order_id;
        $payment->customer_id = $data->customer_id;
        $payment->amount_paid = $data->amount_paid;
        $payment->payment_number = $data->payment_number;
        $payment->save();
    }

    public static function getDispatcherAreaOrders($data)
    {
        $dispatcher = Dispatcher::find($data->dispatcher_id);
        $areas =  $dispatcher->area_of_operation;
        $areas_list = json_decode($areas, true);

        $orders = Order::whereIn('delivery_location', $areas_list)
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->orderBy('created_at', 'desc')
            ->get();
        return $orders;
    }

    public static function getCustomerOrders($customer_id)
    {
        $orders =  Order::where('customer_id', $customer_id)
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->orderBy('orders.created_at', 'desc')
            ->get();
        return $orders;
    }

    public static function cancelOrder($data)
    {
        $order = Order::find($data->order_id);
        $order->reason_for_cancellation = $data->reason_for_cancellation;
        $order->status_of_order = 'Cancelled';
        $order->save();
    }

    public static function cancelExchange($data)
    {
        $order = Gas_Exchange::find($data->order_id);
        $order->reason_for_cancellation = $data->reason_for_cancellation;
        $order->status_of_order = 'Cancelled';
        $order->save();
    }

    public static function addExchange($data)
    {
        $order = new Gas_Exchange;
        $order->date_of_order = Carbon::now();
        $order->size_of_cylinder = $data->size_of_cylinder;
        $order->quantity = $data->quantity;
        $order->cost_of_delivery = $data->cost_of_delivery;
        $order->cost_of_service = $data->cost_of_service;
        $order->total_cost_of_order = $data->cost_of_gas + $data->cost_of_delivery;
        $order->customer_id = $data->customer_id;
        $order->date_of_delivery = $data->date_of_delivery;
        $order->delivery_time_frame = $data->delivery_time_frame;
        $order->delivery_location = $data->delivery_location;
        $order->digital_location = $data->digital_location;
        $order->save();
    }

    public static function updateExchange($data)
    {

        $order = Gas_Exchange::find($data->exchange_id);
        $order->date_of_order = $data->date_of_order;
        $order->size_of_cylinder = $data->size_of_cylinder;
        $order->quantity = $data->quantity;
        $order->date_of_delivery = $data->date_of_delivery;
        $order->delivery_time_frame = $data->delivery_time_frame;
        $order->delivery_location = $data->delivery_location;
        $order->date_delivered = $data->date_delivered;
        $order->digital_location = $data->digital_location;
        $order->cost_of_delivery = $data->cost_of_delivery;
        $order->cost_of_service = $data->cost_of_service;
        $order->total_cost_of_order = $data->cost_of_gas + $data->cost_of_delivery;
        $order->customer_id = $data->customer_id;
        $order->date_of_order = $data->date_of_order;
        $order->save();
    }
}
