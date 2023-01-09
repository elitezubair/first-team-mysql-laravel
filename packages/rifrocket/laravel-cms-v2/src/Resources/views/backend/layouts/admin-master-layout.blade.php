<!DOCTYPE html>
<html lang="en" id="html-@yield('page_title')" page-id="html-@yield('page_title')">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{lbsUploadedAsset((int)env('APP_ICON'),'thumb')}}">
    <title class="lbs_page_title">@yield('page_title') | {{env('APP_NAME')}} </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{lbsAssets('plugins/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{lbsAssets('dist/css/adminlte.min.css')}}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{lbsAssets('plugins/css/OverlayScrollbars.min.css')}}">
    <!-- jquery confim box -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link href="https://releases.transloadit.com/uppy/v2.12.3/uppy.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{lbsAssets('plugins/css/toastr.min.css')}}">

    <link rel="stylesheet" href="{{lbsAssets('dist/css/lbs_custom.css')}}">
    <link rel="stylesheet" href="{{lbsAssets('dist/css/default-loader.css')}}">
    @livewireStyles
    @stack('styles')
    <link rel="stylesheet" href="{{lbsAssets('dist/css/backend-custom.css')}}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<!--
`body` tag options:
  Apply one or more of the following classes to to the body tag
  to get the desired effect
  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
        <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" style="display: none;">
    </div>
    <!-- Navbar -->
    @include('LbsViews::backend.layouts.partials.admin-navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('LbsViews::backend.layouts.partials.admin-left-menu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">

        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

            {{--main body content--}}
            @section('content')
            @show
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy;2014-{{date('Y')}} <a href="/">{{env('APP_NAME')}}</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> {{env('APP_VERSION')}}
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<div class="loading  loader-hidden" id="loading-container" >
    @include('LbsViews::utility.utility-default-loader',[env('APP_LOADER')=>true])
</div>

<!-- REQUIRED SCRIPTS -->
{{-- @include('LbsViews::backend.layouts.partials.admin-right-menu') --}}
<!-- jQuery -->
<script src="{{lbsAssets('plugins/js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{lbsAssets('plugins/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{lbsAssets('dist/js/adminlte.min.js')}}"></script>


<!-- overlayScrollbars -->
<script src="{{lbsAssets('plugins/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- jquery confim box -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script src="https://releases.transloadit.com/uppy/v2.12.3/uppy.min.js"></script>
<script src="{{lbsAssets('plugins/js/toastr.min.js')}}"></script>


@livewireScripts



<input type="hidden" id="media_upload_base_url" value="{{route('uploaded-files.upload')}}">
<input type="hidden" id="csrf_token" value="{{csrf_token()}}">

<!-- js for livewire componets and events -->
<script src="{{lbsAssets('dist/js/lbs_livewire.js')}}"></script>
<script>
        var Lbs = Lbs || {};
   Lbs.local = {
       nothing_selected: '{!! LbsTranslate('Nothing selected', null, true) !!}',
       nothing_found: '{!! LbsTranslate('Nothing found', null, true) !!}',
       choose_file: '{{ LbsTranslate('Choose file') }}',
       file_selected: '{{ LbsTranslate('File selected') }}',
       files_selected: '{{ LbsTranslate('Files selected') }}',
       add_more_files: '{{ LbsTranslate('Add more files') }}',
       adding_more_files: '{{ LbsTranslate('Adding more files') }}',
       drop_files_here_paste_or: '{{ LbsTranslate('Drop files here, paste or') }}',
       browse: '{{ LbsTranslate('Browse') }}',
       upload_complete: '{{ LbsTranslate('Upload complete') }}',
       upload_paused: '{{ LbsTranslate('Upload paused') }}',
       resume_upload: '{{ LbsTranslate('Resume upload') }}',
       pause_upload: '{{ LbsTranslate('Pause upload') }}',
       retry_upload: '{{ LbsTranslate('Retry upload') }}',
       cancel_upload: '{{ LbsTranslate('Cancel upload') }}',
       uploading: '{{ LbsTranslate('Uploading') }}',
       processing: '{{ LbsTranslate('Processing') }}',
       complete: '{{ LbsTranslate('Complete') }}',
       file: '{{ LbsTranslate('File') }}',
       files: '{{ LbsTranslate('Files') }}',
   }




</script>

<script>

</script>

@stack('scripts')
@stack('loader')

</body>
</html>
