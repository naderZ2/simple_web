<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\back\Clientopinion;
use Auth;

class ClientopinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$title = " العملاء";
		$view_title = "عرض  العملاء";
		$dpage_id = 4;
		$result = Clientopinion::orderBy('id','desc')->get();
		return view('back.clientopinion.index',compact('result','title','view_title','dpage_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$title = " العملاء";
		$view_title = "اضافة  عميل";
		$dpage_id = 4;
		return view('back.clientopinion.add',compact('title','view_title','dpage_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
        $validateDate = $request->validate([
			'page_name'=>'required',
            'page_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		
		if($request->hasFile('page_picture')){
			$img = $request->file('page_picture');
			$img_name = time().'.'.$img->getClientOriginalExtension();
			$folder_path = public_path('/uploads/clients');
			$img->move($folder_path, $img_name);
		}else{
			$img_name= "";
		}
		
		$new_data = new Clientopinion;
    $new_data->name = $request->page_name;
    $new_data->name_en = $request->page_name_en;
    $new_data->details = $request->page_details;
    $new_data->details_en = $request->page_details_en;		
    $new_data->description = $request->page_description;
    $new_data->description_en = $request->page_description_en;
    $new_data->address = $request->page_address;
    $new_data->address_en = $request->page_address_en;

    $new_data->phone = $request->page_phone;
    $new_data->email = $request->page_email;		
    $new_data->website = $request->page_website;
    $new_data->facebook = $request->page_facebook;
    $new_data->twitter = $request->page_twitter;
    $new_data->google = $request->page_google;
    $new_data->instagram = $request->page_instagram;
    $new_data->whatsapp = $request->page_whatsapp;
    $new_data->youtube = $request->page_youtube;

		$new_data->picture = $img_name;
		$new_data->save();
		return redirect(route('clients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$title = " العملاء";
		$view_title = "تعديل  عميل";
		$dpage_id = 4;
        $result_page = Clientopinion::where('id',$id)->first();
		return view('back.clientopinion.edit',compact('result_page','title','view_title','dpage_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate = $request->validate([
			'page_name'=>'required',
            'page_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		
		$new_data = Clientopinion::find($id);

		if($request->hasFile('page_picture')){
			$img = $request->file('page_picture');
			$img_name = time().'.'.$img->getClientOriginalExtension();
			$folder_path = public_path('/uploads/clients');
			$img->move($folder_path, $img_name);
			@unlink($folder_path.'/'.$new_data->picture);
		}else{
			$img_name= $new_data->picture;
		}
		
    $new_data->name = $request->page_name;
    $new_data->name_en = $request->page_name_en;
    $new_data->details = $request->page_details;
    $new_data->details_en = $request->page_details_en;		
    $new_data->description = $request->page_description;
    $new_data->description_en = $request->page_description_en;
    $new_data->address = $request->page_address;
    $new_data->address_en = $request->page_address_en;

    $new_data->phone = $request->page_phone;
    $new_data->email = $request->page_email;		
    $new_data->website = $request->page_website;
    $new_data->facebook = $request->page_facebook;
    $new_data->twitter = $request->page_twitter;
    $new_data->google = $request->page_google;
    $new_data->instagram = $request->page_instagram;
    $new_data->whatsapp = $request->page_whatsapp;
    $new_data->youtube = $request->page_youtube;

		$new_data->picture = $img_name;
		$new_data->save();
		return redirect(route('clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new_data = Clientopinion::find($id);
		if($new_data->picture != ""){
			$folder_path = public_path('/uploads/clients');
			@unlink($folder_path.'/'.$new_data->picture);
		}
		$new_data->delete();
		return redirect(route('clients.index'));
    }
}
