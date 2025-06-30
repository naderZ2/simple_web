<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\back\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Traits\FileUploadTrait;


class SettingController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
        //
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
		$title = "اعدادات الموقع";
		$view_title = "تعديل اعدادات الموقع";
		$dpage_id = 14;
        $result_page = User::where('id',$id)->first();
		return view('back.setting.edit',compact('result_page','title','view_title','dpage_id'));
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
			'page_email'=>'required',
            'page_password' => 'required',
		]);
		
		$new_data = User::find($id);

		$new_data->title = $request->page_title;
        $new_data->title_en = $request->page_title_en;
        $new_data->email = $request->page_email;
        $new_data->password = Hash::make($request->page_password);
  		$new_data->message_email = $request->page_message_email;
        $new_data->description = $request->page_description;
        $new_data->description_en = $request->page_description_en;
        $new_data->news = $request->news;
        if($request->logo){
           $new_data->logo = $this->uploadFile($request->logo,'logo');
        }
		$new_data->save();
		return redirect(route('setting.edit',1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
