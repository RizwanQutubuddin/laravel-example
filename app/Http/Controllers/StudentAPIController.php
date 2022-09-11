<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::orderBy('id','desc')->paginate(10);
        return response()->json($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'file'=>'required'
        ]);

        if($validator->fails()){
            return response()->json( $validator->errors(),401 ); 
        }
        return response()->json(["status_code"=>201,'result'=>$request->file('file')->store('apiDocs')]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required'
        ]);
        
        if($validator->fails()){
            return response()->json( $validator->errors(),401 );
        }
        $student=new Student;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        if($student->save()){
            return response()->json(['data'=>'stored successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::findOrfail($id);
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required'
        ]);
        
        if($validator->fails()){
            return response()->json( $validator->errors(),401 );
        }
        $student=Student::findOrfail($id);
        return response()->json(['data'=>$student]);
        
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        if($student->save()){
            return response()->json(['data'=>'updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::findOrfail($id);
        if($student->delete()){
            return response()->json(['data'=>'destroyed successfully']);
        }
    }

    public function search($name){
        $students= Student::where("name","like","%".$name."%")->get();
        return response()->json($students);
    }
}
