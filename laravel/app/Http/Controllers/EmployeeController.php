<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeCreateRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    public function index(){
        $employees = Employee::get();
        return view('employee.index', compact('employees'));
    }

    public function create(){
        return view('employee.create');
    }

    public function store(EmployeeCreateRequest $request){


        Employee::create([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'hobbies'=> implode(',',$request->hobbies),
            'started_at'=>$request->started_at,
            'photo'=>$request->file('photo')->store('public'),
        ]);

        return redirect('/employees');
    }
}
