<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h2>CLOSED WON BY OWNER</h2>
            <ul class="header-dropdown">
            </ul>
        </div>
        <div class="body">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable mb-0">
                <thead>
                    <tr>
                      <th>MONTH</th>
                      <th>ACCOUNT OWNER</th>
                      <th>REVENUE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($closed_won_by_account_owner as $item)
                    <tr>
                        <td>{{ $item->month }} / {{ $item->year }}</td>
                        <td>{{ App\Models\Group::where('id',$item->account_owner)->value('name') }}
                            <i class="fa fa-level-up"></i></td>
                        <td>{{ $item->total_revenue }} AED </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-dark">
                        <td class="text-white" colspan="2">GRAND TOTAL</td>
                        <td class="text-white" colspan="1">{{ $closed_won_by_account_owner->sum('total_revenue') }} AED
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
