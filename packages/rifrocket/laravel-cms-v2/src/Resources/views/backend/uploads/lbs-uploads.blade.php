@extends('LbsViews::backend.layouts.admin-master-layout')
@section('content')


@if ($viewType =='media-list')
    @section('page_title','Media')
    @livewire('livewire.media.media-list-component')
@endif


@if ($viewType =='media-create')
    @section('page_title','Media upload')
    @include('LbsViews::backend.uploads.partials.create-uploads')
@endif

@endsection
