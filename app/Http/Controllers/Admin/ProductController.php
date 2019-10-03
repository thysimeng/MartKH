<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\Models\SubCategory;
use DB;
use Image;
use File;
use Cookie;
use RealRashid\SweetAlert\Facades\Alert;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $products = Products::where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('id','like','%'.$keyword.'%')
                        // ->orWhere('image','like','%'.$keyword.'%')
                            ->orWhere('code','like','%'.$keyword.'%')
                        // ->orWhere('description','like','%'.$keyword.'%')
                            ->orWhere('price','like','%'.$keyword.'%')
                            ->orWhere('size','like','%'.$keyword.'%')
                            ->orWhere('brand','like','%'.$keyword.'%')
                            ->orWhere('country','like','%'.$keyword.'%')
                            ->orWhere('subcategory_id','like','%'.$keyword.'%')
                            ->orWhere('view','like','%'.$keyword.'%')
                            // ->orWhere('created_at','like','%'.$keyword.'%')
                            // ->orWhere('updated_at','like','%'.$keyword.'%')
            ->paginate(3);
        $products->withPath('products');
        $products->appends($request->all());
        if ($request->ajax()) {
            return \Response::json(\View::make('list', array('products' => $products))->render());
        }
        return view('admin.products.index',compact('products', 'keyword'));
    }
    // public function index()
    // {
    //     $products = Products::all();
    //     return view('admin.products.index',compact('products'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        return view('admin.products.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Cookie::has('godark'));
        $this-> validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required|unique:products',
            'name' => 'required|unique:products',
            //decimal with 2 digits floating point
            'price' => ['required','regex:/^\d+(\.\d{1,2})?$/'],
            'size' => 'required',
            'brand' => 'required',
            'country' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required'
        ]);
        $products = new Products;
        // store and resize image to folder uploads/product_image
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
        $products->subcategory_id = $request->input('subcategory_id');
        $products->save();
        Alert::success('Product Creation', 'Successfully Created');
        // return redirect()->route('products.index')->withStatus(__('Product successfully created.'));
        return redirect()->route('products.index');
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
        $subcategories = SubCategory::all();
        // $page = url()->current();
        // return view('admin.products.edit',compact('product','subcategories','page'));
        return view('admin.products.edit',compact('product','subcategories'));
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
        // dd($request);
        $products = Products::findOrFail($id);
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
            'description' => 'required',
            'page' => '',
        ]);
        //return $this;
        // $products = Products::find($id);
        $page = $request->input('page');
        if($request->hasFile('image')){
            // upload a new file
            $image = $request->file('image');
            $image_old = $request->input('imgDB');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(600, 600)->save( public_path('uploads\product_image\\' . $filename ) );
            File::delete(public_path('uploads\product_image\\' . $image_old));
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
        return redirect('admin/products?page='.$page);
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
        $product = Products::findOrFail($id);
        $image_path = $product->image;
        File::delete(public_path('uploads\product_image\\' . $image_path));
        $product->delete();
        return redirect()->route('products.index');
        // return redirect()->route('products.index')->withStatus(__('Product successfully deleted.'));
    }
    // Filter product
    // public function filter()
    // {
    //     $product_list = Products::query();
    //     // $product_list->whereRaw("date(users.created_at) >= '" . $start_date . "' AND date(users.created_at) <= '" . $end_date . "'");
    //     $product_list->whereRaw("CONCAT(id,code,name,price,size,brand,country,created_at) like ");
    //     $products = $product_list->select('*');
    //     return datatables()->of($products)
    //         ->make(true);
    // }

    // function search(Request $request){
    //     if($request->ajax()){
    //         $query = $request->get('query');
    //         // if not search
    //         if($query != ''){
    //             $data = DB::table('products')
    //                     // ->where('id','like','%'.$query.'%')
    //                     // ->orWhere('image','like','%'.$query.'%')
    //                     ->orWhere('code','like','%'.$query.'%')
    //                     ->orWhere('name','like','%'.$query.'%')
    //                     // ->orWhere('description','like','%'.$query.'%')
    //                     // ->orWhere('price','like','%'.$query.'%')
    //                     // ->orWhere('size','like','%'.$query.'%')
    //                     // ->orWhere('brand','like','%'.$query.'%')
    //                     // ->orWhere('country','like','%'.$query.'%')
    //                     // ->orWhere('subcategory_id','like','%'.$query.'%')
    //                     // ->orWhere('view','like','%'.$query.'%')
    //                     // ->orWhere('created_at','like','%'.$query.'%')
    //                     // ->orWhere('updated_at','like','%'.$query.'%')
    //                     ->get();
    //         }
    //         // if type something in search box
    //         else{
    //             $data = DB::table('products')
    //                     ->orderBy('id','desc')
    //                     ->get();
    //         }
    //         $total_row = $data->count();
    //         if($total_row>0){
    //             foreach($data as $row){
    //                 $output .= '
    //                     <tr>
    //                         <td>'.$row->name.'</td>
    //                         <td>'.$row->code.'</td>
    //                     </tr>
    //                 ';
    //             }
    //         }
    //         else{
    //             $output = '
    //                 <tr>
    //                     <td>No Data Found</td>
    //                 </tr>
    //             ';
    //         }
    //         $data = array(
    //             'table_data' => $output,
    //             'total_data' => $total_data
    //         );
    //         echo json_encode($data);
    //     }
    // }

}
