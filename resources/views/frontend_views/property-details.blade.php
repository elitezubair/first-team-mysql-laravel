@extends('frontend_layout.front_master')
@section('page_title','Property')
@section('meta_description', 'First Team Real Estate Agency is #1 in Total Home & Luxury Home Sales in Southern California including Orange, Los Angeles, and San Diego Counties.')
@section('content')

@livewire('frontend.property-detail.property-detail-component',['property_id'=>$property_id])

@endsection
