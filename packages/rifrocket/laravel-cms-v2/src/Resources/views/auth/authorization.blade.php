@extends('LbsViews::auth.layouts.masterLayout')


@section('content')


@if ($viewType=='show-login')
    @section('page_title','login')
    @livewire('livewire.auth.login-component', ['model'=>Rifrocket\LaravelCmsV2\Models\LbsAdmin::class, 'guard'=>'admin', 'logged_in_redirect_route'=>'lbs.admin.dashboard'])
@endif

@if ($viewType=='show-forget-password')
    @section('page_title','forget password')
    @livewire('livewire.auth.forget-password-component', ['model'=>Rifrocket\LaravelCmsV2\Models\LbsAdmin::class, 'guard'=>'admin', 'logged_in_redirect_route'=>'lbs.admin.dashboard'])
@endif


@endsection
