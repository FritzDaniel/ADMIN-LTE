<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function variantCreate()
    {
        return view('admin.variant.create');
    }

    public function variantStore(Request $request)
    {
        $this->validate($request,[
            'variantType' => 'required'
        ]);

        $data = new Variant();
        $data->variantType = $request['variantType'];
        $data->save();

        return redirect()->route('admin.variant')->with('message','Variant successfully created');
    }

    public function variantUpdate(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'variantType' => 'required',
        ]);

        if($validator->fails()) {
            return $this->sendError($validator->errors(),'Error',400);
        }
        $data = Variant::where('id','=',$id)->first();
        $data->variantType = $request['variantType'];
        $data->update();

        return $this->sendResponse($data,'Success');
    }

    public function variantDelete($id)
    {
        $data = Variant::where('id','=',$id)->first();
        $data->delete();

        return $this->sendResponse($data,'Success');
    }
}
