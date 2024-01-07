<?php

namespace App\Helper;

use App\Models\Trackersheet;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class Tables {

    public static function tableData($stage_name,$column_name){
        // data table of closed won by Product & Date
        return Trackersheet::select(
           DB::raw('MONTH(created_at) as month'),
           DB::raw('YEAR(created_at) as year'),
           DB::raw($column_name),
           DB::raw('product_name'),
           DB::raw('SUM(revenue) as total_revenue') // Assuming you want to sum the revenue for each group
       )->where('stage',$stage_name)
       ->groupBy(DB::raw('MONTH(created_at)'), DB::raw('YEAR(created_at)'), $column_name,'product_name')
       ->get();
    }
    public static function pipeline(){
        // data table of closed won by Product & Date
        return Trackersheet::select(
           DB::raw('stage'),
           DB::raw('SUM(expected_revenue) as total_expected_revenue'),
           DB::raw('SUM(revenue) as total_revenue') // Assuming you want to sum the revenue for each group
       )->groupBy(DB::raw('stage'))
       ->get();
    }
}
