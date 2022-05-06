<?php

namespace App\Http\Controllers;

use App\Models\Arduinos;
use Illuminate\Http\Request;
use Str;

class ArduinoController extends Controller
{
    public function index(Request $request){

        $arduino_name           = $request->arduino_name;

        $arduinos               = Arduinos::orderBy('id', 'desc')
                                            ->where('arduino_name', 'like', '%'.$arduino_name.'%')
                                            ->paginate(15);

        return view('arduino_list',[
            'arduinos' => $arduinos
        ]);
    }

    public function viewArduino( $id = null ){
        $arduino                = new Arduinos();

        if($id != ''){
            $arduino            = $arduino::find($id);
        }

        return view('arduino_form', [
            'arduino' => (object)$arduino
        ]);
    }

    public function saveArduino(Request $request){

        $id                     = $request->id;
        $arduino_name           = $request->arduino_name;
        $arduino_ip             = $request->arduino_ip;
        $comment                = $request->comment;

        $arduino                = new Arduinos();

        $arduino_name           = Str::replace( ' ', '_', $arduino_name );

        if($id != ''){
            $row                = $arduino::find($id);;
            $row->arduino_name  = $arduino_name;
            $row->arduino_ip    = $arduino_ip;
            $row->comment       = $comment;
            $row->save();
        }else{
            $arduino::create([
                'arduino_name'  => $arduino_name,
                'arduino_ip'    => $arduino_ip,
                'comment'       => $comment
            ]);
        }

        return redirect(route('arduino.list'))->with('message','Success!');
    }


}
