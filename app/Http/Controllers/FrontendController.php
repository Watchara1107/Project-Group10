<?php

namespace App\Http\Controllers;

use App\Booking;
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

    public function createbooking(Request $request){

        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->people = $request->people;
        $booking->massage = $request->message;
        $booking->save();
        $notification = array(
            'message' => 'คุณได้ทำการจองคิวเรียบร้อยแล้ว',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
