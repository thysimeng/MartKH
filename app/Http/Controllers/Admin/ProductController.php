<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // return helloworld;
        $this-> validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required' ,
            'name' => 'required',
            'price' => 'required',
            'size' => 'required',
            'brand' => 'required',
            'country' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        // return $this;
        // $image =  $request->file('image');
        // $img_name = rand() . '.' . $image->getClientOriginalExtension();
        // $products->image->move(public_path('uploads.product_image'),$img_name);
        // return $img_name;
        $products = new Products;
        // $products->image = $request->file('image');
        // new img name

        // $products->image = $request->file('image');
        // $imgName = $file->getClientOriginalName();
        // $imagePath = '/public/uploads/product_image';
        // $file->move(public_path($imagePath), $picName);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(600, 600)->save( public_path('uploads\product_image\\' . $filename ) );
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
        $products->category_id = $request->input('category_id');
        $products->save();
        // return redirect('/admin/products')->withStatus(__('Product successfully created.'));
        return redirect()->route('products.index')->withStatus(__('Product successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('products.show',compact('product'));
        // return Products::find($id);
        // $sd = DB::table('products')->where('pid', '=', $societyid);
        // return view('admin.modalview', ['sd' => $sd])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product = Products::where('pid',$id)->get()->first();
        $product = Products::find($id);
        return view('admin.products.edit',compact('product'));
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
        $this-> validate($request,[
            'image' => 'required',
            'code' => 'required' ,
            'name' => 'required',
            'price' => 'required',
            'size' => 'required',
            'brand' => 'required',
            'country' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        //return $this;
        $products = Products::find($id);
        $products->image = $request->input('image');
        $products->code = $request->input('code');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->size = $request->input('size');
        $products->brand = $request->input('brand');
        $products->country = $request->input('country');
        $products->category_id = $request->input('category_id');
        // return $products;
        $products->save();
        // return redirect('/admin/products')->withStatus(__('Product successfully created.'));
        return redirect()->route('products.index')->withStatus(__('Product successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
  
        return redirect()->route('products.index')->withStatus(__('Product successfully deleted.'));
    }
}
