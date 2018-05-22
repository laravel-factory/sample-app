<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a list of Customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::getList();

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new Customer
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.add');
    }

    /**
     * Save new Customer
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Customer::validationRules());

        $validatedData['password'] = bcrypt($validatedData['password']);
        $customer = Customer::create($validatedData);

        return redirect()->route('admin.customers.index')->with([
            'type' => 'success',
            'message' => 'Customer added'
        ]);
    }

    /**
     * Show the form for editing the specified Customer
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the Customer
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Customer $customer)
    {
        $validatedData = request()->validate(
            Customer::validationRules($customer->id)
        );

        $validatedData['password'] = bcrypt($validatedData['password']);
        $customer->update($validatedData);

        return redirect()->route('admin.customers.index')->with([
            'type' => 'success',
            'message' => 'Customer Updated'
        ]);
    }

    /**
     * Delete the Customer
     *
     * @param \App\Customer $customer
     * @return void
     */
    public function destroy(Customer $customer)
    {
        if ($customer->posts()->count()) {
            return redirect()->route('admin.customers.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $customer->delete();

        return redirect()->route('admin.customers.index')->with([
            'type' => 'success',
            'message' => 'Customer deleted successfully'
        ]);
    }
}
