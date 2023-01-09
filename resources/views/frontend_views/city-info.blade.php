@extends('frontend_layout.front_master')
@section('page_title','City Info')
@section('meta_description', 'First Team Real Estate Agency is #1 in Total Home & Luxury Home Sales in Southern California including Orange, Los Angeles, and San Diego Counties.')
@section('content')



<div class="city-video-section city-information">
    <div class="inner-city-video">
       <!--======= Search Header Area =======-->
       <div class="header-search-wrapper">
          <h1 class="page-heading">City Information</h1>
          <div class="right-search-wrap">
             <form class="search cv w-form">
                <input type="search" id="searchInput" class="search-input w-input" placeholder="Search by: Address, City, or Zip">
                <div class="clear-search-icon"><i class="bi bi-x-lg"></i></div>
                <button type="submit" class="search-button w-button"><i class="bi bi-search"></i></button>
             </form>
             <div class="form-wrapper cv w-form">
                <form class="form cv">
                   <select class="input search-select w-select">
                      <option value="">Select Area ...</option>
                      <option value="Orange">Orange</option>
                      <option value="Los Angeles County">Los Angeles County</option>
                      <option value="San Diego (City)">San Diego (City)</option>
                      <option value="San Diego County">San Diego County</option>
                   </select>
                </form>
             </div>
          </div>
       </div>
       <!--======= End Search Header Area =======-->

       <!--======= City info List  =======-->

       <div class="city-info-list">
       <!--================== City Info tabs ========================-->
       @livewire('frontend.list-city-info-component', ['autoLocate'=>true])
       <!--=================  End City Info tabs ======================-->
       </div>

       <!--===============  End City info List =================-->


    </div>
 </div>

@endsection

