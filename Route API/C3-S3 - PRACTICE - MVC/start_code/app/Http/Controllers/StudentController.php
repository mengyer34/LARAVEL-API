<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\VarDumper\Cloner\Stub;

class StudentController extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getAllStudents()
    {
        return Student::all();
    }
    public function showStudent()
    {
        return view('students', ['students'=>Student::all()]);
    }
    public function getStudentById($id)
    {
        $student = Student::find($id);
        if($student==''){
            $student = 'Student not found';
        }
        return $student;
    }
}
