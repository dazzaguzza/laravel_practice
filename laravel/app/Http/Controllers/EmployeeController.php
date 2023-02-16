<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeCreateRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    public function index(){
        // $employees = Employee::get();
        $employees = [
            'employees' => Employee::get(),
            'ip' => request()->ip()
        ];

        return view('employee.index', $employees);
    }

    public function create(){
        $ip = request()->ip();
        return view('employee.create',compact('ip'));
    }

    public function store(EmployeeCreateRequest $request){

        $extension  = request()->file('photo')->getClientOriginalExtension(); //This is to get the extension of the image file just uploaded
        $image_name = time() . '_' . $request->started_at . '.' . $extension;

        $path = $request->file('photo')->storeAs(
            'images',
            $image_name,
            's3'
        );

        Employee::create([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'hobbies'=> implode(',',$request->hobbies),
            'started_at'=>$request->started_at,
            'photo'=>$path,
        ]);

        return redirect('/employees');
    }
}
