<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerWizardController extends Controller
{
    public function step1()
    {
        return view('registry.customers.create.step1');
    }

    public function postStep1(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'mobile_no' => 'required',
            'id_no' => 'required',
        ]);

        session()->put('customer.step1', $request->all());

        return redirect()->route('customers.create.step2');
    }

    public function step2()
    {
        return view('registry.customers.create.step2');
    }

    public function postStep2(Request $request)
    {
        session()->put('customer.step2', $request->all());
        return redirect()->route('customers.create.step3');
    }

    public function step3()
    {
        return view('registry.customers.create.step3');
    }

    public function postStep3(Request $request)
    {
        session()->put('customer.step3', $request->all());
        return redirect()->route('customers.create.step4');
    }

    public function step4()
    {
        return view('registry.customers.create.step4');
    }

    public function postStep4(Request $request)
    {
        session()->put('customer.step4', $request->all());
        return redirect()->route('customers.create.step5');
    }

    public function step5()
    {
        return view('registry.customers.create.step5');
    }

    public function postStep5(Request $request)
    {
        session()->put('customer.step5', $request->all());
        return redirect()->route('customers.create.step6');
    }

    public function step6()
    {
        $data = session()->get('customer');
        return view('registry.customers.create.step6', compact('data'));
    }

    public function submit(Request $request)
    {
        $step1 = session()->get('customer.step1');

        $fullName = strtoupper($step1['first_name'] . ' ' . $step1['last_name']);

        Customer::create([
            'target' => 'All',
            'full_name' => $fullName,
            'id_no' => $step1['id_no'],
            'mobile_no' => $step1['mobile_no'],
            'branch' => $request->branch ?? 'MAIN',
            'scored_amount' => $request->scored_amount ?? 0,
            'record_status' => 'Approved',
            'registered_by' => Auth::id(),
        ]);

        session()->forget('customer');

        return redirect()->route('customers.index')->with('success', 'Customer Registered Successfully!');
    }
}
