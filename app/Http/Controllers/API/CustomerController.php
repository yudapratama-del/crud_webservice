<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::all();
        return response() -> json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();

        return response()->json([
            'name' => $customer->name,
            'phone' => $customer->phone,
            'email' => $customer->email,
            'address' => $customer->address,
            'result' => 'Data Created Successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $id)
    {
        return response()->json($id, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;

        $customer = Customer::find($id);
        $customer->name = $name;
        $customer->phone = $phone;
        $customer->email = $email;
        $customer->address = $address;
        $customer->save();

        return response()->json([
            'name' => $customer->name,
            'phone' => $customer->phone,
            'email' => $customer->email,
            'address' => $customer->address,
            'result' => 'Data Updated Successfully'
        ], 200);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return 'Data Successfully Deleted!';
    }
}
