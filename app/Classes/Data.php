<?php

namespace App\Classes;

use App\Models\Admin;
use App\Models\Area;
use App\Models\Customer;
use App\Models\Cylinder;
use App\Models\Gas_Exchange;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class Data
{
    public static function getOrderByCustomerId($data)
    {
        return Order::where('customer_id', $data->customer_id)
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function getOrdersByDateOfDelivery($data)
    {
        return Order::whereBetween('date_of_delivery', [$data->start_date, $data->end_date])
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function getOrdersByDateDelivered($data)
    {
        return Order::whereBetween('date_delivered', [$data->start_date, $data->end_date])
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function searchCustomers($data)
    {
        return Customer::where('first_name', 'like', $data->search)
            ->orWhere('other_names', 'like', $data->search)
            ->orWhere('phone_number', 'like', $data->search)
            ->get();
    }

    public static function searchUsers($data)
    {
        return User::where('first_name', 'like', $data->search)
            ->orWhere('other_names', 'like', $data->search)
            ->orWhere('phone_number', 'like', $data->search)
            ->get();
    }

    public static function searchPaymentsByPaymentNumber($data)
    {
        return Payment::where('payment_number', $data->payment_number)
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('orders', 'orders.id', '=', 'payments.order_id')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function  searchPaymentsByPaymentDate($data)
    {
        return Payment::whereDate('created_at', $data->payment_date)
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('orders', 'orders.id', '=', 'payments.order_id')
            ->orderBy('created_at', 'desc')
            ->get();
    }



    public static function getAllAdmins()
    {
        return Admin::orderBy('created_at', 'desc')->get();
    }


    public static function  getAllCustomers()
    {
        return Customer::orderBy('created_at', 'desc')->get();
    }

    public static function getAllPayments()
    {
        $payments =  Payment::orderBy('payments.created_at', 'desc')
            ->join('customers', 'customers.id', '=', 'payments.customer_id')
            ->join('orders', 'orders.id', '=', 'payments.order_id')
            ->select('customers.first_name', 'customers.other_names', 'orders.date_of_order', 'orders.quantity', 'payments.amount_paid', 'payments.payment_number', 'payments.created_at')
            ->get();

        return $payments;
    }

    public static function getCylinders()
    {
        return Cylinder::orderBy('created_at', 'desc')->get();
    }

    public static function getOrders()
    {
        return  Order::join('customers', 'customers.id', '=', 'orders.customer_id')

            ->orderBy('orders.created_at', 'desc')
            ->select('customers.first_name', 'orders.id', 'customers.other_names', 'orders.date_of_order', 'orders.quantity', 'orders.total_cost_of_order', 'orders.size_of_cylinder')
            ->get();
    }

    public static function areaList()
    {
        return Area::all();
    }

    public static function gasExchanges()
    {
        //return  Gas_Exchange::all();

        return  Gas_Exchange::join('customers', 'customers.id', '=', 'gas_exchanges.customer_id')

            ->orderBy('gas_exchanges.created_at', 'desc')
            ->select('customers.first_name', 'gas_exchanges.id', 'customers.other_names', 'gas_exchanges.date_of_order', 'gas_exchanges.quantity', 'gas_exchanges.total_cost_of_order', 'gas_exchanges.size_of_cylinder')
            ->get();
    }
}
