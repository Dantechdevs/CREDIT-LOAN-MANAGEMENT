@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <form method="POST" action="{{ route('customer_transfer.store') }}">
        @csrf

        <div class="row mb-3">

            <div class="col-md-3">
                <label>Branch From</label>
                <select name="branch_from" class="form-control">
                    <option value="">--Select Branch--</option>
                </select>
            </div>

            <div class="col-md-3">
                <label>Loan Officer From</label>
                <select name="officer_from" class="form-control">
                    <option value="">--All--</option>
                </select>
            </div>

            <div class="col-md-3">
                <label>Branch To</label>
                <select name="branch_to" class="form-control" required>
                    <option value="">--Select Branch--</option>
                </select>
            </div>

            <div class="col-md-3">
                <label>Loan Officer To</label>
                <select name="officer_to" class="form-control">
                    <option value="">Select Relationship Manager</option>
                </select>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search ID or Mobile No.">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary">Transfer</button>
            </div>
        </div>

    </form>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Created Date</th>
                <th>Target</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transfers as $transfer)
            <tr>
                <td>{{ $transfer->created_at }}</td>
                <td>{{ $transfer->branch_to }}</td>
                <td>{{ $transfer->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $transfers->links() }}

</div>

@endsection