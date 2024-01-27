<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h2>PIPELINE STAGES</h2>
            <ul class="header-dropdown">
            </ul>
        </div>
        <div class="body">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable mb-0">
                <thead>
                    <tr>
                      <th>MONTH</th>
                      <th>COMPANY NAME</th>
                      <th>ACCOUNT OWNER</th>
                      <th>Expected Close Date</th>
                      <th>Contract End  Date</th>
                      <th>Service  Name</th>
                      <th>Comments</th>
                      <th>CONTRACT VALUE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($piplinestage as $data)
                    @if ($data->stage != 'closedwon' || $data->stage != 'closedlost')
                    <tr>
                        <td>{{ $data->stage }}</td>
                        <td>
                            @foreach(explode(',', $data->company_names) as $company)
                                <div>{{ $company }}</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach(explode(',', $data->account_owners) as $owner)
                                <div>{{ $owner }}</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach(explode(',', $data->expected_revenues) as $expectedRevenue)
                                <div>{{ number_format($expectedRevenue) }} AED</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach(explode(',', $data->revenues) as $revenue)
                                <div>{{ number_format($revenue) }} AED</div>
                            @endforeach
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                <!-- Grand totals in <tfoot> -->
                <tfoot>
                    <tr class="bg-dark">
                        <td class="text-white" colspan="3">GRAND TOTAL</td>
                        <td class="text-white" colspan="1">
                            {{ number_format($piplinestage->sum('expected_revenues')) }} AED
                        </td>
                        <td class="text-white" colspan="1">
                            {{ number_format($piplinestage->sum('revenues')) }} AED
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
