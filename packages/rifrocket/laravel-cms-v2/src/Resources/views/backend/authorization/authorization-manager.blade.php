@extends('LbsViews::backend.layouts.admin-master-layout')
@section('content')


@if ($viewType =='list-role-permission')
    @section('page_title','List role and permission')
    @livewire('livewire.authorization.authorization-manager-component')
@endif


@endsection
