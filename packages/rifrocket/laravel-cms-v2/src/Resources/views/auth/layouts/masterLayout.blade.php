<!DOCTYPE html>
<html lang="en" id="html-@yield('page_title')" page-id="html-@yield('page_title')">

<head>
    <?php ob_start(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{lbsUploadedAsset((int)env('APP_ICON'),'thumb')}}">
    <title class="lbs_page_title">@yield('page_title') | {{env('APP_NAME')}} </title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{lbsAssets('plugins/css/all.min.css')}} ">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
          href="{{lbsAssets('plugins/css/icheck-bootstrap.min.css')}} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{lbsAssets('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{lbsAssets('dist/css/lbs_custom.css')}}">
    <link rel="stylesheet" href="{{lbsAssets('plugins/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{lbsAssets('dist/css/default-loader.css')}}">
    @livewireStyles
    @stack('styles')
    <link rel="stylesheet" href="{{lbsAssets('dist/css/backend-custom.css')}}">

</head>
<body class="hold-transition login-page" style=" background-repeat: no-repeat; background-size: cover;" id="body-@yield('page_title')" page-id="body-@yield('page_title')">

<div class="login-box">
    <!-- /.login-logo -->

    <div class="card child-card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h5"><b>{{env('APP_NAME')}}</b></a>
        </div>

        @section('content')
        @show

    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->


<div class="loading loader-hidden " id="loading-container" >
    @include('LbsViews::utility.utility-default-loader',[env('APP_LOADER')=>true])
</div>

<input type="hidden" id="media_upload_base_url" value="{{route('uploaded-files.upload')}}">
<input type="hidden" id="csrf_token" value="{{csrf_token()}}">
<!-- jQuery -->
<script src="{{lbsAssets('plugins/js/jquery.min.js')}} "></script>
<!-- Bootstrap 4 -->
<script src="{{lbsAssets('plugins/js/bootstrap.bundle.min.js')}} "></script>
<!-- AdminLTE App -->
<script src="{{lbsAssets('dist/js/adminlte.min.js')}} "></script>
<script src="{{lbsAssets('dist/js/lbs_custom.js')}} "></script>
<script src="{{lbsAssets('plugins/js/toastr.min.js')}}"></script>



@livewireScripts
<script src="{{lbsAssets('dist/js/lbs_livewire.js')}}"></script>



@stack('scripts')


@stack('loaders')

</body>
</html>
