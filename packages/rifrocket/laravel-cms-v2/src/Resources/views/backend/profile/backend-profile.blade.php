@extends('LbsViews::backend.layouts.admin-master-layout')
@section('content')


@if ($viewType =='show-profile')
    @section('page_title','user profile')
    @livewire('livewire.profile.profile-component',['model'=>Rifrocket\LaravelCmsV2\Models\LbsAdmin::class, 'guard'=>'admin', 'roles_permissions'=>true])
@endif

@endsection



