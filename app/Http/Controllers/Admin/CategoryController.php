<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {   
        $categories = Category::query()->paginate(10);
        $data = [
            'categories_data'=>$categories,
            'queryParams' => [],
        ];
        return view('admin.category.index')->with($data);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = DB::table('categories')->where('categories_name', 'like', '%' .$search. '%')->paginate(10);
        $data = [
            'categories_data'=>$categories,
            'queryParams' => [],
        ];
        return view('admin.category.index')->with($data);
    }

    public function create(Request $request)
    {
        $category = $request->post('category');
        $data_category = array(
            'categories_name' => $category,
        );
        DB::table('categories')->insert($data_category);
        return redirect(route('admin.category'));
    }

    public function destroy($id) {
        DB::delete('delete from categories where id = ?',[$id]);
        return redirect(route('admin.category'));
    }

    public function edit(Request $request) {

        $category_id = $request->post('category_id');
        $category_name = $request->post('category_name');

        Category::where('id', $category_id)->update([
            'categories_name'=>$category_name,       
        ]);
        return redirect(route('admin.category'));
     }
}
