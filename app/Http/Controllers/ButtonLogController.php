<?php

namespace App\Http\Controllers;

use App\Models\ButtonLogs;
use Illuminate\Http\Request;

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


}
