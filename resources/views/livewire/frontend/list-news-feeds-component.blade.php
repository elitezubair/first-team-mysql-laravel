<div>
    <ul class="nav nav-tabs nav-tabs-03 nav-fill ineer_tabs" id="myTab"
    role="tablist">
    <li class="nav-item" wire:click="fetchCategory('Buying')">
        <a class="nav-link {{$searchString=='Buying'? 'active':''}}" id="tab-01-tab" data-bs-toggle="tab"
            href="#newsinner-tab-01" role="tab" aria-controls="tab-01"
            aria-selected="{{$searchString=='Buying'? 'true':'false'}}">
            Buyer News</a>
    </li>
    <li class="nav-item" wire:click="fetchCategory('Selling')">
        <a class="nav-link {{$searchString=='Selling'? 'active':''}}" id="tab-02-tab" data-bs-toggle="tab"
            href="#newsinner-tab-02" role="tab" aria-controls="tab-02"
            aria-selected="{{$searchString=='Selling'? 'true':'false'}}">
            Seller News</a>
    </li>
    <li class="nav-item" wire:click="fetchCategory('Local')">
        <a class="nav-link {{$searchString=='Local'? 'active':''}}" id="tab-03-tab" data-bs-toggle="tab"
            href="#newsinner-tab-03" role="tab" aria-controls="tab-03"
            aria-selected="{{$searchString=='Local'? 'true':'false'}}"> Local News</a>
    </li>
</ul>
<div class="tab-content inner-tab" id="myInnerTabContent">
    <div class="tab-pane fade show active" id="newsinner-tab-01" role="tabpanel"
        aria-labelledby="tab-01-tab">
        <div class="wrapper nearby-news">
            <div class="row">
                @if ($collections and !$collections->isEmpty())
                @foreach ($collections as $colKey => $colVal)

                <div class="{{$autoLocate==true?'col-lg-4':'col-lg-6'}} col-md-6">
                    <a href="{{$colVal->link}}" target="_blank" class="news_link">
                        <div class="media news-media">
                            <img src="{{ $colVal->banner_image }}"
                                alt="">
                        </div>
                        <div id="" class="blog-content">
                            <h3 class="news-title">{{$colVal->title}}</h3>
                            {{-- <p class="news-paragraph">{{substr($colVal->description,0,200)}} ...</p> --}}
                            <div class="profile-block">
                                <img sizes="(max-width: 991px) 100vw, 40px"
                                    width="50"
                                    src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                    alt="First Team Logo" class="author-picture">
                                <div class="normal-wrapper">
                                    <div class="title-small-2">First Team</div>
                                    <p class="paragraph-detials-small">{{ $colVal->pub_ate }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @else
                <div class="col-lg-12 col-md-12"><div class="video_col"><h3>No Feeds Found</h3></div></div>
                @endif
                <!--===============  Start Pagination =================-->
                <nav aria-label="..." class="custom_pageination">
                    <ul class="pagination">
                        {{-- <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"
                                aria-disabled="true"><i
                                    class="bi bi-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link"
                                href="#">1</a></li>
                        <li class="page-item" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                href="#">3</a></li>
                        <li class="page-item"><a class="page-link"
                                href="#">4</a></li>
                        <li class="page-item"><a class="page-link"
                                href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i
                                    class="bi bi-chevron-right"></i></a>
                        </li> --}}
                        {{$collections->links()}}
                    </ul>
                </nav>
                <!--===============  End Pagination =================-->

            </div>
        </div>

    </div>
</div>
</div>

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
                    //@this.webLocationDeduct(position.coords.latitude, position.coords.longitude);
                }
                getLocation()
            });



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
         //@this.webLocationDeduct(latitude, longitude);
        console.log(latitude, longitude);
    });

        </script>
    @endpush

