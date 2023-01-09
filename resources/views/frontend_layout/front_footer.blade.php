

      <!-- End Register trigger modal -->
      <!--=================================
         Javascript -->
      <!-- JS Global Compulsory (Do not remove)-->
      <script src="{{URL('frontend/js/jquery-3.6.0.min.js')}}"></script>
      <script src="{{URL('frontend/js/popper/popper.min.js')}}"></script>
      <script src="{{URL('frontend/js/bootstrap/bootstrap.min.js')}}"></script>
      <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
      <script src="{{URL('frontend/js/jquery.appear.js')}}"></script>
      <script src="{{URL('frontend/js/counter/jquery.countTo.js')}}"></script>
      <script src="{{URL('frontend/js/select2/select2.full.js')}}"></script>
      <script src="{{URL('frontend/js/range-slider/ion.rangeSlider.min.js')}}"></script>
      <script src="{{URL('frontend/js/slick/slick.min.js')}}"></script>
      <script src="{{URL('frontend/js/datetimepicker/moment.min.js')}}"></script>
      <script src="{{URL('frontend/js/datetimepicker/datetimepicker.min.js')}}"></script>
      <script src="{{URL('frontend/js/nicescroll/jquery.nicescroll.min.js')}}"></script>
      <script src="{{URL('frontend/js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
      <!-- map -->
      <script src="{{URL('frontend/js/map/handlebars.min.js')}}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" type="text/javascript"></script>

      <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
      <script src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&libraries=common,util,map,overlay,onion,controls,stats,places,geometry,marker&v=beta"></script>
      <script src="{{URL('frontend/js/map/snazzy-info-window.min.js')}}"></script>
      {{-- <script src="{{URL('frontend/js/map/map-script.js')}}"></script> --}}
      <!-- Slider -->
      <script src="{{URL('frontend/js/owl-carousel/owl.carousel.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <!-- Template Scripts (Do not remove)-->
      <script src="{{URL('frontend/js/custom.js')}}"></script>
      <script>
         $(function () {
           return $(".modal").on("show.bs.modal", function () {
             var curModal;
             curModal = this;
             $(".modal").each(function () {
               if (this !== curModal) {
                 $(this).modal("hide");
               }
             });
           });
         });

        //  Livewire.hook('message.sent', (message,component) => {
        //     console.log('testing for livewire event');
        //     $('#loading-container').removeClass('loader-hidden');
        // });

        // Livewire.hook('message.processed', (message,component) => {
        //     console.log('testing for livewire event');
        //     $('#loading-container').addClass('loader-hidden');
        // });

        window.addEventListener('toast-notification-component', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.type ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        })

      </script>

      @stack('front_scripts')

