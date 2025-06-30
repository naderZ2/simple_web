<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\back\Page;
use Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$title = "الصفحات";
		$view_title = "عرض الصفحات";
		$dpage_id = 9;
		$result = page::orderBy('id','desc')->get();
		return view('back.page.index',compact('result','title','view_title','dpage_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$title = "الصفحات";
		$view_title = "اضافة صفحات";
		$dpage_id = 9;
		return view('back.page.add',compact('title','view_title','dpage_id'));
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
			$folder_path = public_path('/uploads');
			$img->move($folder_path, $img_name);
		}else{
			$img_name= "";
		}
		
		$new_data = new page;
		$new_data->name = $request->page_name;
    $new_data->name_en = $request->page_name_en;
    $new_data->details = $request->page_details;
    $new_data->details_en = $request->page_details_en;		
    $new_data->description = $request->page_description;
    $new_data->description_en = $request->page_description_en;
    $new_data->picture = $img_name;
		$new_data->save();
		return redirect(route('page.index'));
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
		$title = "الصفحات";
		$view_title = "تعديل صفحات";
		$dpage_id = 9;
        $result_page = page::where('id',$id)->first();
		return view('back.page.edit',compact('result_page','title','view_title','dpage_id'));
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
		
		$new_data = page::find($id);

		if($request->hasFile('page_picture')){
			$img = $request->file('page_picture');
			$img_name = time().'.'.$img->getClientOriginalExtension();
			$folder_path = public_path('/uploads');
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
		$new_data->picture = $img_name;
		$new_data->save();
		return redirect(route('page.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new_data = page::find($id);
		if($new_data->picture != ""){
			$folder_path = public_path('/uploads');
			@unlink($folder_path.'/'.$new_data->picture);
		}
		$new_data->delete();
		return redirect(route('page.index'));
    }
}
