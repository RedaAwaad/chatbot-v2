<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Keyword;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $setting = Setting::where('user_id',Auth::user()->id)->first();
        if (!$setting){
            $setting = Setting::find(1);
        }
        $keywords_string = "";
        return view('backend.settings.index', compact('setting', 'keywords_string'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @param int $id , settingReguest  $request
     * @return Response
     */
    public function update(SettingRequest $request, $id)
    {
        if ($request->faq == "on"){
            $request->faq = 1;
        }else{
            $request->faq = 0;
        }
        $setting = Setting::where('user_id',Auth::user()->id)->first();
        if ($setting){
            if ($request->file('logo')) {

                $imageName = time().'.'.request()->logo->getClientOriginalExtension();
                $path = '/upload/logo/'.$imageName;
                request()->logo->move(base_path('upload/logo'), $imageName);
                if(\File::exists($setting->logo)) {
                    unlink($setting->logo);
                }

            }else {
                $path = $request->oldlogo;
            }
            if ($request->file('icon')) {
                $imageName = time().'.'.request()->icon->getClientOriginalExtension();
                $path2 = '/upload/icon/'.$imageName;
                request()->icon->move(base_path('upload/icon'), $imageName);
                if(\File::exists($setting->icon)) {
                    unlink($setting->icon);
                }
            }else {
                $path2 = $request->oldicon;
            }
            if ($request->file('picture')) {
                $imageName = time().'.'.request()->picture->getClientOriginalExtension();
                $path3 =  '/upload/picture/'.$imageName;
                request()->picture->move(base_path('upload/picture'), $imageName);
                if(\File::exists($setting->picture)) {
                    unlink($setting->picture);
                }
            }else {
                $path3 = $request->oldpicture;
            }
            $setting->update([
                'website_name' => $request->website_name,
                'description' => $request->description,
                'dashboard_url' => $request->dashboard_url,
                'email' => $request->email,
                'big_circle' =>$request->big_circle,
                'small_circle' =>$request->small_circle,
                'start_chatuser_id' =>$request->start_chatuser_id,
                'user_id' =>Auth::user()->id,
                'text2' =>$request->text2,
                'text3' =>$request->text3,
                'tw' =>$request->tw,
                'ln' =>$request->ln,
                'fb' =>$request->fb,
                'phone' =>$request->phone,
                'logo' => $path,
                'icon' => $path2,
                'picture' => $path3,
                'faq' => $request->faq,

            ]);
        }else{
            if ($request->file('logo')) {

                $imageName = time().'.'.request()->logo->getClientOriginalExtension();
                $path = '/upload/logo/'.$imageName;
                request()->logo->move(base_path('upload/logo'), $imageName);
                if(\File::exists($setting->logo)) {
                    unlink($setting->logo);
                }

            }else {
                $path = $request->oldlogo;
            }
            if ($request->file('icon')) {
                $imageName = time().'.'.request()->icon->getClientOriginalExtension();
                $path2 = '/upload/icon/'.$imageName;
                request()->icon->move(base_path('upload/icon'), $imageName);
                if(\File::exists($setting->icon)) {
                    unlink($setting->icon);
                }
            }else {
                $path2 = $request->oldicon;
            }
            if ($request->file('picture')) {
                $imageName = time().'.'.request()->picture->getClientOriginalExtension();
                $path3 =  '/upload/picture/'.$imageName;
                request()->picture->move(base_path('upload/picture'), $imageName);
                if(\File::exists($setting->picture)) {
                    unlink($setting->picture);
                }
            }else {
                $path3 = $request->oldpicture;
            }
            Setting::create([
                'website_name' => $request->website_name,
                'description' => $request->description,
                'dashboard_url' => $request->dashboard_url,
                'email' => $request->email,
                'big_circle' =>$request->big_circle,
                'small_circle' =>$request->small_circle,
                'start_chatuser_id' =>$request->start_chatuser_id,
                'user_id' =>Auth::user()->id,
                'text2' =>$request->text2,
                'text3' =>$request->text3,
                'tw' =>$request->tw,
                'ln' =>$request->ln,
                'fb' =>$request->fb,
                'phone' =>$request->phone,
                'logo' => $path,
                'icon' => $path2,
                'picture' => $path3,
                'faq' => $request->faq,

            ]);
        }
        $notification = array(
            'message' => __('backend/notify.update_setting_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.update_setting'),
        );
        return redirect()->back();
    }
}
