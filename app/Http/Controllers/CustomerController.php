<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customer', [
            'title' => 'Customer',
            'customers' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'email' => 'required|email:dns|unique:customers,email|max:255',
            'phone_number' => 'required|string|unique:customers,phone_number|max:15',
            'address' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Customer::create($validatedData);

        return redirect('/admin/customer')->with('success', 'Customer added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'address' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->email != $customer->email) {
            $validatedData['email'] = $request->validate([
                'email' => 'required|email:dns|unique:customers,email|max:255',
            ])['email'];
        }
    
        if ($request->phone_number != $customer->phone_number) {
            $validatedData['phone_number'] = $request->validate([
                'phone_number' => 'required|string|unique:customers,phone_number|max:15',
            ])['phone_number'];
        }
        Customer::where('id', $customer->id)->update($validatedData);

        return redirect('/admin/customer')->with('success', 'Customer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);

        return redirect('/admin/customer')->with('success', 'Customer deleted successfully!');
    }
}
