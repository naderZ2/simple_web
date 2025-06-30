<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\back\Brand;
use Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$title = " الماركات";
		$view_title = "عرض  الماركات";
		$dpage_id = 15;
		$result = Brand::orderBy('id','desc')->get();
		return view('back.brand.index',compact('result','title','view_title','dpage_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$title = " الماركات";
		$view_title = "اضافة ماركة";
		$dpage_id = 15;
		return view('back.brand.add',compact('title','view_title','dpage_id'));
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
		
		$new_data = new Brand;
		$new_data->name = $request->page_name;
		$new_data->name2 = $request->page_name2;
		$new_data->price_type = $request->page_price;
		$new_data->link = $request->page_link;
		$new_data->details = $request->page_details;
		$new_data->picture = $img_name;
		$new_data->save();
		return redirect(route('brand.index'));
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
		$title = " الماركات";
		$view_title = "تعديل ماركة";
		$dpage_id = 15;
        $result_page = Brand::where('id',$id)->first();
		return view('back.brand.edit',compact('result_page','title','view_title','dpage_id'));
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
		
		$new_data = Brand::find($id);

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
    $new_data->name2 = $request->page_name2;
		$new_data->price_type = $request->page_price;
		$new_data->link = $request->page_link;
		$new_data->details = $request->page_details;
		$new_data->picture = $img_name;
		$new_data->save();
		return redirect(route('brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new_data = Brand::find($id);
		if($new_data->picture != ""){
			$folder_path = public_path('/uploads');
			@unlink($folder_path.'/'.$new_data->picture);
		}
		$new_data->delete();
		return redirect(route('brand.index'));
    }
}
