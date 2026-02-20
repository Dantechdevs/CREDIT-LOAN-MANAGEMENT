@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Customer Categories</h5>
        <a href="{{ route('customer_categories.create') }}" class="btn btn-primary">
            Create Category
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <b>Customer Categories</b>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Description</th>
                            <th>Is Enabled?</th>
                            <th>Is Default?</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th width="100">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $cat)
                        <tr>
                            <td>{{ $cat->description }}</td>
                            <td>{{ $cat->is_enabled ? 'true' : 'false' }}</td>
                            <td>{{ $cat->is_default ? 'true' : 'false' }}</td>
                            <td>{{ $cat->created_at }}</td>
                            <td>{{ $cat->creator?->email ?? 'System' }}</td>
                            <td>
                                <a href="{{ route('customer_categories.edit', $cat->id) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach

                        @if($categories->count() == 0)
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No categories found.
                            </td>
                        </tr>
                        @endif
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
@endsection
