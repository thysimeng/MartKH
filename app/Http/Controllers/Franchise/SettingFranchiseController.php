<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customize;
use Cookie;
use Alert;
use Image;
use File;
use App\Customize_Frans;

class SettingFranchiseController extends Controller
{
    public function index()
    {
        return view('franchise.setting');
    }

    public function godark(){
        if(isset($_GET['dark'])){
            $dark = $_GET['dark'];
        }
        $franUserSetting = Customize_Frans::where('user_id', '=', auth()->user()->id)->first();
        if ($franUserSetting == NULL)
        {
            $sidebar = Customize::where('name','sidebar')->first();
            $sidebar->data = $dark;
            $sidebar->save();

            $newFranCustomize = new Customize_Frans;
            $newFranCustomize->user_id = auth()->user()->id;
            $newFranCustomize->darkMode = $dark;
            $newFranCustomize->save();
        
            return json_encode($sidebar);
        }
        else
        {
            $sidebar = Customize_Frans::where('user_id', '=', auth()->user()->id)->first();
            $sidebar->darkMode = $dark;
            $sidebar->basicColor = '#ffc000';
            $sidebar->save();
            return json_encode($sidebar);
        }
        
    }

    public function basicColor(Request $request){
        $this-> validate($request,[
            //decimal with 2 digits floating point
            'basicColor' => ['required','regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ]);
        $franUserSetting = Customize_Frans::where('user_id', '=', auth()->user()->id)->first();
        if ($franUserSetting == NULL)
        {
            $cusFrans = new Customize_Frans;
            $cusFrans->user_id = auth()->user()->id;
            $cusFrans->basicColor = '#'.$request->basicColor;
            $cusFrans->gradientColor = NULL;
            $cusFrans->save();
        }
        else
        {
            $cusFrans = Customize_Frans::where('user_id', '=', auth()->user()->id)->first();
            $cusFrans->basicColor = '#'.$request->basicColor;
            $cusFrans->gradientColor = NULL;
            // dd($gradientColor->data);
            $gradientColor->save();
        }
        
        Alert::success('Basic Color', 'Successfully Applied');
        return redirect()->route('franchise.setting');
    }

    public function logo(Request $request){
        $this-> validate($request,[
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $franUserSetting = Customize_Frans::where('user_id', '=', auth()->user()->id)->first();
        if ($franUserSetting == NULL)
        {
            $cusFrans = new Customize_Frans;
            $cusFrans->user_id = auth()->user()->id;
            if ($cusFrans->logo != 'default.png')
            {
                $logo = public_path('uploads\logo\\' . $cusFrans->logo);
                    if(file_exists($logo))
                    {
                        File::delete($logo);
                    }
            }

            if($request->hasFile('logo')){
                $logoFile = $request->file('logo');
                $filename = time() . '.' . $logoFile->getClientOriginalExtension();
                Image::make($logoFile)->save( public_path('uploads\logo\\' . $filename));
                $cusFrans->logo = $filename;
            };
            $cusFrans->save();
        }
        else
        {
            $cusFrans = Customize_Frans::where('user_id', '=', auth()->user()->id)->first();
            if ($cusFrans->logo != 'default.png')
            {
                $logo = public_path('uploads\logo\\' . $cusFrans->logo);
                    if(file_exists($logo))
                    {
                        File::delete($logo);
                    }
            }

            if($request->hasFile('logo')){
                $logoFile = $request->file('logo');
                $filename = time() . '.' . $logoFile->getClientOriginalExtension();
                Image::make($logoFile)->save( public_path('uploads\logo\\' . $filename));
                $cusFrans->logo = $filename;
            };
            $cusFrans->save();
        }
        
        Alert::success('Logo Upload', 'Successfully Uploaded');
        return redirect()->route('franchise.setting');
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
        $franUserSetting = Customize_Frans::where('user_id', '=', auth()->user()->id)->first();
        
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
        if ($franUserSetting == NULL)
        {
            $cusFrans = new Customize_Frans;
            $cusFrans->user_id = auth()->user()->id;
            $cusFrans->gradientColor = 'linear-gradient('.$direction.', #'.$gc1.' '.$p1.'%,#'.$gc2.' '.$p2.'%)';
            $cusFrans->basicColor = NULL;
            $cusFrans->save();
        }
        else
        {
            $cusFrans = Customize_Frans::where('user_id', '=', auth()->user()->id)->first();
            $cusFrans->gradientColor = 'linear-gradient('.$direction.', #'.$gc1.' '.$p1.'%,#'.$gc2.' '.$p2.'%)';
            $cusFrans->basicColor = NULL;
            $cusFrans->save();
        }

        Alert::success('Gradient Color', 'Successfully Applied');
        return redirect()->route('franchise.setting');
    }
}
