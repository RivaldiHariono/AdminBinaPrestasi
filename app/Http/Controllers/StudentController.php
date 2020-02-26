<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(function($request,$next){
            if(Gate::allows('manage-student')) return $next($request); 
                abort(403, 'Anda tidak memiliki cukup hak akses'); 
        });
    }

    public function index(Request $request)
    {
        $students = \App\Student::where('status','LIKE','ACTIVE')->paginate(10);
        $name = $request->get('keyword');
        if($name){
            $students = \App\Student::where([
                ['name','LIKE',"%$name%"],
                ['status','LIKE','ACTIVE'],
            ])->paginate(10);
        }
        return view('student.index',['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.create");
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
            "name" => "required|min:3|max:75|unique:students",
            "phone" => "required|digits_between:10,12",   
            "address" => "required|min:10|max:200",
            "jurusan" => "required",   
            "kelas" => "required" 
            ]
            ,[
            "jurusan.required" => "Jurusan harus di isi",
            "kelas.required" => "Kelas harus di isi",
            "name.required" => "Nama harus di isi",
            "name.min" => "Nama minimal 3 huruf",
            "name.max" => "Nama maksimal 75 huruf",
            "name.unique" => "Nama sudah ada",
            "phone.required" => "No Telpon harus di isi",
            "phone.digits_between" => "No Telpon harus berjumlah 10-12 digit",
            "address.required" => "Address harus di isi",
            "address.min" => "Address minimal 10 kata",
            "address.max" => "Address maksimal 200 kata"
            ]

        )->validate(); 

        $new_user = new \App\Student;
        $new_user->name = $request->get('name');
        $new_user->jurusan = $request->get('jurusan');
        $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        $new_user->kelas = $request->get('kelas');

        $new_user->save();
        return redirect()->route('students.index')->with('status','Student Successfully Added');
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
        $student = \App\Student::findOrFail($id);
        return view('student.edit',['student' => $student]);
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
        Validator::make($request->all(),
            [
            "name" => "required|min:3|max:75|unique:students",
            "phone" => "required|digits_between:10,12",   
            "address" => "required|min:10|max:200",
            "jurusan" => "required",   
            "kelas" => "required" 
            ]
            ,[
            "jurusan.required" => "Jurusan harus di isi",
            "kelas.required" => "Kelas harus di isi",
            "name.required" => "Nama harus di isi",
            "name.min" => "Nama minimal 3 huruf",
            "name.max" => "Nama maksimal 75 huruf",
            "name.unique" => "Nama sudah ada",
            "phone.required" => "No Telpon harus di isi",
            "phone.digits_between" => "No Telpon harus berjumlah 10-12 digit",
            "address.required" => "Address harus di isi",
            "address.min" => "Address minimal 10 kata",
            "address.max" => "Address maksimal 200 kata"
            ]

        )->validate(); 


        $student = \App\Student::findOrFail($id);
        $student->name = $request->get('name');
        $student->jurusan = $request->get('jurusan');
        $student->address = $request->get('address');
        $student->phone = $request->get('phone');
        $student->kelas = $request->get('kelas');
        $student->status = $request->get('status');

        $student->save();
        return redirect()->route('students.index',['id' => $id])->with('status','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = \App\Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('status','Deleted');
    }

    public function inactive()
    {
        $students = \App\Student::where('status','LIKE','INACTIVE')->paginate(5);
        return view('student.inactive',['students' => $students]);
    }

}
