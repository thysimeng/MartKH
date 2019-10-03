<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customize;
use Cookie;
use Alert;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.index');
    }

    public function godark(){
        if(isset($_GET['dark'])){
            $dark = $_GET['dark'];
        }
        // $cookie = Cookie::queue(Cookie::make('godark', 1));
        $sidebar = Customize::where('name','sidebar')->first();
        $sidebar->data = $dark;
        $sidebar->save();
        return json_encode($sidebar);
        // return response('sucess')->cookie($cookie);
    }

    public function basicColor(Request $request){
        $this-> validate($request,[
            //decimal with 2 digits floating point
            'basicColor' => ['required','regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ]);
        $basicColor = Customize::where('name','basicColor')->first();
        $basicColor->data = '#'.$request->basicColor;
        $basicColor->save();
        Alert::success('Header Color', 'Successfully Applied');
        return redirect()->route('settings.index');
    }

}
