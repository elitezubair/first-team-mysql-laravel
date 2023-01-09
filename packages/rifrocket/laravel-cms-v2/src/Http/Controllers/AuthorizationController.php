<?php

namespace Rifrocket\LaravelCmsV2\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthorizationController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function list_role_permission(){
        $viewType='list-role-permission';
        return view('LbsViews::backend.authorization.authorization-manager', compact('viewType'));
    }
}
