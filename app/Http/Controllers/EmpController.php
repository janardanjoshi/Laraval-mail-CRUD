<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emp;

class EmpController extends Controller
{
    public function index()
    {
        $url = url('emp/create');
        $titel = "Customer Registration";
        $data = compact('url','titel');
        return view('emp')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confimation' => 'required|same:password',
                'address' => 'required',
                'gender' => 'required',
                'dob' => 'required|date'
            ]
        );

        $emp = new Emp;
        $emp->name = $request['name'];
        $emp->email = $request['email'];
        $emp->password = md5($request['password']);
        $emp->address = $request['address'];
        $emp->gender = $request['gender'];
        $emp->dob = $request['dob'];
        $emp->save();

        return redirect('/emp/view');
    }

    public function view(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != ''){
            $data = Emp::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->get();
        }else{
            $data = Emp::simplePaginate(20);
        }
        $data1 = compact('data');
        return view('customer-data')->with($data1);
    }

    public function trash()
    {
        $data = Emp::onlyTrashed()->get();
        $data1 = compact('data');
        return view('trash')->with($data1);
    }

    public function delete($id)
    {
        $delete = Emp::find($id);
        if (!is_null($delete)){
            $delete->delete();
        }
        return redirect('/emp/view');
    }

    public function forceDelete($id)
    {
        $data = Emp::withTrashed()->find($id);
        if (!is_null($data)){
            $data->forceDelete();
        }
        return redirect('/emp/view');
    }

    public function restor($id)
    {
        $restor = Emp::withTrashed()->find($id);
        if (!is_null($restor)){
            $restor->restore();
        }
        return redirect('/emp/view');
    }

    public function edit($id)
    {
        $edit = Emp::find($id);
        if (is_null($edit)){
                // not found
            return redirect('/emp/view');
        }
        else {
            $url = url('emp/update')."/". $id;
            $titel = "Update Customer";
            $data = compact('edit', 'url', 'titel');
            return view('emp')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $update = Emp::find($id);

        $update->name = $request['name'];
        $update->email = $request['email'];
        $update->address = $request['address'];
        $update->gender = $request['gender'];
        $update->dob = $request['dob'];
        $update->save();

        return redirect('/emp/view');
    }
}
