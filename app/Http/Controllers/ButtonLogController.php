<?php

namespace App\Http\Controllers;

use App\Models\ButtonLogs;
use Illuminate\Http\Request;
<<<<<<< HEAD

class ButtonLogController extends Controller
{
    public function buttonLog($arduino_name){

    $btn_logs       = ButtonLogs::orderBy('id', 'desc')
                                ->where('arduino_name', 'like', '%'.$arduino_name.'%')
                                ->paginate(15);

    return view('button_log',[
        'arduino_name'  => $arduino_name,
        'btn_logs'      => $btn_logs
    ]);
}


=======
use Illuminate\Support\Facades\DB;

class ButtonLogController extends Controller
{
    public function showButtonLog($arduino_name, Request $request){

        $button_pin         = $request->button_pin ?? '';
        $date_from          = $request->date_from ?? '';
        $date_to            = $request->date_to ?? '';

        $search                     = [];


        if( $button_pin      != '' ) $search[] = ['button_pin',     '=',    $button_pin ];
        if( $arduino_name    !=''  ) $search[] = ['arduino_name',   '=',    $arduino_name ];
        if( $date_from       != '' ) $search[] = ['created_at',     '>=',   $date_from ];
        if( $date_to         != '' ) $search[] = ['created_at',     '<=',   $date_to . ' 23:59:59'];



        if ($button_pin != ''){
            $button_logs = DB::table('button_logs')->orderBy('id', 'desc')->where($search)->paginate(30);
        }else{
            $button_logs = [];
        }

        return view('button_log', [
            'arduino_name'  => $arduino_name,
            'btn'           => $button_pin,
            'button_logs'   => $button_logs
        ]);
    }
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233
}
