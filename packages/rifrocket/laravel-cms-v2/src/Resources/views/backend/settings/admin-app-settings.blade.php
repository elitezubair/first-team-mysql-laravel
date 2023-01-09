@extends('LbsViews::backend.layouts.admin-master-layout')
@section('content')


@if ($viewType =='system-settings')
    @section('page_title','system settings')
    <div class="row">
        <div class="col-md-4">@include('LbsViews::backend.settings.partials.system-setting',['card_title'=>'application settings'])</div>
        <div class="col-md-4">@include('LbsViews::backend.settings.partials.database-setting',['card_title'=>'database settings'])</div>
        <div class="col-md-4">@include('LbsViews::backend.settings.partials.smtp-setting',['card_title'=>'mail settings'])</div>
        <div class="col-md-4">@include('LbsViews::backend.settings.partials.api-setting',['card_title'=>'API settings'])</div>

    </div>
@endif

@if ($viewType =='system-css-settings')
    @section('page_title','system settings')
    <div class="row">
        @include('LbsViews::backend.settings.partials.css-editor-setting',['card_title'=>'css settings'])
    </div>
@endif

<div class="loading" style="display: none">
    @include('LbsViews::utility.utility-default-loader',[env('APP_LOADER')=>true])
</div>

@include('LbsViews::backend.settings.setting-jquery')

@endsection
