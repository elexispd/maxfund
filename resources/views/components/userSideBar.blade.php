<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
         <a href="{{route('dashboard')}}" class="logo">
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
            <h4 class="text-section">Wallet</h4>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#base">
              <i class="fas fa-money-check-alt"></i>
              <p>Wallet</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="base">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('user.wallet.create') }}">
                    <span class="sub-item">Add Wallet</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('user.wallet.index') }}">
                    <span class="sub-item">View Wallets</span>
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
                  <a href="{{ route('user.deposit.create') }}">
                    <span class="sub-item">Deposit</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('user.deposit.index') }}">
                    <span class="sub-item">Deposit History</span>
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
                  <a href="{{ route('user.withdraw.create') }}">
                    <span class="sub-item">Withdraw</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('user.withdraw.index') }}">
                    <span class="sub-item">Withdrawal History</span>
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
                  <a href="{{ route('user.investment.plan') }}">
                    <span class="sub-item">Invest</span>
                  </a>
                </li>
                  {{--  <li>
                  <a href="{{ route('user.investment.index') }}">
                    <span class="sub-item">Investment History</span>
                  </a>
                </li> --}}
              </ul>
            </div>
          </li>

          {{-- <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Transactions</h4>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#transactions">
              <i class="fas fa-money-check-alt"></i>
              <p>Transactions</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="transactions">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('user.transaction.create') }}">
                    <span class="sub-item">Deposit</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('user.transaction.create') }}">
                    <span class="sub-item">Withdrawal</span>
                  </a>
                </li>


              </ul>
            </div>
          </li> --}}

        <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Transactions</h4>
        </li>

        <li class="nav-item">
        <a href="{{ route('user.transaction.transaction') }}">
            <i class="fas fa-receipt"></i>
            <p>Transaction</p>
        </a>
        </li>

        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#transfer">
              <i class="fas fa-receipt"></i>
              <p>Transfer</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="transfer">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('transfer.create') }}">
                    <span class="sub-item">Make Transfer</span>
                  </a>
                </li><li>
                  <a href="{{ route('transfer.index') }}">
                    <span class="sub-item">Transfer History</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

        <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Referrals</h4>
        </li>

        <li class="nav-item">
        <a href="{{ route('user.referral.index') }}">
            <i class="fas fa-users"></i>
            <p>Referrals</p>
        </a>
        </li>

        <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">KYC</h4>
        </li>

        <li class="nav-item">
        <a  href="{{ route('user.kyc.create') }}">
            <i class="fas fa-user"></i>
            <p>KYC</p>
        </a>
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

        {{-- ending --}}
        </ul>
      </div>
    </div>
  </div>
