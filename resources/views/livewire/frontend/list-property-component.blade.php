<div>

    <div class="property-search-field">
        <div class="property-search-item">
            <!--=============  Search Form ============-->
            <div class="search-wrapper">
                <form class="row basic-select-wrapper" wire:ignore>
                    <div class="col-xl-8 col-lg-8 col-md-9 col-10">
                        <!--<input type="text" class="form-control" placeholder="Address, City or Zip" id="searchTextField"-->
                        <!--    onkeyup="initialize()">-->

                        <div class="search_position">
                            <input name="tags" type="text" class="form-control" placeholder="County/City/Address"
                                value='{{$session_county_city}}'>
                            <!--<button type="button" class="search_icon">-->
                            <!--    <i class="bi bi-search" wire:click="checksearch"></i>-->
                            <!--</button>-->

                            <button type="button" id="removeAllTags" class="clear_btn"><i
                                    class="bi bi-x-lg"></i></button>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-3 col-2">
                        @if (!auth()->check())
                            <button type="button" class="btn save_seach_btn" data-bs-toggle="modal"
                                data-bs-target="#login_modal">
                                <!--<i class="fa fa-bell"></i>-->
                                <!--<i class="fa fa-bell"></i> -->
                                <img src="{{ URL('frontend/images/notification.svg') }}" alt="" class="dark">
                                <img src="{{ URL('frontend/images/notification-white.svg') }}" alt=""
                                    class="light">
                                <span>Save Search</span>
                            </button>
                        @else
                            <button type="button" class="btn save_seach_btn" wire:click="saveSearchHistory">
                                <!--<i class="fa fa-bell"></i> -->
                                <img src="{{ URL('frontend/images/notification.svg') }}" alt="" class="dark">
                                <img src="{{ URL('frontend/images/notification-white.svg') }}" alt=""
                                    class="light">
                                <span>Save Search</span>
                            </button>
                        @endif

                    </div>
                </form>
            </div>
            <!--=============  End Search Form ============-->

            <!--=============  Filter Form =============-->
            <div class="filter_form">
                <div class="row">
                    <div class="filter_btn">
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#filterModal">
                            <!--<i class="bi bi-funnel"></i>-->
                            <img src="{{ URL('frontend/images/filters.svg') }}" alt="" class="dark">
                            <img src="{{ URL('frontend/images/filters-white.svg') }}" alt="" class="light">
                            <span class="text">Filters</span> <span class="badge"
                                id="badge">{{ $filterCounter }}</span>
                        </button>
                    </div>
                    <div class="status-dropdown">
                        <select class="form-control" wire:model="filter_search_status" wire:change="executeFilters">
                            <option value="ACT">Active</option>
                            <option value="PND">Pending</option>
                            <option value="CSN">Comming Soon</option>
                            <option value="REG">Registered</option>
                            <option value="SLD">Sold</option>
                        </select>
                    </div>
                    {{-- <div class="short-dropdown d-lg-block d-md-block d-none">
                        <i class="bi bi-arrow-down-up"></i>
                        <select class="form-control" wire:model="filter_search_order" wire:change="executeFilters">
                            <option value="newest">Newest</option>
                            <option value="oldest">Oldest</option>
                            <option value="expensive">Expensive</option>
                            <option value="cheapest">Cheapest</option>
                            <option value="3dtour">3D Tour</option>
                        </select>
                    </div> --}}
                    <div class="short-dropdown d-lg-block d-md-block d-none">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-arrow-down-up"></i>
                                Sort Properties
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><input class="radio" id="short1" type="radio" name="sortby" value="newest"
                                        wire:model="filter_search_order" wire:change="executeFilters" /><label
                                        for="short1">Newest</label></li>
                                <li><input class="radio" id="short2" type="radio" name="sortby" value="oldest"
                                        wire:model="filter_search_order" wire:change="executeFilters" /><label
                                        for="short2">Oldest</label> </li>
                                <li><input class="radio" id="short2" type="radio" name="sortby"
                                        value="expensive" wire:model="filter_search_order"
                                        wire:change="executeFilters" /><label for="short2">Expensive</label> </li>
                                <li><input class="radio" id="short2" type="radio" name="sortby"
                                        value="cheapest" wire:model="filter_search_order"
                                        wire:change="executeFilters" /><label for="short2">Cheapest</label> </li>
                                <li><input class="radio" id="short2" type="radio" name="sortby"
                                        value="3dtour" wire:model="filter_search_order"
                                        wire:change="executeFilters" /><label for="short2">3D Tour</label> </li>
                            </ul>
                        </div>

                    </div>
                    <div class="switch-buttons-wrapper d-lg-none">
                        <a href="#" class="switch-button map-view w-inline-block">
                            <div><span class="fa-icon no-margin"><img
                                        src="{{ URL('frontend/images/video-white.svg') }}" alt=""
                                        class="light"></span><span class="view-text">Videos</span></div>
                        </a>
                        <a href="#" class="switch-button list-view w-inline-block" style="display: none;">
                            <div><span class="fa-icon no-margin"><i class="bi bi-list-task"></i></span><span
                                    class="view-text">List</span></div>
                        </a>
                    </div>
                </div>
            </div>
            <!--============= End Filter Form =============-->
        </div>
    </div>
    <div class="property_list custom_scrool">
        <!-- Start Property Item -->
        <div class="property-item property-col-list mt-4">
            <div class="row g-0">
                <?php //print_r($collections);
                ?>
                @if ($collections and !$collections->isEmpty())
                    @foreach ($collections as $colKey => $colVal)
                        <div class="col-lg-12 col-md-6 property_col">
                            <div class="col-lg-12 col-md-12">
                                <div class="property-image bg-overlay-gradient-04">
                                    <div class="owl-carousel" id="itemlist" data-animateOut="fadeOut"
                                        data-nav-arrow="true" data-nav-dots="true" data-items="1" data-md-items="1"
                                        data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0"
                                        data-loop="true">

                                        @if ($colVal->images and !$colVal->images->isEmpty())
                                            @foreach ($colVal->images as $keyImage => $propertyImage)
                                                @if ($keyImage == 5)
                                                    @php
                                                        break;
                                                    @endphp
                                                @endif
                                                <div class="item">
                                                    <a
                                                        href="{{ route('public.property.property_details', ['property_id' => base64_encode($colVal->id)]) }}"><img
                                                            class="img-fluid" src="{{ $propertyImage->PhotoURL }}" data-original="{{ $propertyImage->PhotoURL }}"
                                                            alt=""></a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="item">
                                                <a
                                                    href="{{ route('public.property.property_details', ['property_id' => base64_encode($colVal->id)]) }}"><img
                                                        class="img-fluid" src="{{ $colVal->DefaultPhotoURL }}" data-original="{{ $colVal->DefaultPhotoURL }}"
                                                        alt=""></a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="property-lable">
                                        <span class="badge badge-md bg-primary">{{ $colVal->sStatus_cd }}</span>
                                    </div>
                                </div>
                                <div class="property_with_price">
                                    <div class="property-details-inner-box-left">
                                        <h5 class="property-title"><a
                                                href="{{ route('public.property.property_details', ['property_id' => base64_encode($colVal->id)]) }}">{{ $colVal->szListingAgent_nm }}
                                            </a></h5>
                                        @if ($colVal->szListingAgent_DRE)

                                            <p>LIC #: {{ $colVal->szListingAgent_DRE }}</p>
                                        @endif

                                    </div>
                                    <div class="property-price">${{ number_format($colVal->mListPrice_amt) }}</div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="property-details">
                                    <div class="property-details-inner">
                                        <div class="property-details-inner-box">
                                            <p>{{ $colVal->szAddress_nm }}, {{ $colVal->szCity_nm }},
                                                {{ $colVal->szCounty_nm }}, {{ $colVal->sState_cd }},
                                                {{ $colVal->sZip_cd }}</p>
                                        </div>
                                        <ul class="property-info list-unstyled d-flex">
                                            <li class="flex-fill property-bed"><img
                                                    src="{{ URL('frontend/images/bed.svg') }}"
                                                    alt=""><span>{{ $colVal->iBR_no }}</span></li>
                                            <li class="flex-fill property-bath"><img
                                                    src="{{ URL('frontend/images/bathroom.svg') }}"
                                                    alt=""><span>{{ $colVal->dBath_no }}</span></li>
                                            <li class="flex-fill property-m-sqft"><img
                                                    src="{{ URL('frontend/images/car.svg') }}"
                                                    alt=""><span>{{ $colVal->additional_amenities ? $colVal->additional_amenities->iTotalParking : 0 }}</span>
                                            </li>
                                            <li class="flex-fill property-m-sqft"><img
                                                    src="{{ URL('frontend/images/house-design.svg') }}"
                                                    alt=""><span>{{ number_format($colVal->iSqFt_no) }}
                                                    SQFT</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="property-btn">
                                        <h4>Single Family</h4>
                                        <ul class="property-listing-actions list-unstyled mb-0">
                                            <li class="property-time"><i class="bi bi-stopwatch"></i>
                                                {{ $colVal->iDaysOnMarket_no }}
                                                Days</li>
                                            @if (!auth()->check())
                                                <li class="property-favourites"><a href="#"
                                                        data-bs-toggle="modal" data-bs-target="#login_modal"><i
                                                            class="far fa-heart"></i></a></li>
                                            @elseif (auth()->check() and in_array($colVal->szMLS_no, $favoriteArray))
                                                <li class="property-favourites"><a
                                                        wire:click="removeFavorite('{{ $colVal->szMLS_no }}')"><i
                                                            class="fas fa-heart"></i></a></li>
                                            @else
                                                <li class="property-favourites"><a
                                                        wire:click="makeFavorite('{{ $colVal->szMLS_no }}','{{ $colVal->sStatus_cd }}','{{ $colVal->szPropType_cd }}','{{ $colVal->mListPrice_amt }}','{{ $colVal->szAddress_nm }}','{{ !$colVal->images->isEmpty() ? $colVal->images[0]->PhotoURL : URL('frontend/images/default-avatar.png') }}')"><i
                                                            class="far fa-heart"></i></a></li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12 col-md-12">
                        <div class="video_col">
                            <h3>No Property Found</h3>
                        </div>
                    </div>
                @endif

                <!--===============  Start Pagination =================-->
                <nav aria-label="..." class="custom_pageination">
                    <ul class="pagination">
                        @php
                            $total_pages = $finalCollectionForRender->count();
                            $num_results_on_page = $perPageItem;
                        @endphp
                        @include('LbsViews::utility.utility-pagination')
                    </ul>
                </nav>
                <!--===============  End Pagination =================-->

            </div>
        </div>
        <!-- End Property Item -->
    </div>

    <!--=============== Filter Popup ============-->

    @include('first_team_filters.property-filter')


    <!--=============== End Filter Popup ============-->

    <div class="loading" wire:loading>
        @include('LbsViews::utility.utility-default-loader', [env('APP_LOADER') => true])
    </div>
</div>


@push('front_styles')
    <link rel='stylesheet' href='https://unpkg.com/@yaireo/tagify/dist/tagify.css'>
    <link rel='stylesheet' href='{{ URL('frontend/css/histogram.custom.css') }}'>
@endpush

@push('front_scripts')
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="{{ URL('frontend/js/first_team_map_copy.js') }}"></script>

    <script src='https://unpkg.com/@yaireo/tagify'></script>
    <script src="{{ URL('frontend/js/togify_script.js') }}"></script>



    <script>
        // whitelist =['orange'];

        function initCarasoul() {
            var owlslider = jQuery("div.owl-carousel");
            owlslider.owlCarousel('destroy');
            owlslider.removeClass('owl-hidden');
            setTimeout(() => {
                if (owlslider.length > 0) {
                    owlslider.each(function() {
                        var $this = $(this),
                            $items = ($this.data('items')) ? $this.data('items') : 1,
                            $loop = ($this.attr('data-loop')) ? $this.data('loop') : true,
                            $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
                            $navarrow = ($this.data('nav-arrow')) ? $this.data('nav-arrow') : false,
                            $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : true,
                            $autospeed = ($this.attr('data-autospeed')) ? $this.data('autospeed') : 5000,
                            $smartspeed = ($this.attr('data-smartspeed')) ? $this.data('smartspeed') : 1000,
                            $autohgt = ($this.data('autoheight')) ? $this.data('autoheight') : false,
                            $space = ($this.attr('data-space')) ? $this.data('space') : 30,
                            $animateOut = ($this.attr('data-animateOut')) ? $this.data('animateOut') :
                            false;

                        $(this).owlCarousel({
                            loop: $loop,
                            items: $items,
                            responsive: {
                                0: {
                                    items: $this.data('xx-items') ? $this.data('xx-items') : 1
                                },
                                480: {
                                    items: $this.data('xs-items') ? $this.data('xs-items') : 1
                                },
                                768: {
                                    items: $this.data('sm-items') ? $this.data('sm-items') : 2
                                },
                                980: {
                                    items: $this.data('md-items') ? $this.data('md-items') : 3
                                },
                                1200: {
                                    items: $items
                                }
                            },
                            dots: $navdots,
                            autoplayTimeout: $autospeed,
                            smartSpeed: $smartspeed,
                            autoHeight: $autohgt,
                            margin: $space,
                            nav: $navarrow,
                            navText: ["<i class='fas fa-chevron-left'></i>",
                                "<i class='fas fa-chevron-right'></i>"
                            ],
                            autoplay: $autoplay,
                            autoplayHoverPause: true
                        });
                    });
                }
            }, 500);
        }
        window.addEventListener('refresh-owl-carousel', event => {
            initCarasoul();
            setTimeout(() => {
                initCarasoul();
            }, 100);
        });

        document.addEventListener('livewire:load', function() {
            $("img.lazy").lazyload();

            setTimeout(() => {
                @this.MakeMarkerForCity();
                initiatePriceRange()
            }, 100);
        })

        window.addEventListener('initiate-after-mount', event => {

            console.log('SQL: ', event.detail.sql_query)

        });

        window.addEventListener('after-mount-push-geo-markers', event => {

            console.log('on-mount-geo-map');
            if (event.detail.markers) {
                properties = (event.detail.markers);
            }
            centerPoint = (event.detail.map_center);
            currentZoom = (event.detail.zoom_index);
            console.log(centerPoint);
            firstTeamInitMap(centerPoint, currentZoom);
            initCarasoul();
            $("img.lazy").lazyload();
            console.log('on-mount-geo-map');

            search_results = (event.detail.search_results);
            $('.search-total').text('Search '+search_results+' Properties');
        });

        // from google map itself
        function LivewireFuctionForZoomChange(current_bound_lat0, current_bound_lng0, current_bound_lat1,
            current_bound_lng1, current_zoom, current_center_point) {
            @this.onMapCallFilterFunction(current_bound_lat0, current_bound_lng0, current_bound_lat1, current_bound_lng1,
                current_zoom, current_center_point);
            console.log('on blade', current_zoom);
        }

        // function  LivewireFuctionForDragChange(livewirePropertyIds){
        //     @this.onMapCallFilterByIdsFunction(livewirePropertyIds);
        // }

        function livewireEventListnerForTag(tags) {
            console.log('county');

            $('.checkbox').prop("checked", false);
            $('#min_price').val(0);
            $('#max_price').val(1000000);
            $('.filter_inout_range').val('');
            $('#removeAllTagsmlstagify').click();
            $('#No').prop("checked", true);

            @this.updateTags(tags);
        }

        function livewireEventListnerForMlsTag(tags) {
            console.log('sml');
            @this.update_szMLS_Tags(tags);
        }

        function refreshPage() {
            window.location.reload();
        }
    </script>
@endpush

@push('front_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.1/bootstrap-slider.js"></script>
    <script src="{{ URL('frontend/js/histogram.custom.js') }} "></script>
    <script>
        function initiatePriceRange() {
            var numBins = 70,
                data = dataFactory(1000, numBins, false);

            $("#histogramSlider").histogramSlider({
                data: data,
                sliderRange: [0, 1000000],
                optimalRange: false,
                selectedRange: [0, 1000000],
                numberOfBins: numBins,
                showTooltips: false,
                showSelectedRange: true,
                // finish:alert(2323)
            });


            function dataFactory(itemCount, numberOfBins, group) {
                var data = {
                    "items": []
                };

                for (var i = 0; i < itemCount; i++) {
                    var rnd = Math.floor(Math.random() * numberOfBins) + 1;
                    var rnd2 = Math.floor(Math.random() * 12000);
                    var v = ((1000000 / numberOfBins) - rnd2) * rnd;
                    if (group) {
                        data.items.push({
                            "value": v,
                            "count": rnd
                        });
                    } else {
                        data.items.push({
                            "value": v
                        });
                    }
                }
                return data;
            }
        };

        function livewirePriceRangeCall(selectedRange) {
            @this.filter_min_price = selectedRange[0];
            @this.filter_max_price = selectedRange[1];
            console.log('arif', selectedRange);
        }
    </script>
@endpush



