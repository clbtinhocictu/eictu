<?php

namespace App\Http\Controllers;

use App\Major;
use App\School;
use App\Student;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //

    public function get_id($masv){

    }

    public function index()
    {
        $type = Auth::user()->type;
        if($type==1) {
            $data = Student::select('*')->get();
            // return view('iWant.eICTuStudentDemandSearch', compact('data'));
//        DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.id', 'contacts.phone', 'orders.price')
//            ->get();
            $stt = 1;
            return view("students.index", compact('data', 'stt'));
        }
        else if($type==3)
        {
            $name= Auth::user()->name;
            return view("students.studentHomepage", compact('name'));
        }
    }

    public function create()
    {
        $data = School::select('*')->get();
        $majors= Major::select('*')->get();
        return view('students.create',compact('data','majors'));
    }

    //add
    public function store(Request $request)
    {
        $data = array();
        $data['code']       = $request->input('Code');
        $data['name']       = $request->input('Name');
        $data['gender']     = $request->input('gender');
        $data['birthday']   = $request->input('Birthday');
        $data['major_id']   = $request->input('Major_Id');

        // lấy mã trường do quản trị viên quản lý
        $userid= Auth::user()->id;
        $school= School::where('user_id', $userid)->first();
        $data['school_id']  = $school->id;
       // echo  $data['code'] ; 
      //  echo   "\nho ten :".$data['name'] ;

        $this->validate($request, [
            'Code'    => 'required',
            'Name'    => 'required'
        ]);

        //add student

        $student = new Student();
        $student->code      = $data['code'];
        $student->name      = $data['name'];
        $student->gender    = $data['gender'];
        $student->birthday  = $data['birthday'];
        $student->major_id  = $data['major_id'];
        $student->class_id  = Null;
        $student->school_id =$data['school_id'];
        $student->save();
       if ($student->save() == true) {
           $user = new User();
           $user->name = $data['name'];
           $user->username = $data['code'];
           $user->email =$data['code']."@ictu.edu.vn";
           $user->type = 3;
           $user->password = bcrypt($data['code']);
           $user->save();
           return redirect("student");
       }
       // create acount
       // $user=new User();
       // $user->email        = $data['code']."@ictu.edu.vn";
       // $user->username     = $data['code'];
       // $user->password     = $data['code'];
       // $user->type         = 3;
       // $user->name         = $data['name'];
       // $user->save();
    }
}
