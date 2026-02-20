@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <b>Edit Customer Category</b>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('customer_categories.update', $customer_category->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control"
                        value="{{ $customer_category->description }}" required>
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" name="is_enabled" class="form-check-input"
                        {{ $customer_category->is_enabled ? 'checked' : '' }}>
                    <label class="form-check-label">Is Enabled?</label>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_default" class="form-check-input"
                        {{ $customer_category->is_default ? 'checked' : '' }}>
                    <label class="form-check-label">Is Default?</label>
                </div>

                <button class="btn btn-primary">Update Category</button>
                <a href="{{ route('customer_categories.index') }}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>

</div>
@endsection
