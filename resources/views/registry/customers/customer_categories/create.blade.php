@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <b>Create Customer Category</b>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('customer_categories.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" required>
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" name="is_enabled" class="form-check-input" checked>
                    <label class="form-check-label">Is Enabled?</label>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_default" class="form-check-input">
                    <label class="form-check-label">Is Default?</label>
                </div>

                <button class="btn btn-primary">Save Category</button>
                <a href="{{ route('customer_categories.index') }}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>

</div>
@endsection
