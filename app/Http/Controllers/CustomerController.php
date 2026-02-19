<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->search) {
            $query->where('id_no', 'like', "%{$request->search}%")
                ->orWhere('mobile_no', 'like', "%{$request->search}%")
                ->orWhere('full_name', 'like', "%{$request->search}%");
        }

        $customers = $query->latest()->paginate(10);

        return view('registry.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('registry.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'id_no' => 'required|string|unique:customers,id_no',
            'mobile_no' => 'required|string|unique:customers,mobile_no',
            'branch' => 'nullable|string|max:255',
        ]);

        Customer::create([
            'target' => $request->target ?? 'All',
            'full_name' => strtoupper($request->full_name),
            'id_no' => $request->id_no,
            'mobile_no' => $request->mobile_no,
            'branch' => strtoupper($request->branch),
            'scored_amount' => $request->scored_amount ?? 0,
            'record_status' => 'Approved',
            'registered_by' => Auth::id(),
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer Registered Successfully!');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('registry.customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('registry.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_no' => 'required|string|unique:customers,mobile_no,' . $customer->id,
            'branch' => 'nullable|string|max:255',
        ]);

        $customer->update([
            'full_name' => strtoupper($request->full_name),
            'mobile_no' => $request->mobile_no,
            'branch' => strtoupper($request->branch),
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer Updated Successfully!');
    }

    public function deactivate($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update(['record_status' => 'Deactivated']);

        return redirect()->back()->with('success', 'Customer Deactivated!');
    }
}
