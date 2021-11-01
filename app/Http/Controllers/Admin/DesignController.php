<?php

namespace App\Http\Controllers\Admin;

use App\Design;
use App\DesignChild;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function createDesign()
    {
        return view('admin.design.create');
    }

    public function subDesign($id)
    {
        $master = Design::find($id);
        $data = DesignChild::where('design_id','=',$id)->get();
        return view('admin.design.subDesign.index',compact('master','data'));
    }

    public function createSubDesign($id)
    {
        $master = Design::find($id);
        return view('admin.design.subDesign.create',compact('master'));
    }

    public function storeDesign(Request $request)
    {
        $this->validate($request,[
            'designName' => 'required'
        ]);

        if ($request->hasFile('designImage')){
            if ($request->file('designImage')->isValid()){
                $name = Carbon::now()->timestamp.'.'.$request->file('designImage')->getClientOriginalExtension();
                $store_path = 'storage/fotoDesign';
                $request->file('designImage')->move($store_path,$name);
            }
        }

        $store = new Design();
        $store->designName = $request['designName'];
        $store->designImage = isset($name) ? "/storage/fotoDesign/".$name : '/storage/img/dummy.jpg';
        $store->save();

        return redirect()->route('admin.design')->with('message','Design is successfully created');
    }

    public function storeSubDesign(Request $request,$id)
    {
        $this->validate($request,[
            'designName' => 'required'
        ]);

        if ($request->hasFile('designImage')){
            if ($request->file('designImage')->isValid()){
                $name = Carbon::now()->timestamp.'.'.$request->file('designImage')->getClientOriginalExtension();
                $store_path = 'storage/fotoSubDesign';
                $request->file('designImage')->move($store_path,$name);
            }
        }

        $store = new DesignChild();
        $store->design_id = $id;
        $store->designName = $request['designName'];
        $store->designImage = isset($name) ? "/storage/fotoSubDesign/".$name : '/storage/img/dummy.jpg';
        $store->save();

        return redirect()->route('admin.subDesign',$id)->with('message','Design is successfully created');
    }
}
