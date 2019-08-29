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
        $categories = Category::with('subCategory')->get();
        $sub_categories= SubCategory::paginate(10);
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
        $sub_categories = SubCategory::whereHas('category', function($query) use ($search){
            $query->Where('subcategory_name', 'like', '%' . $search . '%');
       })->paginate(10);
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
        date_default_timezone_set('asia/phnom_penh');
        $data_sub_category = array(
            'subcategory_name' => $sub_category,
            'category_id' => $category_id,
            'created_at'=>date("YmdHis"),
        );
        DB::table('subcategories')->insert($data_sub_category);
        return redirect(route('admin.category.sub-category'));
    }

    public function destroy(Request $request) {
        $sub_id = $request->post('delete_sub_id');
        DB::delete('delete from subcategories where id = ?',[$sub_id]);
        return redirect(route('admin.category.sub-category'));
    }

    public function edit(Request $request) {

        $sub_category_id = $request->post('sub_category_id');
        $sub_category_name = $request->post('sub_category_name');
        date_default_timezone_set('asia/phnom_penh');
        SubCategory::where('id', $sub_category_id)->update([
            'subcategory_name'=>$sub_category_name,       
            'updated_at'=>date("YmdHis"),
        ]);
        return redirect(route('admin.category.sub-category'));
     }
}
