<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\SubCategory;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Slide::all();
        return view('admin.slide.indexSlide',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        return view('admin.slide.createSlide',compact('subcategories'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required|unique:products',
            'name' => 'required|unique:products',
            'price' => 'required',
            'size' => 'required',
            'brand' => 'required',
            'country' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required'
        ]);
        $products = new Slide;
        // store and resize image to folder uploads/product_image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(600, 600)->save( public_path('uploads\slide_image\\' . $filename ) );
            $products->image = $filename;
            // $products->save();
        };
        $products->code = $request->input('code');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->size = $request->input('size');
        $products->brand = $request->input('brand');
        $products->country = $request->input('country');
        $products->subcategory_id = $request->input('subcategory_id');
        $products->view = 2;
        $products->save();
        Alert::success('Product Creation', 'Successfully Created');
        // return redirect()->route('products.index')->withStatus(__('Product successfully created.'));
        return redirect('/admin/slide');
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
        $product = Slide::find($id);
        return view('admin.slide.edit',compact('product'));
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
        $products = Slide::findOrFail($id);
        $this-> validate($request,[
            'imgDB' => '',
            'image' => 'max:2048',
            'code' => 'required|unique:products,code,'.$products->id,
            'name' => 'required|unique:products,name,'.$products->id,
            'price' => 'required',
            'size' => 'required',
            'brand' => 'required',
            'country' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required'
        ]);
        //return $this;
        // $products = Products::find($id);

        if($request->hasFile('image')){
            // upload a new file
            $image = $request->file('image');
            $image_old = $request->input('imgDB');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(600, 600)->save( public_path('uploads\slide_image\\' . $filename ) );
            File::delete(public_path('uploads\slide_image\\' . $image_old));
            $products->image = $filename;
            // $products->save();
        }
        else {
            // existing image file
            $products->image = $request->input('imgDB');
        };
        $products->code = $request->input('code');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->size = $request->input('size');
        $products->brand = $request->input('brand');
        $products->country = $request->input('country');
        $products->subcategory_id = $request->input('subcategory_id');
        // return $products;
        $products->save();
        // return redirect('/admin/products')->withStatus(__('Product successfully created.'));
        Alert::success('Product Update', 'Successfully Updated');
        return redirect()->route('slide.index');
        // return redirect()->route('products.index')->withStatus(__('Product successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Slide::findOrFail($id);
        $image_path = $product->image;
        File::delete(public_path('uploads\slide_image\\' . $image_path));
        $product->delete();
        return redirect()->route('slide.index');
    }
}
