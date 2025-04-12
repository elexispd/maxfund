@extends('layouts.userDashboard')

@section('content')


<div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Register User</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">User</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">User Registration Form</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Register User</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <form action="{{ route('admin.user.store') }}" method="post">
                    @csrf
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                      <div class="form-group">
                        <label for="password">Full Name</label>
                        <input type="text" class="form-control" name="name" />
                      </div>
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" />
                      </div>
                      <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" name="phone" />
                      </div>
                      <div class="form-group">
                        <label for="">Country</label>
                        <select name="country" id="" class="form-control">
                            <option value="">Select Country</option>
                            <option value="usa">USA</option>
                            <option value="uk">UK</option>
                            <option value="canada">Canada</option>
                            <option value="australia">Australia</option>
                            <option value="germany">Germany</option>
                            <option value="france">France</option>
                            <option value="japan">Japan</option>
                            <option value="china">China</option>
                            <option value="india">India</option>
                            <option value="brazil">Brazil</option>
                            <option value="russia">Russia</option>
                            <option value="south_africa">South Africa</option>
                            <option value="italy">Italy</option>
                        </select>
                      </div>

                      <button type="submit" class="btn btn-primary">Register</button>
                </form>


              </div>

        </div>
      </div>
    </div>
      </div>
    </div>
</div>


@endsection
