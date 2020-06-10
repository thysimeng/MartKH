<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customize;
use Cookie;
use Alert;
use Image;
use File;
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
        $sidebar = Customize::where('name','sidebar')->first();
        $sidebar->data = $dark;
        $sidebar->save();
        return json_encode($sidebar);
    }

    public function basicColor(Request $request){
        $this-> validate($request,[
            //decimal with 2 digits floating point
            'basicColor' => ['required','regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ]);
        $basicColor = Customize::where('name','basicColor')->first();
        $basicColor->data = '#'.$request->basicColor;
        $basicColor->save();
        $gradientColor = Customize::where('name','gradientColor')->first();
        $gradientColor->data = NULL;
        // dd($gradientColor->data);
        $gradientColor->save();
        Alert::success('Basic Color', 'Successfully Applied');
        return redirect()->route('settings.index');
    }

    public function logo(Request $request){
        $this-> validate($request,[
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $logo = Customize::where('name','logo')->first();
        $oldLogo = $logo->data;
        File::delete(public_path('uploads\logo\\' . $oldLogo));
        // store uploads/logo
        if($request->hasFile('logo')){
            $logoFile = $request->file('logo');
            $filename = time() . '.' . $logoFile->getClientOriginalExtension();
            Image::make($logoFile)->save( public_path('uploads\logo\\' . $filename));
            $logo->data = $filename;
        };
        // dd($logo->data);
        $logo->save();
        Alert::success('Logo Upload', 'Successfully Uploaded');
        return redirect()->route('settings.index');
    }

    public function gradientColor(Request $request){
        $this-> validate($request,[
            //decimal with 2 digits floating point
            'gradientColor1' => ['required','regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'percent1' => 'required|digits_between:1,3',
            'percent2' => 'required|digits_between:1,3',
            'gradientColor2' => ['required','regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'direction' => 'required'
        ]);
        $gradientColor = Customize::where('name','gradientColor')->first();
        $gc1 = $request->gradientColor1;
        $gc2 = $request->gradientColor2;
        $direction = $request->direction;
        $p1 = $request->percent1;
        $p2 = $request->percent2;
        if(strlen($gc1)==3){
            $gc1 = $gc1[0] . $gc1[0] . $gc1[1] . $gc1[1] . $gc1[2] . $gc1[2];
        }
        if(strlen($gc2)==3){
            $gc2 = $gc2[0] . $gc2[0] . $gc2[1] . $gc2[1] . $gc2[2] . $gc2[2];
        }
        // dd($gc1);
        $gradientColor->data = 'linear-gradient('.$direction.', #'.$gc1.' '.$p1.'%,#'.$gc2.' '.$p2.'%)';
        // dd($gradientColor->data);
        $gradientColor->save();
        $basicColor = Customize::where('name','basicColor')->first();
        $basicColor->data = NULL;
        $basicColor->save();
        Alert::success('Gradient Color', 'Successfully Applied');
        return redirect()->route('settings.index');
    }

}
