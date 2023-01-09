<div>

    <div class="wrapper">
        @include('livewire.frontend.property-detail.partials.property-social-partial')

        <!--=================================
     End breadcrumb  Section -->


        <!--================== Statt tabs ========================-->
        <div class="property_tabs" >
            <div class="container">
                <ul class="nav nav-tabs nav-tabs-03 nav-fill ineer_tabs" id="myTab" role="tablist" wire:ignore>
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-property-image-tab" data-bs-toggle="tab"
                            href="#inner-tab-property-image" role="tab" aria-controls="tab-property-image"
                            aria-selected="true">
                            <i class="bi bi-images"></i>
                            Images
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-details-tab" data-bs-toggle="tab" href="#inner-tab-details"
                            role="tab" aria-controls="tab-02" aria-selected="false">
                            <i class="bi bi-list-check"></i>
                            Description
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-03-tab" data-bs-toggle="tab" href="#inner-tab-03" role="tab"
                            aria-controls="tab-03" aria-selected="false">
                            <i class="bi bi-sign-turn-right"></i>
                            Nearby
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-04-tab" data-bs-toggle="tab" href="#inner-tab-map" role="tab"
                            aria-controls="tab-04" aria-selected="false">
                            <i class="bi bi-pin-map"></i>
                            Map
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-04-tab" data-bs-toggle="tab" href="#inner-tab-05" role="tab"
                            aria-controls="tab-04" aria-selected="false">
                            <i class="bi bi-sliders"></i>
                            Similar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-04-tab" data-bs-toggle="tab" href="#inner-tab-06" role="tab"
                            aria-controls="tab-04" aria-selected="false">
                            <i class="bi bi-calculator"></i>
                            Calculator
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-04-tab" data-bs-toggle="tab" href="#inner-tab-07" role="tab"
                            aria-controls="tab-04" aria-selected="false">
                            <i class="far fa-address-card"></i>&nbsp;
                            Contact Info
                        </a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
        <!--=================  End tabs ======================-->

        <!--================== Statt tabs Content ========================-->
        <div class="tab-content inner-tab" id="myPropertyTabContent">
            <div class="tab-pane fade show active" id="inner-tab-property-image" role="tabpanel"
                aria-labelledby="tab-01-tab" wire:ignore>
                @include('livewire.frontend.property-detail.partials.property-image-partial')
            </div>

            <!--=================================
              Start Property Details Section -->
            <div class="tab-pane fade " id="inner-tab-details" role="tabpanel" aria-labelledby="tab-details-tab">
                @include('livewire.frontend.property-detail.partials.property-description-partial')
            </div>
            <!--=================================
              End Property Details Section -->

            <!--=================================
              Start Nearby Section -->
            <div class="tab-pane fade" id="inner-tab-03" role="tabpanel" aria-labelledby="tab-03-tab" wire:ignore.self>
                <div class="container common nearby_section">
                    <h2 class="tab-heading">Nearby</h2>
                    <!--================== inner tabs ========================-->
                    @livewire('frontend.list-city-info-component', ['coordinates' => $markerCoordinates])
                    <!--=================  End inner tabs ======================-->
                </div>
            </div>
            <!--=================================
              End Nearby Section -->


            <!--=================================
              Start Map Section -->
            <div class="tab-pane fade" id="inner-tab-map" role="tabpanel" aria-labelledby="tab-04-tab" wire:ignore.self>
                @include('livewire.frontend.property-detail.partials.poperty-map-partial')
            </div>
            <!--=================================
              End Map Section -->

            <!--=================================
        Similar Properties  Section -->
            <div class="tab-pane fade" id="inner-tab-05" role="tabpanel" aria-labelledby="tab-04-tab" wire:ignore.self>
                @include('livewire.frontend.property-detail.partials.property-similar-partial')
            </div>


            <!--=================================
              End Similar Properties Section -->

            <!--=================================
        Calculator  Section -->
            <div class="tab-pane fade" id="inner-tab-06" role="tabpanel" aria-labelledby="tab-04-tab"  wire:ignore.self>
                @include('livewire.frontend.property-detail.partials.property-mortgage-calculator-partial')
            </div>
            <!--=================================
              End Calculator Section -->

            <!--=================================
              Start Contact Info Section -->
            <div class="tab-pane fade " id="inner-tab-07" role="tabpanel" aria-labelledby="tab-02-tab"  wire:ignore.self>
                <div class="common-space description-section">
                    <div class="container property-desc contact_info">
                        <div class="wrapper">
                            @include('livewire.frontend.property-detail.partials.property-contact-partial')
                        </div>
                    </div>
                </div>
            </div>
            <!--=================================
                    End Contact Info Section -->

        </div>

        <!--================== End tabs Content ========================-->

    </div>



    <!-- Schedule a Tour modal -->
    <!-- Modal -->
    <div class="modal fade user_account_area schedule_tour" id="schedule_tour_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Schedule a Tour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('frontend.property-detail.property-visit-component', ['property_id'=>$propertyCollection->id, 'szAddress_nm'=>$propertyCollection->szAddress_nm, 'szMLS_no'=>$propertyCollection->szMLS_no])
                </div>
            </div>
        </div>
    </div>
    <!-- Schedule a Tour modal -->

    <!-- Call or Request Info modal -->
    <!-- Modal -->
    <div class="modal fade user_account_area request_call" id="request_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Call or Request Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="call-wrap">
                        <img src="{{ URL('frontend/images/First-Team-Logo.png') }}" class="call-ft-logo">
                        <div>
                            <div class="ft-agent-cta">Call First Team Agent Now!</div>
                            <a href="tel:+19498228804" class="call-button"><span class="fa-icon"><i
                                        class="bi bi-telephone"></i></span>+1 (949) 822-8804</a>
                        </div>
                    </div>
                    <div class="ft-agent-info-wrap">
                        <div class="form-wrapper w-form">
                            @livewire('frontend.property-detail.property-enquiry-component' ,['dateRangeAttrition'=>1,'property_id'=>$propertyCollection->id, 'szAddress_nm'=>$propertyCollection->szAddress_nm, 'szMLS_no'=>$propertyCollection->szMLS_no])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call or Request Info modal -->

</div>

@push('front_scripts')
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="{{ URL('frontend/js/first_team_map_copy.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/share.js') }}"></script>

    <script>
        function initCarasoul() {
            var owlslider = jQuery("div.owl-carousel");
            owlslider.owlCarousel('destroy');
            owlslider.removeClass('owl-hidden');
            console.log('working on init');
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
        });
// arif
        document.addEventListener('livewire:load', function() {
            console.log('markerLoad');
            initCarasoul();
            properties = ({!! json_encode($RenderMarker) !!});
            centerPoint = ({!! json_encode($markerCoordinates) !!});
            firstTeamInitMap(centerPoint, 7);
        })

    </script>
@endpush
