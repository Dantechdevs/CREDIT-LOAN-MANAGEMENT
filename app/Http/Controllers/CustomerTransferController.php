<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerTransferController extends Controller
{
    public function index()
    {
        $transfers = CustomerTransfer::latest()->paginate(10);
        return view('registry.customers.customer_transfers.index', compact('transfers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_to' => 'required',
        ]);

        $customers = Customer::query();

        // Filter by branch from
        if ($request->branch_from) {
            $customers->where('branch_id', $request->branch_from);
        }

        // Filter by officer
        if ($request->officer_from) {
            $customers->where('relationship_officer_id', $request->officer_from);
        }

        // Search ID or Mobile
        if ($request->search) {
            $customers->where(function ($q) use ($request) {
                $q->where('identity_number', $request->search)
                    ->orWhere('mobile', $request->search);
            });
        }

        $customers = $customers->get();

        foreach ($customers as $customer) {

            CustomerTransfer::create([
                'customer_id' => $customer->id,
                'branch_from' => $customer->branch_id,
                'branch_to'   => $request->branch_to,
                'officer_from' => $customer->relationship_officer_id,
                'officer_to'  => $request->officer_to,
                'created_by'  => Auth::id(),
            ]);

            // Update customer
            $customer->update([
                'branch_id' => $request->branch_to,
                'relationship_officer_id' => $request->officer_to,
            ]);
        }

        return back()->with('success', 'Customer Transfer Completed.');
    }
}
