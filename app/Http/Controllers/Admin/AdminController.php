<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $service = Service::all();
        return view('admin.admin.index',compact('service'));
    }
}
