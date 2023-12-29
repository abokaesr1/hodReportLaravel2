<div class="row clearfix row-deck">
    @if ( App\Helper\Role::UserRole(auth()->user()->role_id) !== 'user' )
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <span class="text-uppercase">Total revenue</span>
                <h4 class="mb-0 mt-2" id="totalRevenue">{{ number_format($trackerData->sum('revenue'), 2, '.', ',') }} <i class="fa fa-level-up font-12"></i></h4>
                <small class="text-muted">Analytics For </small>
                <select name="days_revenue" id="days_revenue" class="form-control mt-2 mb-4">
                    <option value="alldata"> ALL DATA </option>
                    <option value="today"> Today </option>
                    <option value="sevendays"> 7 Days </option>
                    <option value="onemonth"> 1 Month </option>
                    <option value="sixmonth"> 6 Months </option>
                    <option value="oneyear"> 1 Year </option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <span class="text-uppercase">Total expected revenue.</span>
                <h4 class="mb-0 mt-2" id="expected_revenue">{{ number_format($trackerData->sum('expected_revenue'), 2, '.', ',') }}</h4>
                <small class="text-muted" >Analytics for</small>
                <select name="days_expected_revenue" id="days_expected_revenue" class="form-control mt-2 mb-4">
                    <option value="alldata"> ALL DATA </option>
                    <option value="today"> Today </option>
                    <option value="sevendays"> 7 Days </option>
                    <option value="onemonth"> 1 Month </option>
                    <option value="sixmonth"> 6 Months </option>
                    <option value="oneyear"> 1 Year </option>
                </select>
            </div>

        </div>
    </div>
    @endif
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <span class="text-uppercase">TOTAL PRODCTS</span>
                <h4 class="mb-0 mt-2">{{ count($trackerData) }}</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <span class="text-uppercase">TOTAL PARENT ACCOUNTS</span>
                <h4 class="mb-0 mt-2">{{ count($parentAccounts) }}</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card top_widget">
            <div class="body">
                <div class="icon"><i class="fa fa-flag"></i> </div>
                <div class="content">
                    <div class="text mb-2 text-uppercase">TOTAL CHILLD ACCOUNTS</div>
                    <h4 class="mb-0 mt-2">{{ count($childAccounts) }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card top_widget">
            <div class="body">
                <div class="icon"><i class="fa fa-users"></i> </div>
                <div class="content">
                    <div class="text mb-2 text-uppercase">ACTIVE USERS</div>
                    <h4 class="number mb-0">{{ count($totalUsers) }} </h4>
                </div>
            </div>
        </div>
    </div>
</div>
