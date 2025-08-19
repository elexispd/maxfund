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
                  <p class="card-category">Balance</p>
                  <h4 class="card-title">${{ number_format(Auth::user()->balance, 2) }}</h4>
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
                  class="icon-big text-center  bubble-shadow-small" style="background:#191970;border-radius:1rem"
                >
                  <i class="fas fa-users" style="color:#fff;"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">No of Referrals</p>
                  <h4 class="card-title">{{ $stats['totalReferrals'] }}</h4>
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
                  class="icon-big text-center  bubble-shadow-small" style="background:#191970; border-radius:1rem"
                >
                  <i class="fas fa-university" style="color:#fff;"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Invested Amount</p>
                  <h4 class="card-title">$ {{ number_format($stats['totalInvested'], 2) }}</h4>
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
                  class="icon-big text-center  bubble-shadow-small" style="background:#191970; border-radius:1rem"
                >
                  <i class="fas fa-money-check-alt" style="color:#fff;"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Payouts</p>
                  <h4 class="card-title">${{ number_format($stats['payouts'], 2) }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-10">
        <div class="card  card-round text-center" style="background: #191970">
          <div class="card-header">
            <!-- Enhanced dollar icon (only changed part) -->
            <i class="fas fa-dollar-sign bg-primary text-white rounded-circle p-2 mr-2"></i>
            <div class="card-title" style="color: white">Referral Information</div>
          </div>
         <div class="card-body pb-0">
    <div class="mb-4" style="color: white">
        Use your referral link 
        <span id="referralLink" 
              onclick="copyReferral()" 
              class="bg-dark text-light" 
              style="cursor: pointer; display: inline-block; padding: 0.25rem 0.5rem; border-radius: 4px; margin: 0.5rem 0; word-break: break-all;">
            {{ config('app.url') }}/register?ref={{ Auth::user()->referral_code }}
        </span> 
        to refer. Using your referral to bring new investors earns you bonuses on all your referrals' first deposits. There is no limit to the number of earnings you can make from your referrals.
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
    </div>
  </div>
  <script>
function copyReferral() {
    const text = document.getElementById('referralLink').innerText;
    navigator.clipboard.writeText(text).then(function () {
        alert('Referral link copied to clipboard!');
    }, function (err) {
        console.error('Could not copy text: ', err);
    });
}
</script>
@endsection
