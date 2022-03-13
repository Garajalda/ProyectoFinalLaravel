<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role',1)->get();
        return view('admin.users.index')->with(compact('users'));
    }
    public function store(Request $request){

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
        $message = [
            'name.required' => 'Debe ingresar el nombre de usuario.',
            'name.max' => 'El nombre de usuario no puede ser mayor de 255 caracteres.',
            'email.required' => 'Debe completar el campo Email.',
            'email.email' => 'El email no es válido.',
            'email.max' => 'El email no puede ser mayor de 255 caracteres',
            'email.unique' => 'Este email ya está en uso',
            'password.required' => 'El campo contraseña no puede estar vacío.',
            'password.min' => 'La contraseña deberá tener como mínimo 8 caracteres.'
        ];

        $this->validate($request,$rules,$message);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 1;
        $user->save();

        return back()->with('notification','Usuario registrado.');
    }
    public function edit($id){
        $user = User::find($id);
        $projects = Project::all();
        $projects_user = ProjectUser::where('user_id',$user->id)->get();
        return view('admin.users.edit')->with(compact('user','projects','projects_user'));
    }
    public function update($id, Request $request){
        $user = User::find($id);
        $rules = [
            'name' => 'required|max:255',
            'password' => 'nullable|min:8'
        ];
        $messages = [
            'name.required' =>'El campo nombre no puede estar vacío',
            'name.max' => 'El nombre es demasiado largo.',
            'password.min' => 'La contraseña debe cumplir 8 caracteres como mínimo.'
        ];

        $this->validate($request,$rules,$messages);
        $user = User::find($id);
        $user->name=$request->input('name');

        $password = $request->input('password');
        if($password)
            $user->password = bcrypt($password);
        $user->save();
        return back()->with('notification','Usuario modificado.');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('notification', 'El usuario se ha borrado correctamente.');
    }
}
