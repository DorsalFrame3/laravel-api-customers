<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Customer $customer){
        return $customer->orders;
        // $results = DB::table('orders as o')
        //     ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
        //     ->join('customers as c', 'c.customer_id', '=', 'o.customer_id')
        //     ->select(
        //         'o.order_id',
        //         'o.order_date',
        //         'os.name as order_status_name'
        //     )
        //     ->where('c.customer_id', $customer->customer_id)
        //     ->get();

        //     return $results;
    }
    public function show(Customer $customer, Order $order){
        $result = DB::table('orders as o')
            ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
            ->join('customers as c', 'c.customer_id', '=', 'o.customer_id')
            ->select(
                'o.order_id',
                'o.order_date',
                'os.name as order_status_name'
            )
            ->where('c.customer_id', $customer->customer_id)
            ->where('o.order_id', $order->order_id )
            ->get();

            return $result;
    }
}
