<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Arr;


use Illuminate\Http\Request;

class SettingController extends Controller
{
       public function createSetting(){
        $data['pageTitle'] = 'App Setting';
        $data['settingShowClass'] = 'show';
        $data['settingActiveClass'] = 'active';
        return view('setting.app-setting')->with($data);
    }
       public function updateSetting(Request $request){
        $data['pageTitle'] = 'App Setting';
        $data['settingShowClass'] = 'show';
        $data['settingActiveClass'] = 'active';


        // dd($request->all());
        
        $inpute = Arr::except($request->all(), ['_token']);
        // dd($inpute);
        foreach ($inpute as $key => $value) {
            // $option = Setting::firstOrCreate(["option_key" => $key]);
            $option = Setting::firstOrCreate(["option_key" => $key], ["option_value" => " "]); // Default value to prevent SQL error

            if ($request->hasFile('home_banner') && $key == 'home_banner') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->home_banner, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('contact_banner') && $key == 'contact_banner') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->contact_banner, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('footer_logo') && $key == 'footer_logo') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->footer_logo, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('header_logo') && $key == 'header_logo') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->header_logo, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('team_banner_large') && $key == 'team_banner_large') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->team_banner_large, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('team_banner_small') && $key == 'team_banner_small') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->team_banner_small, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('ceo_image') && $key == 'ceo_image') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->ceo_image, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('home_og_image') && $key == 'home_og_image') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->home_og_image, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('home_twitter_image') && $key == 'home_twitter_image') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->home_twitter_image, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('fav_icon') && $key == 'fav_icon') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->fav_icon, $oldFile);
                $option->option_value = $upload;
            }else {
                $option->option_value = is_null($value) ? '' : $value;
            }
            $option->save();
        }

        return redirect()->back()->with('success', CoreConstant::UPDATED_SUCCESSFULLY);
    }
}
