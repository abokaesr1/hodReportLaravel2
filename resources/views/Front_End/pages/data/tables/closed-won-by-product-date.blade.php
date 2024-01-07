<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="header">
            <h2>CLOSED WON BY PRODUCT & DATE</h2>
            <ul class="header-dropdown">

            </ul>
        </div>
        <div class="body">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable mb-0">
                <thead>
                    <tr>
                      <th>MONTH</th>
                      <th>COMPANY NAME</th>
                      <th>PRODUCT NAME</th>
                      <th>REVENUE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($closed_won_by_product_date as $item)
                    <tr>
                        <td>{{ $item->month }} / {{ $item->year }}</td>
                        <td>{{ $item->company_name }}  <i class="fa fa-level-up"></i></td>
                        <td>{{ $item->product_name }}  <i class="fa fa-level-up"></i></td>
                        <td>{{ $item->total_revenue }} AED </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-dark">
                        <td class="text-white" colspan="3">GRAND TOTAL</td>
                        <td class="text-white" colspan="1">{{ $closed_won_by_product_date->sum('total_revenue') }} AED
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
