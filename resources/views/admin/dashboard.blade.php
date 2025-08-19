@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
      <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>

      </div>

    </div>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center  bubble-shadow-small" style="background:#191970; border-radius:1rem"
                >
                  <i class="fas fa-money-check-alt" style="color:#fff;"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Withdrawals</p>
                  <h4 class="card-title">{{ $stats['totalWithdraws'] }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center  bubble-shadow-small"  style="background:#191970; border-radius:1rem"
                >
                  <i class="fas fa-users" style="color:#fff;"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Users</p>
                  <h4 class="card-title">{{ $stats['totalUsers'] }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center  bubble-shadow-small"  style="background:#191970; border-radius:1rem"
                >
                  <i class="fas fa-university"style="color:#fff;"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Active Investments</p>
                  <h4 class="card-title">{{ $stats['activeInvestments'] }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center  bubble-shadow-small"  style="background:#191970; border-radius:1rem"
                >
                  <i class="fas fa-money-check-alt" style="color:#fff;"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Pending Withdrawals</p>
                  <h4 class="card-title">{{ $stats['totalPendingWithdraws'] }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
        <div class="card card-round mt-4">
    <div class="card-header  text-white" style="background:white">
        
    </div>
    <div class="card-body" style="background:white; color:black">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container" style="background:white; color:black">
            <div id="tradingview_crypto_mkt"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
            {
                "width": "100%",
                "height": "600",
                "defaultColumn": "overview",
                "screener_type": "crypto_mkt",
                "displayCurrency": "USD",
                "colorTheme": "light",
                "locale": "en"
            }
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
</div>

    </div>


    
@endsection
