<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(function($request,$next){
            if(Gate::allows('manage-users')) return $next($request); 
                abort(403, 'Anda tidak memiliki cukup hak akses'); 
        });
    }

    public function index(Request $request)
    {
        $users = \App\User::where('status','LIKE','ACTIVE')->paginate(10);;
        $roles = $request->get('roles');
        if($roles){
            $users = \App\User::where([
                ['roles','LIKE',"$roles"],
                ['status','LIKE','ACTIVE'],
            ])->paginate(10);
        }

        return view('user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            "name" => "required|min:3|max:75",
            "roles" => "required",
            "phone" => "required|digits_between:10,12",   
            "address" => "required|min:5|max:200",
            "email" => "required|email",   
            "password" => "required",   
            "password_confirmation" => "required|same:password" 
        ])->validate(); 

        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->roles = $request->get('roles');
        $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));

        $new_user->save();
        return redirect()->route('users.index')->with('status','User Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        return view('user.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\User::findOrFail($id);
        $user->name = $request->get('name');
        $user->status = $request->get('status');
        $user->roles = $request->get('roles');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');

        $user->save();
        return redirect()->route('users.index',['id' => $id])->with('status','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status','Deleted');
    }

    public function inactive()
    {
        $users = \App\User::where('status','LIKE','INACTIVE')->paginate(10);
        return view('user.inactive',['users' => $users]);
    }

}
