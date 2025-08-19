<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
         <a href="{{route('admin.dashboard')}}" class="logo">
          <img
            src="{{ asset('assets/img/newlogo.jpg') }}"
            alt="navbar brand"
            class="navbar-brand"
            style="width: 60px; border-radius: 3rem; height: 60px; margin-top: 2rem; margin-bottom: 2rem;"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item active">
            <a

              href="{{ route('admin.dashboard') }}"
              class="collapsed"
            >
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
              <span class="caret"></span>
            </a>

          </li>

          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Users</h4>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#users">
              <i class="fas fa-users"></i>
              <p>Users</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="users">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('admin.user.create') }}">
                    <span class="sub-item">Register User</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.user.index') }}">
                    <span class="sub-item">View Users</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>



          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Deposit</h4>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#deposit">
              <i class="fas fa-money-check-alt"></i>
              <p>Deposits</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="deposit">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('admin.deposit.index') }}?status=pending">
                    <span class="sub-item">Pending Deposits</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.deposit.index') }}?status=approved">
                    <span class="sub-item">Approved Deposits</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.deposit.index') }}?status=rejected">
                    <span class="sub-item">Rejected Deposits</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.deposit.index') }}">
                    <span class="sub-item">All Deposits</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Withdraw</h4>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#withdraw">
              <i class="fas fa-money-check"></i>
              <p>Withdraw</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="withdraw">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('admin.withdraw.index') }}?status=pending">
                    <span class="sub-item">Pending Withdrawals</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.withdraw.index') }}?status=approved">
                    <span class="sub-item">Approved Withdrawal</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.withdraw.index') }}">
                    <span class="sub-item">All Withdrawal</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>


            <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Transactions</h4>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.transaction') }}">
                <i class="fas fa-receipt"></i>
              <p>Transaction</p>
            </a>
          </li>


          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Investments</h4>
          </li>



          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#investment">
              <i class="fas fa-university"></i>
              <p>Investments</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="investment">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('admin.investment.create') }}">
                    <span class="sub-item">Add Investment plan</span>
                  </a>
                </li><li>
                  <a href="{{ route('admin.investment.plan') }}">
                    <span class="sub-item">Investment plans</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.investment.index') }}?status=active">
                    <span class="sub-item">Active Investments</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.investment.index') }}?status=completed">
                    <span class="sub-item">Completed Investments</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.investment.index') }}">
                    <span class="sub-item">All Investments</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">KYC</h4>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#kyc">
              <i class="fas fa-user"></i>
              <p>KYC</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="kyc">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('admin.kyc.index') }}?status=pending">
                    <span class="sub-item">Pending</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.kyc.index') }}?status=approved">
                    <span class="sub-item">Approved KYC</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.kyc.index') }}">
                    <span class="sub-item">All KYC</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">My Account</h4>
          </li>

          <li class="nav-item">
            <a href="{{ route('profile.show') }}">
              <i class="fas fa-user"></i>
              <p>My Profile</p>
            </a>
          </li>

          <li class="nav-item">
            <a  href="{{ route('profile.password') }}">
              <i class="fas fa-key"></i>
              <p>Change Password</p>
            </a>
          </li>


        </ul>
      </div>
    </div>
  </div>
