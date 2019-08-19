<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Validator;

class SubCategoryController extends Controller
{
    public function index()
    {   
       // $sub_categories = SubCategory::query()->paginate(10);
        $categories = Category::with('subCategory')->get();
        $sub_categories= SubCategory::leftJoin('categories','categories.cid','=','subcategories.category_id')->paginate(10);
        $data = [
            'sub_categories_data'=>$sub_categories,
            'categories_data'=>$categories,
            'queryParams' => [],
        ];
        return view('admin.category.sub-category.index')->with($data);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $sub_categories = SubCategory::leftJoin('categories','categories.cid','=','subcategories.category_id')->where('subcategory_name', 'like', '%' .$search. '%')->paginate(10);
        $categories = Category::with('subCategory')->get();
        $data = [
            'sub_categories_data'=>$sub_categories,
            'categories_data'=>$categories,
            'queryParams' => [],
        ];
        return view('admin.category.sub-category.index')->with($data);
    }

    public function create(Request $request)
    {
        $sub_category = $request->post('sub_category');
        $category_id = $request->post('category_id');
        
        $data_sub_category = array(
            'subcategory_name' => $sub_category,
            'category_id' => $category_id,
        );
        DB::table('subcategories')->insert($data_sub_category);
        return redirect(route('admin.category.sub-category'));
    }

    public function destroy($sid) {
        DB::delete('delete from subcategories where sid = ?',[$sid]);
        return redirect(route('admin.category.sub-category'));
    }

    public function edit(Request $request) {

        $sub_category_id = $request->post('sub_category_id');
        $sub_category_name = $request->post('sub_category_name');

        SubCategory::where('sid', $sub_category_id)->update([
            'subcategory_name'=>$sub_category_name,       
        ]);
        return redirect(route('admin.category.sub-category'));
     }
}
