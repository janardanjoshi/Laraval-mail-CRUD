<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emp;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\DB;
use Mail;

class Employee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* home page */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** create page */
        $url = url('emp');
        $titel = "Customer Registration";
        $data = compact('url','titel');
        return view('emp')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $emp = new Emp;
        $emp->name = $request['name'];
        $emp->email = $request['email'];
        $emp->password = md5($request['password']);
        $emp->address = $request['address'];
        $emp->gender = $request['gender'];
        $emp->dob = $request['dob'];
        $emp->save();

        return redirect('/emp/view')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $search = $request['search'] ?? '';
        if ($search != ''){
            $data = Emp::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->get();
        }else{
            $data = Emp::Paginate(10);
        }
        $titel = "Customer Infomation";
        $data1 = compact('data','titel');
        return view('customer-data')->with($data1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Emp::find($id);
        if (is_null($edit)){
                // not found
            return redirect('/emp/view');

        }
        else {
            $url = url('emp/'.$id.'');
            $titel = "Update Customer";
            $data = compact('edit', 'url', 'titel');
            return view('edit')->with($data);
        }
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
        $update = Emp::find($id);

        $update->name = $request['name'];
        $update->email = $request['email'];
        $update->address = $request['address'];
        $update->gender = $request['gender'];
        $update->dob = $request['dob'];
        $update->update();

        return redirect('/emp/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Emp::find($id);
        if (!is_null($delete)){
            $delete->delete();
        }
        return redirect('/emp/view');
    }

    public function trash()
    {
        $data = Emp::onlyTrashed()->get();
        $data1 = compact('data');
        return view('trash')->with($data1);
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

}
