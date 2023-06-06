<?php

namespace App\Classes;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;

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

    public static function getAllUsers()
    {
        return User::all();
    }


    public static function  getAllCustomers()
    {
        return Customer::all();
    }

    public static function getAllPayments()
    {
        return  Payment::all();
    }
}
