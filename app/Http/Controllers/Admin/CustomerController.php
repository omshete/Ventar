<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(20);

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'nullable|string|max:255',
            'company_name'  => 'nullable|string|max:255',
            'address'       => 'nullable|string|max:255',
            'details'       => 'nullable|string',
            'logo'          => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo_path'] = $request->file('logo')->store('customers', 'public');
        }

        Customer::create($data);

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer created successfully.');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name'          => 'nullable|string|max:255',
            'company_name'  => 'nullable|string|max:255',
            'address'       => 'nullable|string|max:255',
            'details'       => 'nullable|string',
            'logo'          => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($customer->logo_path) {
                Storage::disk('public')->delete($customer->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('customers', 'public');
        }

        $customer->update($data);

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        if ($customer->logo_path) {
            Storage::disk('public')->delete($customer->logo_path);
        }

        $customer->delete();

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer deleted successfully.');
    }
}
