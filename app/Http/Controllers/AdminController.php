<?php

namespace App\Http\Controllers;

use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\User; // Import User model
use App\Models\Order;
use PDF;
use Notification;


class AdminController extends Controller
{
    public function categoryAdd(){
        
        $categorys=Category::all();

        return view('admin.category',compact('categorys'));

    }
    public function categoryAdded(Request $request){
        $category = new category;//this category is model file
        $category->category=$request->category;
        $category->save();
        return redirect()->back();

    }
    public function categoryDelete($id){
        $data=category::find($id);
        $data->delete();
        return redirect()->back();

    }
    
    public function order(){
        $order=order::all();
        return view('admin.orderview',compact('order'));
    }
    public function delivery($id){
        $order=order::find($id);
        $order->delivery_status="delievered";
        $order->payment_status="paid";
        $order->save();
        return redirect()->back();

    }
    public function pdfDownload($id){
        $order=order::find($id);
        $print_pdf= PDF::loadView('admin.pdfDetail',compact('order'));
        return $print_pdf->download('order_details.pdf');
    }

    public function searchOrder(Request $request){
        $search=$request->search;
        $order=Order::where('product_name','LIKE',"%$search%")->get();

        return view('admin.orderview',compact('order'));
        
    }
    public function sendEmail($id){
        $order=order::find($id);
        $user_id=$order->email;
        return view ('admin.sendEmail',compact('user_id','order'));
    }
    
    public function send_email_id(Request $request,$id){
        $order=order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'title'=>$request->title,
            'button'=>$request->button,
            'link'=>$request->link,
            'body'=>$request->body,
            'lastline'=>$request->lastline,
        ];
        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back()->with('message',"email send successfully");


    }
    
    
    
}
