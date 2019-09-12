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
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request,[
            'image' => 'image|mimetypes:image/jpg,image/jpeg,image/png|max:2048',
            'name' => 'required|unique:ads',    
        ]);
        // return "yes";
        $ads = new Ads;
        // store and resize image to folder uploads/ads_image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(960, 700)->save( public_path('uploads\ads_image\\' . $filename ) );
            Image::make($image)->save( public_path('uploads\ads_image\\' . $filename ) );
            $ads->image = $filename;
            // $ads->save();
        };
        $ads->name = $request->input('name');
        $ads->save();
        Alert::success('Ads Creation', 'Successfully Created');
        return redirect()->route('ads.index');
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
        $ad = Ads::find($id);
        return view('admin.ads.edit',compact('ad'));
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
        $ad = Ads::findOrFail($id);
        $this-> validate($request,[
            'imgDB' => '',
            'image' => 'max:2048',
            'name' => 'required|unique:ads,name,'.$ad->id,
            'page' => '',
        ]);
        $page = $request->input('page');
        if($request->hasFile('image')){
            // upload a new file
            $image = $request->file('image');
            $image_old = $request->input('imgDB');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(960, 700)->save( public_path('uploads\ads_image\\' . $filename ) );
            File::delete(public_path('uploads\ads_image\\' . $image_old));
            $ad->image = $filename;
            // $ads->save();
        }
        else {
            // existing image file
            $ad->image = $request->input('imgDB');
        };
        $ad->name = $request->input('name');
        $ad->save();
        // return redirect('/admin/ads')->withStatus(__('Ads successfully created.'));
        Alert::success('Ads Update', 'Successfully Updated');
        return redirect('admin/ads?page='.$page);
        // return redirect()->route('ads.index')->withStatus(__('Ads successfully updated.'));
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
        $image_path = $ads->image;
        File::delete(public_path('uploads\ads_image\\' . $image_path));
        $ads->delete();
        return redirect()->route('ads.index');
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
        
        // Alert::success('Product Creation', 'Successfully Created');
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
        // Alert::success('Product Creation', 'Successfully Created');
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
        // Alert::success('Product Creation', 'Successfully Created');
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
        // Alert::success('Product Creation', 'Successfully Created');
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
        // Alert::success('Product Creation', 'Successfully Created');
        // return redirect()->route('ads.index');
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }

}
