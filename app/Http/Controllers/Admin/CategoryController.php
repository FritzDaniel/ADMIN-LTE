<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

//        if ($request->hasFile('logo')){
//            if ($request->file('logo')->isValid()){
//                $name = Carbon::now()->timestamp.'.'.$request->file('logo')->getClientOriginalExtension();
//                $store_path = 'https://api.pvotdigital.com/app/storage/fotoKategori';
//                $request->file('logo')->move($store_path,$name);
//            }
//        }

//        $store = [
//            'name' => $request['name'],
//            'logo' => isset($name) ? "/storage/fotoKategori/".$name : '/storage/img/dummy.jpg',
//        ];
//        Category::create($store);

        return redirect()->route('admin.category')->with('message','Category is successfully created');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.create',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        if ($request->hasFile('logo')){
            if ($request->file('logo')->isValid()){
                $name = Carbon::now()->timestamp.'.'.$request->file('logo')->getClientOriginalExtension();
                $store_path = 'public/fotoKategori';
                $request->file('logo')->storeAs($store_path,$name);
            }
        }

        $data = Category::where('id','=',$id)->first();
        $data->name = $request['name'];
        $data->logo = isset($name) ? "/storage/fotoKategori/".$name : '/storage/img/dummy.jpg';
        $data->update();

        return $this->sendResponse($data,'Success',200);
    }

    public function delete($id)
    {
        $data = Category::where('id','=',$id)->first();
        $data->delete();

        return $this->sendResponse($data,'Success');
    }
}
