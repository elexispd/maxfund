@extends('layouts.userDashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">KYC Verifications</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>User</th>
                    <th>Document Type</th>
                    <th>ID Number</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($verifications as $verification)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $verification->user->name }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $verification->document_type)) }}</td>
                    <td>{{ $verification->id_number }}</td>
                    <td>
                        <span class="badge badge-{{
                            $verification->status === 'approved' ? 'success' :
                            ($verification->status === 'rejected' ? 'danger' : 'warning')
                        }}">
                            {{ ucfirst($verification->status) }}
                        </span>
                    </td>
                    <td>{{ $verification->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('admin.kyc.show', $verification) }}" class="btn btn-sm" style="background:#191970; color:#fff">
                            Review
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $verifications->links() }}
        </div>
    </div>
</div>
@endsection
