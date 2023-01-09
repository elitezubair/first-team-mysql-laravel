<?php

namespace Rifrocket\LaravelCmsV2\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Rifrocket\LaravelCmsV2\Models\LbsUpload;
use App\Http\Controllers\Controller;
use Rifrocket\LaravelCmsV2\Models\LbsAdmin;

class MediaController extends Controller
{

    public function __construct(){

        $this->middleware('auth:admin');
    }

    //List Media File
    public function index(Request $request){

        $viewType='media-list';
        return view('LbsViews::backend.uploads.lbs-uploads', compact('viewType'));
    }

    //Media Create Page
    public function create(){
        $viewType='media-create';
        return view('LbsViews::backend.uploads.lbs-uploads', compact('viewType'));
    }


    //Upload Media File
    public function upload(Request $request){
       return LbsMediaUpload($request,'public');
    }

    public function getStorageMedia(Request $request)
    {
        $media=base64_decode($request->media);
        $upload =LbsUpload::find($media);
        $json = auth()->user()->getTable().'|'.auth()->user()->id;
        if ($upload  and $upload->file_path) {
            if (!str_contains($upload->user_set, $json )) {
                abort(403);
            }
            return Storage::disk('storage')->download($upload->file_path);
        }
        abort(403);
    }

    public function test(Request $request)
    {
        dd($request->all());
    }

}
