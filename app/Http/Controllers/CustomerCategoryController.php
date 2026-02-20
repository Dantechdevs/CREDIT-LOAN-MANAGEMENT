<?php

namespace App\Http\Controllers;

use App\Models\CustomerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerCategoryController extends Controller
{
    public function index()
    {
        $categories = CustomerCategory::with('creator')
            ->orderBy('id', 'desc')
            ->get();

        return view('registry.customers.customer_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('registry.customers.customer_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        if ($request->has('is_default')) {
            CustomerCategory::where('is_default', 1)->update(['is_default' => 0]);
        }

        CustomerCategory::create([
            'description' => $request->description,
            'is_enabled'  => $request->has('is_enabled') ? 1 : 0,
            'is_default'  => $request->has('is_default') ? 1 : 0,
            'created_by'  => Auth::id(),
        ]);

        return redirect()->route('customer_categories.index')
            ->with('success', 'Customer Category created successfully.');
    }

    public function show(string $id)
    {
        //$customer_category = CustomerCategory::findOrFail($id);
        //return view('registry.customers.customer_categories.show', compact('customer_category'));
    }

    public function edit(string $id)
    {
        $customer_category = CustomerCategory::findOrFail($id);
        return view('registry.customers.customer_categories.edit', compact('customer_category'));
    }

    public function update(Request $request, string $id)
    {
        $customer_category = CustomerCategory::findOrFail($id);

        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        if ($request->has('is_default')) {
            CustomerCategory::where('is_default', 1)->update(['is_default' => 0]);
        }

        $customer_category->update([
            'description' => $request->description,
            'is_enabled'  => $request->has('is_enabled') ? 1 : 0,
            'is_default'  => $request->has('is_default') ? 1 : 0,
        ]);

        return redirect()->route('customer_categories.index')
            ->with('success', 'Customer Category updated successfully.');
    }

    public function destroy(string $id)
    {
        $customer_category = CustomerCategory::findOrFail($id);
        $customer_category->delete();

        return redirect()->route('customer_categories.index')
            ->with('success', 'Customer Category deleted successfully.');
    }
}