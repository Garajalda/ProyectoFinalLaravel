<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
       // dd($request->all());
        $rules = [
            'message' => 'required|min:5|max:255'
        ];
        $messages = [
            'message.required' => 'Debe rellenar el campo mensaje.',
            'message.min' => 'Ingrese al menos 5 caracteres.',
            'message.max' => 'Solo puede ingresar como máximo 255 caracteres.'
        ];
        $this->validate($request,$rules,$messages);
        $message = new Message();
        $message->incident_id = $request->input('incident_id');
        $message->message = $request->input('message');
        $message->user_id = auth()->user()->id;
        $message->save();

        return back()->with('notification', 'Su mensaje se envío con exito.');
    }
}
