<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Service;
use Illuminate\Support\Str;
use Image;
use File;

class ServiceController extends Controller
{
    public function index(){
        return view('admin.service.index')->with('categories',Category::all());
    }

    public function create(Request $request){

        $service = new Service();
        $service->name = $request->name;
        $service->detail = $request->detail;
        $service->price = $request->price;
        $service->category_id = $request->category;

        if ($request->hasFile('image')) {
            $filemane = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/backend/images/', $filemane);
            Image::make(public_path() . '/backend/images/' . $filemane);
            $service->image = $filemane;
        } else {
            $service->image = 'NOPIC.jpg';
        }

        $service->save();
        return redirect()->route('index.admin');
    }

    public function edit($id){
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'))
        ->with('categories',Category::all());
    }

    public function update(Request $request,$id){

        if ($request->hasFile('image')) {
            $service = Service::find($id);
            if ($service->image != 'NOPIC.jpg') {
                File::delete(public_path() . '/backend/images/' . $service->image);
            }
            $filemane = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/backend/images/', $filemane);
            Image::make(public_path() . '/backend/images/' . $filemane);
            $service->image = $filemane;
            $service->name = $request->name;
            $service->detail = $request->detail;
            $service->price = $request->price;
            $service->category_id = $request->category;
        } else {
            $service = Service::find($id);
            $service->name = $request->name;
            $service->detail = $request->detail;
            $service->price = $request->price;
            $service->category_id = $request->category;
        }

        $service->update();
        return redirect()->route('index.admin');
    }

    public function delete($id){
        $delete = Service::find($id);
        if ($delete->image != 'NOPIC.jpg') {
            File::delete(public_path().'/backend/images/'.$delete->image);
        }
        $delete->delete();
        return redirect()->route('index.admin');
    }
}
