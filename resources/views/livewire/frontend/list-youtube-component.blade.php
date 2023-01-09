<div class="row">
    @if ($collections and !$collections->isEmpty())
        @foreach ($collections as $colKey => $colVal)
            <div class="{{ $autoLocate == true ? 'col-lg-4' : 'col-lg-6' }} col-md-6">
                <div class="video_col">
                    <iframe width="560" height="250"
                        @if ($inDatabase) src="https://www.youtube.com/embed/{{ $colVal->video_code }}" title="YouTube video player"
                        @else
                        src="https://www.youtube.com/embed/{{ $colVal['id']['videoId'] }}" title="YouTube video player" @endif
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-lg-12 col-md-12">
            <div class="video_col">
                <h3>No Video Found</h3>
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
                    @this.webLocationDeduct(40.7127753, -74.0059728, 'orange county');
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
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                var city_name = place.address_components[0].long_name;
                @this.webLocationDeduct(latitude, longitude, city_name);
                console.log(latitude, longitude);
                console.log(place.address_components[0].long_name);
            });
        </script>
    @endpush
@endif
