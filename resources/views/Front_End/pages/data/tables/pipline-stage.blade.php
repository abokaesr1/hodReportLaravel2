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
                      <th>STAGE</th>
                      <th>COMPANY NAME</th>
                      <th>ACCOUNT OWNER</th>
                      <th>EXPECTED CONTRACT VALUE</th>
                      <th>CONTRACT VALUE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($piplinestage as $data)
                    @if ($data->stage != 'closedwon' || $data->stage != 'closedlost')
                    <tr>
                        <td>{{ $data->stage }}</td>
                        <td>

                                <div>{{ $data->company_name }}</div>

                        </td>
                        <td>

                                <div>{{ $data->account_owner }}</div>

                        </td>
                        <td>

                                <div>{{ number_format($data->expected_revenue) }} AED</div>

                        </td>
                        <td>

                                <div>{{ number_format($data->revenue) }} AED</div>

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
                            {{ number_format($piplinestage->sum('expected_revenue')) }} AED
                        </td>
                        <td class="text-white" colspan="1">
                            {{ number_format($piplinestage->sum('revenue')) }} AED
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
