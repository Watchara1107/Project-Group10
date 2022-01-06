<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('welcome')
        ->with('services',Service::paginate(8))
        ->with('categories',Category::all());
    }
}
