<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function fetchStudents(){
        $students=Student::orderBy('id','desc')->get();
        return view('/students-list',compact('students'));
    }

    public function addStudent(Request $request){
        
        $student=new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        return response()->json($student);
    }
    
    public function getStudentById($id){
        $student=Student::where("id",$id)->first();
        return response()->json($student);
    }

    public function updateStudentById(Request $request){
        $student=Student::find($request->id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        return response()->json($student);
    }

    public function deleteStudentById($id){
        $student=Student::find($id);
        $student->delete();
        return response()->json(['success'=>'Record has been deleted successfully']);
    }

    public function deleteCheckBoxStudents(Request $request){
        $ids=$request->ids;
        Student::whereIn('id',$ids)->delete();
        return response()->json(['success'=>'Record has been deleted successfully']);
    }

    public function index(Request $request){
        $students=Student::paginate(10);
        if($request->ajax()){
            $view=view('data',compact('students'))->render();
            return response()->json(['html'=>$view]);
        }
        
        return view('student-infinite-scroll-pagination',compact('students'));
    }

    //count soft deleted student list
    function deleteStudentList()
    {
        $students = Student::withTrashed()->get();
        return view('/student-deleted-list',compact('students'));
    }

    //UNDO soft deleted students
    function studentDeletedUndo($id)
    {
        $student=Student::find($id);
        $student->deleted_at=null;
        $student->save();
        echo 'hello';
        die();
        //$this->deleteStudentList();
    }
    
}
