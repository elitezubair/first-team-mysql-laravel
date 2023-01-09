<!--=================================
         Image Slider Section -->
<section class="image-slider-section">
    <!-- =========== img item =============== -->
    <div class="property-detail-img popup-gallery">
        <div class="owl-carousel" data-animateOut="fadeOut" data-nav-arrow="true" data-items="1" data-md-items="1"
            data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0" data-loop="true">
            @if ($propertyCollection->images and !$propertyCollection->images->isEmpty())
            @foreach ($propertyCollection->images as $keyImage => $propertyImage)
                @if ($keyImage == 5)
                    @php
                        break;
                    @endphp
                @endif
                <div class="item">
                    <a class="portfolio-img" href="{{ $propertyImage->PhotoURL }}"><img class="img-fluid"
                            src="{{ $propertyImage->PhotoURL }}" alt=""></a>
                </div>
            @endforeach
            @else
            <div class="item">
                <a class="portfolio-img" href="{{ $propertyCollection->DefaultPhotoURL  }}"><img class="img-fluid"
                        src="{{ $propertyCollection->DefaultPhotoURL  }}" alt=""></a>
            </div>
            @endif
        </div>
    </div>
    <!-- =========== End img item =============== -->
    <!-- =========== Prperty Title  ============-->
    <div class="wrapper price-address">
        <h1 class="street-address"><span class="fa-icon prop-location"><i
                    class="bi bi-geo-alt"></i></span>{{ $propertyCollection->szAddress_nm }}, {{ $propertyCollection->szCity_nm }}, {{ $propertyCollection->szCounty_nm }}, {{ $propertyCollection->sState_cd }}, {{ $propertyCollection->sZip_cd }}</h1>
        <div class="address-price-divider">・</div>
        <h2 class="prop-price">${{ number_format($propertyCollection->mListPrice_amt) }}</h2>
    </div>
    <!-- =========== End Prperty Title  ============-->
</section>
<!--=================================
         End Image Slider Section -->
