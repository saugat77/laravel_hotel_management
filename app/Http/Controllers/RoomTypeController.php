<?php

namespace App\Http\Controllers;
use App\Models\RoomType;
use App\Models\RoomTypeImage;

use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Roomtype::all();
        return view('roomtype.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'detail'=>'required',
            'price'=>'required'
        ]);
        $data=new RoomType;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();

        foreach($request->file('imgs') as $img){
            $imgpath = $img->store('public/imgs');
            $imgdata = new RoomTypeImage;
            $imgdata->img_src = $imgpath;
            $imgdata->room_type_id = $data->id;
            $imgdata->img_alt = $request->title;
            $imgdata->save();
        }

        return redirect('admin/roomtype/create')->with('success','Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data=Roomtype::find($id);

        return view('roomtype.show',['data'=>$data]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data=Roomtype::find($id);
        $gallery = RoomTypeImage::where('room_type_id',$id)->get();
        return view('roomtype.edit',['data'=>$data,'gallery'=>$gallery]);
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
        $data=RoomType::find($id);
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->save();
    return redirect('admin/roomtype/'.$id .'/edit')->with('success','Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       RoomType::where('id',$id)->delete();
       return redirect('admin/roomtype')->with('success',"The Data has been deleted");
    }
}
