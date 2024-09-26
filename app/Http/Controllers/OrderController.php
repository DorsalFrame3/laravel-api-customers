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
    }
    public function show(Customer $customer, Order $order){
        
        return $customer->orders()->where('order_id', $order->order_id)->first();
    }
}
