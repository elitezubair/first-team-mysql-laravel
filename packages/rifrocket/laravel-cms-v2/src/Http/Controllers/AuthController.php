<?php

namespace Rifrocket\LaravelCmsV2\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rifrocket\LaravelCmsV2\Models\LbsAdmin;
use Rifrocket\LaravelCmsV2\Models\LbsMember;

class AuthController extends Controller{

    public function __construct(){
        $this->middleware('auth_redirect:admin', ['only' => 'showLoginForm']);
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function showLoginForm(){
        $viewType='show-login';
        return view('LbsViews::auth.authorization', compact('viewType'));
    }

    public function forgetPassword(){
        $viewType='show-forget-password';
        return view('LbsViews::auth.authorization', compact('viewType'));
    }

    public function resetPassword(){
        $viewType='reset-password';
        return view('LbsViews::auth.authorization', compact('viewType'));
    }

    public function logout(Request $request){
        $provider=$request->guard;
        if ($provider== 'admin') {
           return  LbsAdmin::lsbLogout($request->guard,$request->redirect);
        }
        if ($provider== 'web') {
           return  LbsMember::lsbLogout($request->guard,$request->redirect);
        }
        return false;
    }



}
