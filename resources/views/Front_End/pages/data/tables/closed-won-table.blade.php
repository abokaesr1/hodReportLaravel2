<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h2>CLOSED WON TABLE FULL DATA</h2>
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
                      <th>Product  Name</th>
                      <th>Comments</th>
                      <th>CONTRACT VALUE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($closed_won_table as $data)
                    <tr>
                        <td>{{ $data->month }} / {{ $data->year }}</td>
                        <td>
                                <div>{{ $data->company_name }}</div>
                        </td>
                        <td>
                            <div>{{ $data->account_owner }}</div>
                        </td>
                        <td>
                            <div>{{ $data->last_contact_date }}</div>
                        </td>
                        <td>
                            <div>{{ $data->expected_close_date }}</div>
                        </td>
                        <td>
                            <div>{{ $data->customer_type }}</div>
                        </td>
                        <td>
                            <div>{{ $data->product_name }}</div>
                        </td>
                        <td>
                            <div>{{ $data->comments }}</div>
                        </td>
                        <td>
                            <div>{{number_format($data->revenue) }} AED</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!-- Grand totals in <tfoot> -->
                <tfoot>
                    <tr class="bg-dark">
                        <td class="text-white" colspan="8">GRAND TOTAL</td>
                        <td class="text-white" colspan="1">
                            {{ number_format($closed_won_table->sum('revenue')) }} AED
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
