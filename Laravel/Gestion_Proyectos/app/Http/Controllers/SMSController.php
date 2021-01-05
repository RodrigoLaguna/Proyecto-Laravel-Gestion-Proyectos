<?php

namespace App\Http\Controllers;

use App\Clases\Funciones;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;


class SMSController extends Controller
{
    public function envioSMS(){

        return view('sms');
    }



    public function sendMessage(Request $request)
    {

        $validacion =[
            'Telefono' => 'required|regex:/(^55+[0-9]{0,8})/'
        ];

        $mensaje=['required'=>':Attribute requerido'];
        $this->validate($request,$validacion,$mensaje);

        $temp = new Funciones();
        $recipients = $temp->lada($request->input('Telefono'));
        $message = $request->input('Mensaje');

       $account_sid = "ACb625091d4ce89085f8e2d2c33be92f7b";
       $auth_token = "9454d8e288fb831cbd97779480f54f19";
       $twilio_number = "+12062225007";

       $client = new Client($account_sid, $auth_token);
       $client->messages->create($recipients,
           ['from' => $twilio_number, 'body' => $message] );
       return back()->with(['success' => "Messages on their way!"]);
    }
}
