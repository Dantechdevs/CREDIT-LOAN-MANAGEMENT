@extends('layouts.app')

@section('content')

{{-- Page Styles --}}
<style>
    .report-card {
        border-radius: 12px;
        border: none;
        background: #fff;
        box-shadow: 0 6px 18px rgba(0,0,0,.08);
    }

    .report-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 20px;
        border-bottom: 1px solid #eee;
    }

    .report-header h4 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #111827;
    }

    .report-header small {
        font-size: 12px;
        color: #6b7280;
    }

    .search-box {
        position: relative;
        max-width: 320px;
    }

    .search-box input {
        padding-left: 38px;
        height: 42px;
        border-radius: 10px;
        font-size: 14px;
        border: 1px solid #e5e7eb;
    }

    .search-box i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
    }

    .reports-table th {
        font-size: 13px;
        font-weight: 700;
        background: #f9fafb;
        border-bottom: 2px solid #e5e7eb;
    }

    .reports-table td {
        font-size: 14px;
        vertical-align: middle;
        color: #374151;
    }

    .badge-report {
        background: rgba(59,130,246,.12);
        color: #2563eb;
        font-size: 12px;
        padding: 6px 10px;
        border-radius: 20px;
        font-weight: 600;
    }

    .btn-view,
    .btn-refresh {
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        padding: 7px 14px;
    }

    .table-hover tbody tr:hover {
        background: #f9fafb;
    }
</style>

{{-- Page Header --}}
<div class="row mb-3 align-items-center">
    <div class="col-md-8">
        <h3 class="mb-0 font-weight-bold text-dark">
            <i class="fas fa-chart-bar text-primary"></i> Reports Dashboard
        </h3>
        <small class="text-muted">
            Select a report below to generate member and loan analytics.
        </small>
    </div>

    <div class="col-md-4 text-right">
        <button class="btn btn-primary btn-refresh" onclick="location.reload()">
            <i class="fas fa-sync-alt"></i> Refresh
        </button>
    </div>
</div>

{{-- Reports Card --}}
<div class="card report-card">
    <div class="report-header">
        <div>
            <h4>Available Reports</h4>
            <small>Click view to open the report module</small>
        </div>

        <div class="search-box">
            <i class="fas fa-search"></i>
            <input
                type="text"
                id="searchReport"
                class="form-control"
                placeholder="Search report..."
            >
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover reports-table mb-0" id="reportsTable">
                <thead>
                    <tr>
                        <th style="width:5%">#</th>
                        <th style="width:30%">Report Name</th>
                        <th>Report Description</th>
                        <th style="width:15%" class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($reports as $index => $report)
                        <tr>
                            <td>
                                <span class="badge-report">{{ $index + 1 }}</span>
                            </td>

                            <td>
                                <strong>
                                    <i class="{{ $report['icon'] }} text-primary"></i>
                                    {{ $report['name'] }}
                                </strong>
                            </td>

                            <td>{{ $report['description'] }}</td>

                            <td class="text-center">
                                <a href="{{ $report['route'] }}" class="btn btn-success btn-view">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                No reports available
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Search Script --}}
<script>
    document.getElementById('searchReport').addEventListener('keyup', function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll('#reportsTable tbody tr').forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
    });
</script>

@endsection
