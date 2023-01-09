@extends('frontend_layout.front_master')
@section('page_title','Properties')
@section('meta_description', 'First Team Real Estate Agency is #1 in Total Home & Luxury Home Sales in Southern California including Orange, Los Angeles, and San Diego Counties.')
@section('content')


<div class="container-fluid">
    <div class="row ">
       <div class="col-lg-4 left_bar">
        @livewire('frontend.list-property-component')
       </div>
       <div class="col-lg-8 right_bar d-lg-block d-none">
          <div class="right_content Property_page">

             <!--================== MAp Property List ========================-->
             <div class="scrollbar">
                <div class="map_property_list">
                   <div class="half-map-full">
                    <div class="map-canvas h-90vh">
                    </div>
                   </div>
                </div>
             </div>
              <!--================== End MAp Property List ========================-->
          </div>
       </div>
    </div>
 </div>
@endsection
