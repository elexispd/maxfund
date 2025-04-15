@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $user->name }}</h4>
                    <p class="text-muted mb-0">All Referred Users Will Appear Here</p>
                </div>
                <div class="card-body">
                    @if($referrals->count() == 0)
                        <div class="alert alert-info">
                            No referrals Yet
                        </div>
                    @else
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date Joined</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($referrals as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('M-d-Y, d H:i:s')  }}</td>
                                        <td>
                                            @if ($user->status == 'active')
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">InActive</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-3">
                            {{-- {{ $users->links() }} --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
