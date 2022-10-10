<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Customer::all();
        return view('customer.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|unique:customers|',
            'password' => 'required',
            'mobile' => 'required',
            'image' => 'nullable',
            'address' => 'required',
        ]);
        $img_path = $request->file('image');
        $filename = $img_path.'_.'.$img_path->getClientOriginalExtension();
        $success = $img_path->storeAs('public/app', $filename);
        $data=new Customer;
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->mobile=$request->mobile;
        $data->image=$success;
        $data->address=$request->address;
        $data->save();

        return redirect('admin/customer/create')->with('success','Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Customer::find($id);
        return view('customer.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $data=Customer::find($id);
        return view('customer.edit',['data'=>$data]);
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
       
        $validated = $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|',
            'password' => 'required',
            'mobile' => 'required',
            'image' => 'nullable',
            'address' => 'required',
        ]);
        $data=Customer::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->mobile=$request->mobile;
        if($request->image){
            $img_path = $request->file('image')->store('storage/imgs');
        }else{
            $img_path = $request->image;
        }
        $data->image=$img_path;
        // dd($request);
        $data->address=$request->address;
        $data->update();
    return redirect('admin/customer/'.$id .'/edit')->with('success','Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id',$id)->delete();
        return redirect('admin/customer')->with('success',"The Data has been deleted");
    }
}
