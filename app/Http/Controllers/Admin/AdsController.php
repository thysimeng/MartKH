<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ads;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;
use DB;
class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ads = Ads::all()->sortByDesc("id");
        // $ads = Ads::latest('id')->get();
        $adsMiddle1 = DB::table('ads')
                ->where([
                    ['template_id', '=', '1'],
                    ['position', '=', 'middle1'],
                ])
                    ->get();
        $adsLeft1 = DB::table('ads')
                ->where([
                    ['template_id', '=', '1'],
                    ['position', '=', 'left1'],
                ])
                    ->get();
        $adsTopRight1 = DB::table('ads')
                ->where([
                    ['template_id', '=', '1'],
                    ['position', '=', 'topRight1'],
                ])
                ->get();
        $adsBottomRight1 = DB::table('ads')
                ->where([
                    ['template_id', '=', '1'],
                    ['position', '=', 'bottomRight1'],
                ])
                    ->get();
        
        $adsLeft2 = DB::table('ads')
                ->where([
                    ['template_id', '=', '2'],
                    ['position', '=', 'left2'],
                ])
                    ->get();
        $adsTopRight2 = DB::table('ads')
                ->where([
                    ['template_id', '=', '2'],
                    ['position', '=', 'topRight2'],
                ])
                ->get();
        $adsBottomRight2 = DB::table('ads')
                ->where([
                    ['template_id', '=', '2'],
                    ['position', '=', 'bottomRight2'],
                ])
                    ->get();
        $adsMiddle3 = DB::table('ads')
        ->where([
            ['template_id', '=', '3'],
            ['position', '=', 'middle3'],
        ])
            ->get();
        
        return view('admin.ads.index',compact('adsLeft1','adsMiddle1','adsTopRight1','adsBottomRight1','adsLeft2','adsTopRight2','adsBottomRight2','adsMiddle3'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ads::findOrFail($id);
        $image_name = $ads->image;
        if($ads->position === 'left1'){
            File::delete(public_path('uploads\ads_image\template1\adsLeft\\' . $image_name));
        }
        elseif($ads->position === 'middle1'){
            File::delete(public_path('uploads\ads_image\template1\adsMiddle\\' . $image_name));            
        }
        elseif($ads->position === 'topRight1'){
            File::delete(public_path('uploads\ads_image\template1\adsTopRight\\' . $image_name));
        }
        elseif($ads->position === 'bottomRight1'){
            File::delete(public_path('uploads\ads_image\template1\adsBottomRight\\' . $image_name));
        }
        elseif($ads->position === 'left2'){
            File::delete(public_path('uploads\ads_image\template2\adsLeft\\' . $image_name));
        }
        elseif($ads->position === 'topRight2'){
            File::delete(public_path('uploads\ads_image\template2\adsTopRight\\' . $image_name));
        }
        elseif($ads->position === 'bottomRight2'){
            File::delete(public_path('uploads\ads_image\template2\adsBottomRight\\' . $image_name));            
        }
        elseif($ads->position === 'middle3'){
            File::delete(public_path('uploads\ads_image\template3\adsMiddle\\' . $image_name));            
        }
        $ads->delete();
        // return redirect()->route('ads.index');
        Alert::success('Delete Ads', 'Successfully Deleted Ads');
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function adsLeftUpload1(Request $request){
        // $ads = Ads::all();
        request()->validate([
            'adsLeft1' => 'required',
            'adsLeft1.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->hasFile('adsLeft1')){
            foreach($request->file('adsLeft1') as $image)
            {
                $adsDB = new Ads();
                // $name = time() . '.' . $image->getClientOriginalExtension(); 
                $name = time().'.'.$image->getClientOriginalName();      
                // $image->move(public_path('uploads\Test\\'), $name);  
                $imageCrop = Image::make($image)->resize(480, 700)->save( public_path('uploads\ads_image\template1\adsLeft\\' . $name ) );
                $data = $name;
                // $adsDB->image=json_encode($data);
                $adsDB->image=$data;
                $adsDB->position= "left1";
                $adsDB->template_id = 1;
                // dd($adsDB);
                $adsDB->save(); 
            }
        }
        Alert::success('Ads Uploading Status', 'Successfully Uploaded');
        // return redirect()->route('ads.index');
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }

    public function adsMiddleUpload1(Request $request){
        // $ads = Ads::all();
        request()->validate([
            'adsMiddle1' => 'required',
            'adsMiddle1.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->hasFile('adsMiddle1')){
            foreach($request->file('adsMiddle1') as $image)
            {
                $adsDB = new Ads();
                // $name = time() . '.' . $image->getClientOriginalExtension(); 
                $name = time().'.'.$image->getClientOriginalName();      
                // $image->move(public_path('uploads\Test\\'), $name);  
                $imageCrop = Image::make($image)->resize(960, 700)->save( public_path('uploads\ads_image\template1\adsMiddle\\' . $name ) );
                $data = $name;
                // $adsDB->image=json_encode($data);
                $adsDB->image=$data;
                $adsDB->position= "middle1";
                $adsDB->template_id = 1;   
                // dd($adsDB);           
                $adsDB->save(); 
            }
        }
        Alert::success('Ads Uploading Status', 'Successfully Uploaded');
        // return redirect()->route('ads.index');
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }

    public function adsTopRightUpload1(Request $request){
        // $ads = Ads::all();
        request()->validate([
            'adsTopRight1' => 'required',
            'adsTopRight1.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->hasFile('adsTopRight1')){
            foreach($request->file('adsTopRight1') as $image)
            {
                $adsDB = new Ads();
                // $name = time() . '.' . $image->getClientOriginalExtension(); 
                $name = time().'.'.$image->getClientOriginalName();      
                // $image->move(public_path('uploads\Test\\'), $name);  
                $imageCrop = Image::make($image)->resize(480, 350)->save( public_path('uploads\ads_image\template1\adsTopRight\\' . $name ) );
                $data = $name;
                // $adsDB->image=json_encode($data);
                $adsDB->image=$data;
                $adsDB->position= "topRight1";
                $adsDB->template_id = 1;   
                // dd($adsDB);           
                $adsDB->save(); 
            }
        }
        Alert::success('Ads Uploading Status', 'Successfully Uploaded');
        // return redirect()->route('ads.index');
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }

    public function adsBottomRightUpload1(Request $request){
        // $ads = Ads::all();
        request()->validate([
            'adsBottomRight1' => 'required',
            'adsBottomRight1.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->hasFile('adsBottomRight1')){
            foreach($request->file('adsBottomRight1') as $image)
            {
                $adsDB = new Ads();
                // $name = time() . '.' . $image->getClientOriginalExtension(); 
                $name = time().'.'.$image->getClientOriginalName();      
                // $image->move(public_path('uploads\Test\\'), $name);  
                $imageCrop = Image::make($image)->resize(480, 350)->save( public_path('uploads\ads_image\template1\adsBottomRight\\' . $name ) );
                $data = $name;
                // $adsDB->image=json_encode($data);
                $adsDB->image=$data;
                $adsDB->position= "bottomRight1";
                $adsDB->template_id = 1;   
                // dd($adsDB);           
                $adsDB->save(); 
            }
        }
        Alert::success('Ads Uploading Status', 'Successfully Uploaded');
        // return redirect()->route('ads.index');
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }

    public function adsLeftUpload2(Request $request){
        // $ads = Ads::all();
        request()->validate([
            'adsLeft2' => 'required',
            'adsLeft2.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->hasFile('adsLeft2')){
            foreach($request->file('adsLeft2') as $image)
            {
                $adsDB = new Ads();
                // $name = time() . '.' . $image->getClientOriginalExtension(); 
                $name = time().'.'.$image->getClientOriginalName();      
                // $image->move(public_path('uploads\Test\\'), $name);  
                $imageCrop = Image::make($image)->resize(1280, 960)->save( public_path('uploads\ads_image\template2\adsLeft\\' . $name ) );
                $data = $name;
                // $adsDB->image=json_encode($data);
                $adsDB->image=$data;
                $adsDB->position= "left2";
                $adsDB->template_id = 2;
                // dd($adsDB);
                $adsDB->save(); 
            }
        }
        Alert::success('Ads Uploading Status', 'Successfully Uploaded');    
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }

    public function adsTopRightUpload2(Request $request){
        // $ads = Ads::all();
        request()->validate([
            'adsTopRight2' => 'required',
            'adsTopRight2.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->hasFile('adsTopRight2')){
            foreach($request->file('adsTopRight2') as $image)
            {
                $adsDB = new Ads();
                // $name = time() . '.' . $image->getClientOriginalExtension(); 
                $name = time().'.'.$image->getClientOriginalName();      
                // $image->move(public_path('uploads\Test\\'), $name);  
                $imageCrop = Image::make($image)->resize(640, 480)->save( public_path('uploads\ads_image\template2\adsTopRight\\' . $name ) );
                $data = $name;
                // $adsDB->image=json_encode($data);
                $adsDB->image=$data;
                $adsDB->position= "topRight2";
                $adsDB->template_id = 2;   
                // dd($adsDB);           
                $adsDB->save(); 
            }
        }
        Alert::success('Ads Uploading Status', 'Successfully Uploaded');
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }

    public function adsBottomRightUpload2(Request $request){
        // $ads = Ads::all();
        request()->validate([
            'adsBottomRight2' => 'required',
            'adsBottomRight2.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->hasFile('adsBottomRight2')){
            foreach($request->file('adsBottomRight2') as $image)
            {
                $adsDB = new Ads();
                // $name = time() . '.' . $image->getClientOriginalExtension(); 
                $name = time().'.'.$image->getClientOriginalName();      
                // $image->move(public_path('uploads\Test\\'), $name);  
                $imageCrop = Image::make($image)->resize(640, 480)->save( public_path('uploads\ads_image\template2\adsBottomRight\\' . $name ) );
                $data = $name;
                // $adsDB->image=json_encode($data);
                $adsDB->image=$data;
                $adsDB->position= "bottomRight2";
                $adsDB->template_id = 2;   
                // dd($adsDB);           
                $adsDB->save(); 
            }
        }
        Alert::success('Ads Uploading Status', 'Successfully Uploaded');
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }
    
    public function adsMiddleUpload3(Request $request){
        // $ads = Ads::all();
        request()->validate([
            'adsMiddle3' => 'required',
            'adsMiddle3.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->hasFile('adsMiddle3')){
            foreach($request->file('adsMiddle3') as $image)
            {
                $adsDB = new Ads();
                // $name = time() . '.' . $image->getClientOriginalExtension(); 
                $name = time().'.'.$image->getClientOriginalName();      
                // $image->move(public_path('uploads\Test\\'), $name);  
                $imageCrop = Image::make($image)->resize(1760, 760)->save( public_path('uploads\ads_image\template3\adsMiddle\\' . $name ) );
                $data = $name;
                // $adsDB->image=json_encode($data);
                $adsDB->image=$data;
                $adsDB->position= "middle3";
                $adsDB->template_id = 3;   
                // dd($adsDB);           
                $adsDB->save(); 
            }
        }
        Alert::success('Ads Uploading Status', 'Successfully Uploaded');
        // return redirect()->route('ads.index');
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }

}
