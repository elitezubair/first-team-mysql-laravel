<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function property_landing_page(Request $request)
    {
        $page_type='landing_page';
        return view('frontend_views.homepage', compact('page_type'));
    }

    public function map_search(Request $request)
    {
        $page_type='map_search';
        return view('frontend_views.map-search', compact('page_type'));
    }

    public function property_details(Request $request)
    {
        $page_type='property_details';
        $property_id =base64_decode( $request->property_id);
        return view('frontend_views.property-details', compact('page_type','property_id'));
    }



    public function city_videos(Request $request)
    {
        $page_type='city_videos';
        return view('frontend_views.city-videos', compact('page_type'));
    }

    public function city_info(Request $request)
    {
        $page_type='city_info';
        return view('frontend_views.city-info', compact('page_type'));
    }

    public function city_news(Request $request)
    {
        $page_type='city_news';
        return view('frontend_views.city-news', compact('page_type'));
    }

    public function terms_condition(Request $request)
    {
        $page_type='terms_condition';
        return view('frontend_views.terms-condition', compact('page_type'));
    }

    public function privacy_policy(Request $request)
    {
        $page_type='privacy_policy';
        return view('frontend_views.privacy-policy', compact('page_type'));
    }

}

