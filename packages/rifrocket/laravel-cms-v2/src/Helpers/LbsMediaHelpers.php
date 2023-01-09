<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Rifrocket\LaravelCmsV2\Models\LbsUpload;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

if (!function_exists('lbsMediaSize')) {
    function lbsMediaSize(){
        $sizes = [];
        foreach (config('laravel-cms-v2.defaultImageSize') as $size){
            $sizes[] = $size[0].'x'.$size[1];
        }
        return $sizes;
    }
}


    //Upload Media File
if (!function_exists('lbsMediaUpload')) {
    function lbsMediaUpload(Request $request, $media_directory="public"){
        $type = array(
            "jpg"=>"image",
            "jpeg"=>"image",
            "png"=>"image",
            "svg"=>"image",
            "webp"=>"image",
            "gif"=>"image",
            "mp4"=>"video",
            "mpg"=>"video",
            "mpeg"=>"video",
            "webm"=>"video",
            "ogg"=>"video",
            "avi"=>"video",
            "mov"=>"video",
            "flv"=>"video",
            "swf"=>"video",
            "mkv"=>"video",
            "wmv"=>"video",
            "wma"=>"audio",
            "aac"=>"audio",
            "wav"=>"audio",
            "mp3"=>"audio",
            "zip"=>"archive",
            "rar"=>"archive",
            "7z"=>"archive",
            "doc"=>"document",
            "txt"=>"document",
            "docx"=>"document",
            "pdf"=>"pdf",
            "csv"=>"document",
            "xml"=>"document",
            "ods"=>"document",
            "xlr"=>"document",
            "xls"=>"document",
            "xlsx"=>"document",
            "sql"=>"document"
        );

        try {
            if($request->hasFile('lbs_file')){
                $upload = new LbsUpload;
                $extension = strtolower($request->file('lbs_file')->getClientOriginalExtension());

                if(isset($type[$extension])){
                    $upload->original_name = null;
                    $arr = explode('.', $request->file('lbs_file')->getClientOriginalName());
                    for($i=0; $i < count($arr)-1; $i++){
                        if($i == 0){
                            $upload->original_name .= $arr[$i];
                        }
                        else{
                            $upload->original_name .= ".".$arr[$i];
                        }
                    }
                    $path = $request->file('lbs_file')->store('/uploads/all', $media_directory);
                    $size = $request->file('lbs_file')->getSize();
                    $width = null;
                    $height = null;
                    if ($type[$extension]=='image') {
                        $image = getimagesize($request->file('lbs_file'));
                        $width = $image[1];
                        $height = $image[0];
                    }


                    //Save data to DB
                    $upload->user_id = Auth::user()->id;
                    $upload->provider = 'admin';
                    $upload->file_path = $path;
                    $upload->file_size = $size;
                    $upload->file_hight = $height;
                    $upload->file_width = $width;
                    $upload->file_type = $type[$extension];
                    $upload->file_extension = $extension;
                    $upload->directory = $media_directory;
                    $upload->save();
                    return ['success', 'media uploaded successfully'];
                }
                lbsUploadedAsset($upload, 'thumb');
                return '{}';
            }
        } catch (\Throwable $th) {
            return ['error', $th->getMessage()];
        }
    }
}


if (!function_exists('lbsUploadedAsset')) {
    function lbsUploadedAsset($asset=null, $size ="original", $provider='admin' ){


            if (is_int($asset)) {
                $asset = LbsUpload::find($asset);
            }
            if ($asset != null) {

            if ($size != "original" and $asset->file_type == "image") {
                $mediaSizes=config('laravel-cms-v2.defaultImageSize');
                if(isset($mediaSizes[$size])){
                    $image_hight=$mediaSizes[$size][0];
                    $image_width=$mediaSizes[$size][1];
                    if (($exsAsset = LbsUpload::where('file_id',$asset->id)->where('file_hight',$image_hight)->where('file_width',$image_width)->first()) != null) {
                        return lbsMediaUrlGenerator($exsAsset);
                    }
                    $asset=LbsMediaResize($asset, $size, $provider);
                    return lbsMediaUrlGenerator($asset);
                }
            }
            return lbsMediaUrlGenerator($asset);
        }
        return null;
    }
}

if (!function_exists('lbsMediaResize')) {
    function lbsMediaResize(LbsUpload $asset, $size ="original", $provider='admin' ){

        //Get Image Hight and Width from config file
        $mediaSizes=config('laravel-cms-v2.defaultImageSize');
        if(isset($mediaSizes[$size])){
            $image_hight=$mediaSizes[$size][0];
            $image_width=$mediaSizes[$size][1];
            $image_name=lbsRandomStr(32,true,true,true,true).'_'.$image_hight.'x'.$image_width.'.'.$asset->file_extension;
            $file_path='/uploads/all/'.$image_name;
            // if ($asset->directory =='storage') {
            //     $image=Image::make(storage_path('app/').$asset->file_path)->resize($image_hight, $image_width);
            //     Storage::disk($asset->directory)->put($file_path, (string)$image->encode());
            // }else{
                $image=Image::make(storage_path('app/public/').$asset->file_path)->resize($image_hight, $image_width);
                Storage::disk($asset->directory)->put($file_path, (string)$image->encode());
            // }
            $upload = new LbsUpload;
            $upload->original_name=$asset->original_name;
            $upload->user_id = Auth::user()->id;
            $upload->provider = $provider;
            $upload->file_path = $file_path;
            $upload->file_size = $asset->file_size;
            $upload->file_type = $asset->file_type;
            $upload->file_hight = $image_hight;
            $upload->file_width = $image_width;
            // $upload->directory = $asset->directory;
            $upload->directory = 'public';
            $upload->file_extension =$asset->file_extension;
            $upload->file_id =$asset->id;
            $upload->save();
            return $upload;
        }
        return $asset;
    }
}

// Get Media Link
if (!function_exists('lbsMediaUrlGenerator')) {
    function lbsMediaUrlGenerator(LbsUpload $asset){
        if ($asset->directory =='storage') {
            if (!str_contains($asset->user_set, (string)auth()->user()->id)) {
                return route('uploaded-files.getStorageMedia',['media'=>null]);
            }
           return route('uploaded-files.getStorageMedia',['media'=>base64_encode($asset->id)]);
        }else{
           return URL($asset->file_path);
        }
    }
}

// Get URL params
if (!function_exists('get_url_params')) {
    function get_url_params($url, $key){
        $query_str = parse_url($url, PHP_URL_QUERY);
        parse_str($query_str, $query_params);

        return $query_params[$key] ?? '';
    }
}

