<div>
    <ul class="nav nav-tabs nav-tabs-03 nav-fill ineer_tabs" id="myTab" role="tablist">
        <li class="nav-item "  wire:click="$set('current_tab', 'restaurant')">
            <a class="nav-link {{ $current_tab == 'restaurant' ? 'active' : '' }}" id="tab-01-tab" data-bs-toggle="tab"
                href="#inner-tab-01" role="tab" aria-controls="tab-01"
                aria-selected="true">
                <img src="{{ URL('frontend/images/restaurant.svg') }}" alt="" class="dark">
                <img src="{{ URL('frontend/images/restaurant-white.svg') }}" alt="" class="light">
                Restaurants</a>
        </li>
        <li class="nav-item"  wire:click="$set('current_tab', 'park')">
            <a class="nav-link {{ $current_tab == 'park' ? 'active' : '' }}" id="tab-02-tab" data-bs-toggle="tab"
                href="#inner-tab-02" role="tab" aria-controls="tab-02"
                aria-selected="false">
                <img src="{{ URL('frontend/images/park.svg') }}" alt="" class="dark">
                <img src="{{ URL('frontend/images/park-white.svg') }}" alt="" class="light">
                Parks</a>
        </li>
        <li class="nav-item" wire:click="$set('current_tab', 'hospital')">
            <a class="nav-link {{ $current_tab == 'hospital' ? 'active' : '' }}" id="tab-03-tab" data-bs-toggle="tab"
                href="#inner-tab-03" role="tab"  aria-controls="tab-03"
                aria-selected="false">
                <img src="{{ URL('frontend/images/hospital.svg') }}" alt="" class="dark">
                <img src="{{ URL('frontend/images/hospital-white.svg') }}" alt="" class="light">
                Hospitals</a>
        </li>
        <li class="nav-item " wire:click="$set('current_tab', 'school')">
            <a class="nav-link {{ $current_tab == 'school' ? 'active' : '' }}" id="tab-04-tab" data-bs-toggle="tab" href="#inner-tab-04" role="tab"
                 aria-controls="tab-04" aria-selected="false">
                <img src="{{ URL('frontend/images/school.svg') }}" alt="" class="dark">
                <img src="{{ URL('frontend/images/school-white.svg') }}" alt="" class="light">
                Schools</a>
        </li>
    </ul>
    <div class="tab-content inner-tab" id="myInnerTabContent">
        <div class="tab-pane fade show active" id="inner-tab-01" role="tabpanel" aria-labelledby="tab-01-tab">
            <div class="row">
                @if ($collections and !$collections->isEmpty())
                    @foreach ($collections as $colKey => $colVal)
                        <div class="{{$autoLocate==true?'col-lg-4':'col-lg-6'}} col-md-6">
                            <div class="w-layout-grid modal-grid city-info">
                                <a href="https://www.google.com/maps/search/?api=1&query=Google&query_place_id={{$colVal["place_id"]}}" target="_blank" class="nearby-wrapper w-inline-block">
                                    @if (isset($colVal["photos"]))
                                    <img src="{{ 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=650&photo_reference='.$colVal["photos"][0]["photo_reference"].'&key='.env('GOOGLE_API').' '}}" alt="Lounge Area"
                                        class="nearby-image">
                                        @else
                                        @if ($current_tab == 'restaurant')
                                        <img src="{{URL('frontend/images/default-cards/default_restaurant.jpg')}}"class="nearby-image">
                                        @endif
                                        @if ($current_tab == 'park')
                                        <img src="{{URL('frontend/images/default-cards/default_park.jpg')}}"class="nearby-image">
                                        @endif
                                        @if ($current_tab == 'hospital')
                                        <img src="{{URL('frontend/images/default-cards/default_hospital.jpg')}}"class="nearby-image">
                                        @endif
                                        @if ($current_tab == 'school')
                                        <img src="{{URL('frontend/images/default-cards/default_school.jpg')}}"class="nearby-image">
                                        @endif
                                    @endif

                                    <div class="circle-button info-card">
                                        <div class="plus-icon"><i class="bi bi-plus"></i>
                                        </div>
                                        <div class="circle-base"></div>
                                    </div>
                                    <div class="nearby-info-wrap">
                                        <div class="nearby-title">{{$colVal['name']}}</div>
                                        <div class="paragraph">{{$colVal['vicinity']}}</div>
                                        <div class="reviews">{{$colVal['user_ratings_total']}} Reviews: {{$colVal['rating']}} Average</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12 col-md-12">
                        <div class="video_col">
                            <h3>No Info Found</h3>
                        </div>
                    </div>
                @endif

                <!--===============  Start Pagination =================-->
                <nav aria-label="..." class="custom_pageination">
                    <ul class="pagination">
                        {{ $collections->links() }}
                    </ul>
                </nav>
                <!--===============  End Pagination =================-->

            </div>
        </div>

    </div>
</div>

@if ($autoLocate)
    @push('front_scripts')
        <script>
            document.addEventListener('livewire:load', function() {
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        x.innerHTML = "Geolocation is not supported by this browser.";
                    }
                }

                function showPosition(position) {
                    console.log(position.coords.latitude, position.coords.longitude);
                    @this.webLocationDeduct(position.coords.latitude, position.coords.longitude);
                }
                getLocation()
            })
            $location_input = $("#searchInput");
    var options = {
        types: ['(cities)'],
        componentRestrictions: {
            country: 'us'
        }
    };
    var autocomplete = new google.maps.places.Autocomplete($location_input.get(0), options);
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
         let place = autocomplete.getPlace();
         var latitude= place.geometry.location.lat();
         var longitude= place.geometry.location.lng() ;
         @this.webLocationDeduct(latitude, longitude);
        console.log(latitude, longitude);
    });
        </script>
    @endpush
@endif
