<?php

namespace Rifrocket\LaravelCmsV2\Http\Controllers;

use App\Http\Controllers\Controller;

class ProfileController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function showProfile(){
        $viewType='show-profile';
        return view('LbsViews::backend.profile.backend-profile', compact('viewType'));
    }
}
