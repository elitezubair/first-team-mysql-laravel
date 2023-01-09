<?php

namespace Rifrocket\LaravelCmsV2\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Rifrocket\LaravelCmsV2\Models\LbsAppSetting;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function app_settings(){
        $viewType='system-settings';
        $settings = LbsAppSetting::AppSetting(); //dd($settings);
        return  view('LbsViews::backend.settings.admin-app-settings', compact('viewType','settings'));
    }

    public function app_settings_update(Request $request)
    {
        $insertAbles=$request->all();
        Arr::pull($insertAbles,'_token');
        return   LbsAppSetting::createOrUpdateEnv($insertAbles);
    }


    public function app_css_settings(){
        $viewType='system-css-settings';
        $front_css_path=public_path('vendor/laravel-cms-v2/admin_assets/dist/css/frontend-custom.css');
        $back_css_path=public_path('vendor/laravel-cms-v2/admin_assets/dist/css/backend-custom.css');
        $frontendCss=file_get_contents($front_css_path); //dd($frontendCss);
        $backendCss=file_get_contents($back_css_path); //dd($backendCss);
        return  view('LbsViews::backend.settings.admin-app-settings', compact('viewType','frontendCss','backendCss'));
    }

    public function app_css_settings_update(Request $request)
    {
        $front_css_path=public_path('vendor/laravel-cms-v2/admin_assets/dist/css/frontend-custom.css');
        $back_css_path=public_path('vendor/laravel-cms-v2/admin_assets/dist/css/backend-custom.css');
        try {
            if ($request->has('backend_css_editor')) {
                file_put_contents($back_css_path,$request->backend_css_editor);
            }
            if ($request->has('frontend_css_editor')) {
                file_put_contents($front_css_path,$request->frontend_css_editor);
            }
            return ['success','css updated successfully!'];
        } catch (\Throwable $th) {

            return ['error',$th->getMessage()];
        }
    }

}
