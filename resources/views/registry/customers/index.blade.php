@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Customers</h5>
            <a href="{{ route('customers.create.step1') }}" class="btn btn-success btn-sm">+ Add Customer</a>
        </div>

        <div class="card-body">

            <form method="GET" class="mb-3 d-flex">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control w-25"
                    placeholder="Search ID or Mobile No.">
                <button class="btn btn-primary ms-2">Search</button>
            </form>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Created Date</th>
                        <th>Target</th>
                        <th>Full Name</th>
                        <th>ID No.</th>
                        <th>Mobile No.</th>
                        <th>Branch</th>
                        <th>Scored Amount</th>
                        <th>Record Status</th>
                        <th>Registered By</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $customer->target }}</td>
                        <td>{{ $customer->full_name }}</td>
                        <td>{{ $customer->id_no }}</td>
                        <td>{{ $customer->mobile_no }}</td>
                        <td>{{ $customer->branch }}</td>
                        <td>{{ number_format($customer->scored_amount, 2) }}</td>
                        <td>
                            <span class="badge bg-success">{{ $customer->record_status }}</span>
                        </td>
                        <td>{{ optional($customer->user)->email ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('customers.show',$customer->id) }}">View</a> |
                            <a href="{{ route('customers.edit',$customer->id) }}">Edit</a> |
                            <a href="{{ route('customers.deactivate',$customer->id) }}"
                               onclick="return confirm('Deactivate this customer?')">Deactivate</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $customers->links() }}

        </div>
    </div>
</div>
@endsection
