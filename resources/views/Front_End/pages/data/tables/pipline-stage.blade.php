<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h2>PIPELINE STAGE</h2>
            <ul class="header-dropdown">
            </ul>
        </div>
        <div class="body">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable mb-0">
                <thead>
                    <tr>
                      <th>STAGE</th>
                      <th>COMPANY NAME</th>
                      <th>ACCOUNT OWNER</th>
                      <th>EXPECTED REVENUE</th>
                      <th>REVENUE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($piplinestage as $data)
                    <tr>
                        <td>{{ $data->stage }}</td>
                        <td>
                            @foreach(explode(',', $data->company_names) as $company)
                                <div>{{ $company }}</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach(explode(',', $data->account_owners) as $owner)
                                <div>{{ App\Models\Group::where('id',$owner )->value('name') }}</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach(explode(',', $data->expected_revenues) as $expectedRevenue)
                                <div>{{ number_format($expectedRevenue, 2, '.', ',') }} AED</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach(explode(',', $data->revenues) as $revenue)
                                <div>{{ number_format($revenue, 2, '.', ',') }} AED</div>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!-- Grand totals in <tfoot> -->
                <tfoot>
                    <tr class="bg-dark">
                        <td class="text-white" colspan="3">GRAND TOTAL</td>
                        <td class="text-white" colspan="1">
                            {{ number_format($piplinestage->sum('expected_revenues'), 2, '.', ',') }} AED
                        </td>
                        <td class="text-white" colspan="1">
                            {{ number_format($piplinestage->sum('revenues'), 2, '.', ',') }} AED
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
