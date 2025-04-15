<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img
            src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
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

              href="{{ route('dashboard') }}"
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


        </ul>
      </div>
    </div>
  </div>
