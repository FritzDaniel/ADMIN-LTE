<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function create()
    {
        return view('admin.testimony.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'age' => 'required|numeric',
            'testimony' => 'required',
            'company' => 'required'
        ]);

        try {

            if ($request->hasFile('photo')){
                if ($request->file('photo')->isValid()){
                    $name = Carbon::now()->timestamp.'.'.$request->file('photo')->getClientOriginalExtension();
                    $store_path = 'storage/fotoTestimoni';
                    $request->file('photo')->move($store_path,$name);
                }
            }

            $store = new Testimoni();
            $store->photo = isset($name) ? "/storage/fotoTestimoni/".$name : '/storage/img/dummyUser.jpg';
            $store->name = $request['name'];
            $store->age = $request['age'];
            $store->testimoni = $request['testimony'];
            $store->company = $request['company'];
            $store->save();

            return redirect()->route('admin.testimony')->with('message','Testimony is successfully created');

        } catch (\Exception $e)
        {
            return redirect()->back()->with('error','Testimony is failed to created');
        }
    }
}
