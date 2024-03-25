<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(Request $request){

        $email = $request->input('email');
        $phone = $request->input('phone');

        $customers = Customer::withEmail($email)->withPhone($phone)->paginate(10);

        return view('customers.index',compact('customers'));
    }
    public function create(){

        return view('customers.create');
    }

    public function store(StoreRequest $request){

        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return to_route('customers.index')->with('success', 'تم حفظ البيانات بنجاح');

    }

    public function edit(Customer $customer){
        return view('customers.edit',compact('customer'));
    }

    public function update(UpdateRequest $request,Customer $customer){

        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return to_route('customers.index')->with('success', 'تم تعديل البيانات بنجاح');

    }

    public function delete(Customer $customer){
      
        $customer->delete();
        return to_route('customers.index')->with('success', 'تم حذف البيانات');
    }

}
