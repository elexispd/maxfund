@extends('layouts.userDashboard')

@section('content')


<div class="page-inner">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">All Transactions</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">All Transaction</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Display success message -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table
                          id="basic-datatables"
                          class="display table table-striped table-hover"
                        >
                          <thead>
                            <tr>
                              <th>PURPOSE</th>
                              <th>DATE & TIME</th>
                              <th>Amount</th>
                            </tr>
                          </thead>

                          <tbody>
                                @foreach ($transactions as $trans)
                                <tr>
                                    <th scope="row">
                                      <button
                                        class="btn btn-icon btn-round  btn-sm me-2" style="background: #191970; color: #fff;"
                                      >
                                        <i class="fa fa-check" ></i>
                                      </button>
                                      {{ $trans->description }}
                                    </th>
                                    <td class="text-end">{{ $trans->created_at }}</td>
                                    <td class="text-end">${{ $trans->amount }}</td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>

                    </div>
                  </div>
              </div>

        </div>
      </div>
    </div>
      </div>
    </div>
</div>



@endsection
