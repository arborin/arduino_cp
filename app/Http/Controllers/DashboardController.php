<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ButtonLogs;
use App\Models\PresureLogs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view("dashboard");
    }


    public function dashboardLive(){
        // LIVE DASHBOARD STATISTIC
        $result                     = [];

        // BUTTON LOG STATS
        $result['button_stat']      = [];
        $button_log_today           = ButtonLogs::whereDate('created_at',  Carbon::today())->count();
        $buttin_log_sum             = ButtonLogs::all()->count();
        $result['button_stat']      = ['today' => $button_log_today, 'sum' => $buttin_log_sum];

        // PRESURE LOG STATS
        $result['presure_stat']     = [];
        $presure_log_today          = PresureLogs::whereDate('created_at',  Carbon::today())->count();
        $presure_log_sum            = PresureLogs::all()->count();
        $result['presure_stat']     = ['today' => $presure_log_today, 'sum' => $presure_log_sum];

        // TOTAL
        $result['total']            = [];
        $first_log                  = ButtonLogs::first()->get();

        $first_log_date             = 'Log Not Found';

        if($first_log_date){
            $first_log_date         = $first_log[0]->created_at->format('Y-m-d');
        }

        $total_logs                 = $buttin_log_sum +  $presure_log_sum;
        $result['total']            = ['sum' => $total_logs, 'from' => $first_log_date];

        $result['button_log']       = ButtonLogs::orderBy('id', 'desc')->take(10)->get();
        $result['presure_log']      = PresureLogs::orderBy('id', 'desc')->take(10)->get();


        return response($result);

    }
}
