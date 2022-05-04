<?php

namespace App\Http\Controllers;

use App\Models\ButtonLogs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ButtonStatuses;

class ButtonController extends Controller
{
    // BUTTON LOGS
    public function index(Request $request){

        $button         = $request->button;

        $btn_logs       = ButtonLogs::orderBy('id', 'desc')
                                    ->where('button_name', 'like', '%'.$button.'%')
                                    ->paginate(15);

        return view('button_log',[
            'btn_logs' => $btn_logs
        ]);
    }


    // BUTTON STATUS LOGS
    public function buttonStatus(Request $request){
        $action_name    = $request->action_name;

        $buttons       = ButtonStatuses::orderBy('id', 'desc')
                                    ->where('action_name', 'like', '%'.$action_name.'%')
                                    ->paginate(15);

        return view('button_status',[
            'buttons' => $buttons
        ]);
    }

    public function buttonStatusForm($id = null){
        $button                = new ButtonStatuses();

        if($id != ''){
            $button            = $button::find($id);
        }

        return view('button_status_form', [
            'button' => (object)$button
        ]);
    }



    public function buttonStatusSave(Request $request){

        $id                     = $request->id;
        $button_pin             = $request->button_pin;
        $button_val             = $request->button_val;
        $action_name            = $request->action_name;

        $button_status                = new ButtonStatuses();


        if($id != ''){
            $row                = $button_status::find($id);;
            $row->button_pin    = $button_pin;
            $row->button_val    = $button_val;
            $row->action_name   = $action_name;
            $row->save();
        }else{
            $button_status::create([
                'button_pin'    => $button_pin,
                'button_val'    => $button_val,
                'action_name'   => $action_name
            ]);
        }

        return redirect(route('button.list'));
    }
}