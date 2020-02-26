<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(function($request,$next){
            if(Gate::allows('manage-teacher')) return $next($request); 
                abort(403, 'Anda tidak memiliki cukup hak akses'); 
        });
    }

    public function index(Request $request)
    {
        $teachers = \App\Teacher::where('status','LIKE','ACTIVE')->paginate(10);
        $name = $request->get('keyword');
        if($name){
            $teachers = \App\Teacher::where([
                ['name','LIKE',"%$name%"],
                ['status','LIKE','ACTIVE'],
            ])->paginate(10);
        }
        return view('teacher.index',['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),
        [
            "name" => "required|min:3|max:75|unique:teachers",
            "phone" => "required|digits_between:10,12",   
            "address" => "required|min:10|max:200",
            "pelajaran" => "required|max:3"
        ],
        [
            "name.unique" => "Nama sudah ada",
            "pelajaran.max" => "Mata Pelajaran tidak boleh lebih dari 3",
            "pelajaran.required" => "Pelajaran harus di isi",
            "name.required" => "Nama harus di isi",
            "name.min" => "Nama minimal 3 huruf",
            "name.max" => "Nama maksimal 75 huruf",
            "phone.required" => "No Telpon harus di isi",
            "phone.digits_between" => "No Telpon harus berjumlah 10-12 digit",
            "address.required" => "Address harus di isi",
            "address.min" => "Address minimal 10 kata",
            "address.max" => "Address maksimal 200 kata"
        ])->validate(); 

        $new_user = new \App\Teacher;
        $new_user->name = $request->get('name');
        $new_user->pelajaran = json_encode($request->get('pelajaran'));
        $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');

        $new_user->save();
        return redirect()->route('teachers.index')->with('status','Teacher Successfully Added');
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
        $teacher = \App\Teacher::findOrFail($id);
        return view('teacher.edit',['teacher' => $teacher]);
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
        $teacher = \App\Teacher::findOrFail($id);
        $teacher->status = $request->get('status');
        $teacher->name = $request->get('name');
        $teacher->pelajaran = json_encode($request->get('pelajaran'));
        $teacher->address = $request->get('address');
        $teacher->phone = $request->get('phone');

        Validator::make($request->all(),
        [
            "name" => "required|min:3|max:75|unique:teachers",
            "phone" => "required|digits_between:10,12",   
            "address" => "required|min:10|max:200",
            "pelajaran" => "required|max:3",
            "status" => "required"
        ],
        [
            "name.unique" => "Nama sudah ada",
            "pelajaran.max" => "Mata Pelajaran tidak boleh lebih dari 3",
            "pelajaran.required" => "Pelajaran harus di isi",
            "name.required" => "Nama harus di isi",
            "name.min" => "Nama minimal 3 huruf",
            "name.max" => "Nama maksimal 75 huruf",
            "phone.required" => "No Telpon harus di isi",
            "phone.digits_between" => "No Telpon harus berjumlah 10-12 digit",
            "address.required" => "Address harus di isi",
            "address.min" => "Address minimal 10 kata",
            "address.max" => "Address maksimal 200 kata"
        ])->validate(); 

        $teacher->save();
        return redirect()->route('teachers.index',['id' => $id])->with('status','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = \App\Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.inactive')->with('status','Deleted');
    }

    public function inactive()
    {
        $teachers = \App\Teacher::where('status','LIKE','INACTIVE')->paginate(5);
        return view('teacher.inactive',['teachers' => $teachers]);
    }

}
