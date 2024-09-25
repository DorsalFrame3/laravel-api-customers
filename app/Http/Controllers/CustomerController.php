<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        // return Customer::all();
        $results = DB::table('customers as c')
            ->join('orders as o', 'c.customer_id', '=', 'o.customer_id')
            ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
            ->select(
                'c.customer_id',
                'c.first_name',
                'c.last_name',
                'c.address',
                'c.city',
                'c.state',
                'c.points',
                'o.order_date',
                'os.name as order_status_name'
            )
            ->get();

            return $results;
    }

    public function store(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'points'
        ]);
    }

    public function show(Customer $customer){
        return [
            'customer_id' => $customer->customer_id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'isGoldMember' => $customer->isGoldMember()  
        ];
    }

    public function update(Request $request, Customer $customer){

    } 

    public function destroy(Customer $customer){

    }
}
