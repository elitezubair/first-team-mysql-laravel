<?php

namespace Rifrocket\LaravelCmsV2\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function dashboard(){

        // $strength=[1,3,1,2,5];
        // $count = count($strength);
        // $stg=0;
        // $ans=0;
        // for ($i=1; $i < $count ; $i++) {
        //     for ($j=0; $j < ; $j++) {
        //         # code...
        //     }
        // }
        return view('LbsViews::backend.dashboards.admin-dashboard');
    }


}
