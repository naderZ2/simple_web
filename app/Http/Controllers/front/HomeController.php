<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\back\Slider;
use App\Models\back\Servicedept;
use App\Models\back\Service;
use App\Models\back\Page;
use App\Models\back\Social;
use App\Models\back\Blog;
use App\Models\back\Clientopinion;
use App\Models\back\Message;
use App\Models\back\Qoute;
use App\Models\back\Malilist;
use Illuminate\Database\Eloquent\ModelNotFoundException;//find or fail error exception class.
use Illuminate\Support\Facades\Validator;
use App\Traits\FileUploadTrait;

class HomeController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result_menu_id = 1;
      $result_banners = Slider::get();
      $result_dept_services = Servicedept::orderBy('id','desc')->get();
        $result_successes = Page::where('id','>',2)->where('id','<=',5)->get();
        $result_newses = Blog::orderBy('id','desc')->get();
        $result_clients = Clientopinion::get();
        $result_brand_details = Page::find(6);
        $result_client_details = Page::find(7);
      return view('front.index',compact('result_menu_id','result_banners','result_dept_services','result_successes','result_newses','result_clients','result_brand_details','result_client_details'));
    }

    public function about(){
      $result_menu_id = 2;
      $result_details = Page::find(1);
      $result_successes = Page::where('id','>',2)->where('id','<=',5)->get();
      return view('front.about',compact('result_menu_id','result_details','result_successes'));
    }
    
    
    
     public function qoute(){
      $result_menu_id = 8;
      $result_contact = Page::find(2);
      return view('front.qoute',compact('result_menu_id','result_contact'));
    }
    
     public function qoute_withus(Request $request)
    {
        $new_data = new Qoute;
        $new_data->name = $request->customer_name;
        $new_data->phone = $request->customer_phone;
        $new_data->customer_whats_app_phone =$request->customer_whats_app_phone;
        $new_data->file =$this->uploadFile( $request->customer_file,'files');
        $new_data->car_back_image =$this->uploadFile( $request->car_back_image,'files');
        $new_data->car_front_image =$this->uploadFile( $request->car_front_image,'files');
        $new_data->criminal_record =$this->uploadFile( $request->criminal_record,'files');
        $new_data->blood_test =$this->uploadFile( $request->blood_test,'files');
        $new_data->car_license =$this->uploadFile( $request->car_license,'files');
        $new_data->private_license =$this->uploadFile( $request->private_license,'files');
        $new_data->id_back =$this->uploadFile( $request->id_back,'files');
        $new_data->id_front =$this->uploadFile( $request->id_front,'files');
        $new_data->description = $request->customer_message;
        $new_data->save();
        if(app()->getLocale() == "en"){
            $success_message = "Your qoute has been sent successfully";
        }else{
            $success_message = "لقد تم ارسال رسالتك بنجاح";
        }
        return redirect(route('qoute',app()->getLocale()))->with('success_message',$success_message);
    }



    public function brands(){
      $result_menu_id = 3;
      $result_brands = Servicedept::paginate(10); 
        $result_brand_details = Page::find(6);
      return view('front.brands',compact('result_menu_id','result_brands','result_brand_details'));
    }

    public function brand_details($locale,$id){
      $result_menu_id = 3;
      $result_service_dept = Servicedept::find($id);
      $result_products = Service::where('servicedept_id',$id)->get();
      return view('front.brand_details',compact('result_menu_id','result_service_dept','result_products'));
    }

    public function product_details($locale,$id){
      $result_menu_id = 3;
      $result_product = Service::findOrFail($id);
      $result_relatet_products = Service::where('servicedept_id',$result_product->servicedept_id)->where('id', '!=', $id)->get();
      return view('front.product_details',compact('result_menu_id','result_product','result_relatet_products'));
    }

    public function news(){
      $result_menu_id = 4;
      $result_newses = Blog::orderBy('id','desc')->paginate(4);
      return view('front.news',compact('result_menu_id','result_newses'));
    }

    public function news_details($locale,$id){
      $result_menu_id = 4;
      $result_details = Blog::findOrFail($id);
      return view('front.news_details',compact('result_menu_id','result_details'));
    }

    public function clients(){
      $result_menu_id = 5;
      $result_clients = Clientopinion::paginate(10);
        $result_client_details = Page::find(7);
      return view('front.clients',compact('result_menu_id','result_clients','result_client_details'));
    }

    public function client_details($locale,$id){
      $result_menu_id = 5;
      $result_client = Clientopinion::find($id);
      $result_relatet_clients = Clientopinion::where('id', '!=', $id)->get();
      return view('front.client_details',compact('result_menu_id','result_client','result_relatet_clients'));
    }

    public function terms(){
      $result_menu_id = 4;
      $result_details = Page::find(3);
      $result_about = "";
      return view('front.terms',compact('result_menu_id','result_details','result_about'));
    }

    public function contact(){
      $result_menu_id = 6;
      $result_contact = Page::find(2);
      return view('front.contact',compact('result_menu_id','result_contact'));
    }

    public function page404($locale){
      return view('front.showmap',compact('result_map'));
    }

    public function contact_withus(Request $request)
    {
        $new_data = new Message;
        $new_data->name = $request->customer_name;
        $new_data->email = $request->customer_email;
        $new_data->subject = $request->customer_subject;
        $new_data->details = $request->customer_message;
        $new_data->save();
        if(app()->getLocale() == "en"){
            $success_message = "Your message has been sent successfully";
        }else{
            $success_message = "لقد تم ارسال رسالتك بنجاح";
        }
        return redirect(route('contact',app()->getLocale()))->with('success_message',$success_message);
    }

    public function maillist(Request $request)
    {
        //validation
      $validator = Validator::make($request->all(), [
        'email' => ['required', 'unique:malilists'],
        ]);
        if($validator->fails()){
            return redirect()->back()->with('errorMessage', $validator->errors()->first());
        }

          $new_data = new Malilist;
          $new_data->email = $request->email;
          $new_data->save();

          if(app()->getLocale() == "en"){
              $success_email_message = "You have successfully subscribed to the mailing list";
          }else{
              $success_email_message = "لقد تم اشتراكك في القائمة البريدية بنجاح";
          }

          return redirect()->back()->with('success_email_message',$success_email_message);
    }


}
