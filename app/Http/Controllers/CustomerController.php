<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return Customer::all();
    }

    public function store(Request $request){
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
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
