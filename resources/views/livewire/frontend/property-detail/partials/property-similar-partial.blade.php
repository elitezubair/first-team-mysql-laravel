<div class="similar_section left_bar">
    <div class="container common">
        <!-- Start Property Item -->
        <h2 class="tab-heading no-border-margin">Similar Properties</h2>
        <div class="property-item property-col-list mt-4">
            <div class="row g-0">
                @if ($collections and !$collections->isEmpty())
                @foreach ($collections as $colKey => $colVal)
                <div class="col-lg-6 col-md-6 ptcol">
                    <div class="property_col">
                       <div class="col-lg-12 col-md-12">
                          <div class="property-image bg-overlay-gradient-04">
                             <div class="owl-carousel" id="itemlist" data-animateOut="fadeOut" data-nav-arrow="true"
                                data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1"
                                data-xx-items="1" data-space="0" data-loop="true">
                                @if ($colVal->images and !$colVal->images->isEmpty())


                                    @foreach ($colVal->images as $keyImage => $propertyImage)
                                    @if ($keyImage == 5)
                                        @php
                                            break;
                                        @endphp
                                    @endif
                                    <div class="item">
                                        <a href="{{route('public.property.property_details',['property_id'=>base64_encode($colVal->id)])}}"><img class="img-fluid"
                                                src="{{ $propertyImage->PhotoURL }}" alt=""></a>
                                    </div>
                                     @endforeach

                                @else
                                <div class="item">
                                    <a href="{{route('public.property.property_details',['property_id'=>base64_encode($colVal->id)])}}"><img class="img-fluid"
                                            src="{{ $colVal->DefaultPhotoURL }}" alt=""></a>
                                </div>
                                @endif
                             </div>
                             <div class="property-lable">
                                <span class="badge badge-md bg-primary">{{ $colVal->sStatus_cd }}</span>
                             </div>
                          </div>
                          <div class="property_with_price">
                             <div class="property-details-inner-box-left">
                                <h5 class="property-title"><a href="{{route('public.property.property_details',['property_id'=>base64_encode($colVal->id)])}}">{{ $colVal->szListingAgent_nm}}</a></h5>
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
                                   <p>{{ $colVal->szAddress_nm }}, {{ $colVal->szCity_nm }}, {{ $colVal->szCounty_nm }}, {{ $colVal->sState_cd }}, {{ $colVal->sZip_cd }}</p>
                                </div>
                                <ul class="property-info list-unstyled d-flex">
                                   <li class="flex-fill property-bed"><img src="{{URL('frontend/images/bed.svg')}}" alt=""><span>{{ $colVal->iBR_no }}</span></li>
                                   <li class="flex-fill property-bath"><img src="{{URL('frontend/images/bathroom.svg')}}" alt=""><span>{{ $colVal->dBath_no }}</span></li>
                                   <li class="flex-fill property-m-sqft"><img src="{{URL('frontend/images/car.svg')}}" alt=""><span>NA</span></li>
                                   <li class="flex-fill property-m-sqft"><img src="{{URL('frontend/images/house-design.svg')}}" alt=""><span>{{number_format( $colVal->iSqFt_no) }}
                                      SQFT</span>
                                   </li>
                                </ul>
                             </div>
                             <div class="property-btn">
                                <h4>Single Family</h4>
                                <ul class="property-listing-actions list-unstyled mb-0">
                                   <li class="property-time"><i class="bi bi-stopwatch"></i>  {{ $colVal->iDaysOnMarket_no }} Days</li>
                                   @if (!auth()->check())
                                   <li class="property-favourites"><a href="#" data-bs-toggle="modal"
                                       data-bs-target="#login_modal"><i class="far fa-heart"></i></a></li>
                                   @elseif (auth()->check() and in_array($colVal->szMLS_no , $favoriteArray))
                                   <li class="property-favourites"><a wire:click="removeFavorite('{{$colVal->szMLS_no}}')"><i class="fas fa-heart"></i></a></li>
                                   @else
                                   <li class="property-favourites"><a wire:click="makeFavorite('{{$colVal->szMLS_no}}','{{$colVal->sStatus_cd}}','{{$colVal->szPropType_cd}}','{{$colVal->mListPrice_amt}}','{{$colVal->szAddress_nm}}','{{(!$colVal->images->isEmpty())?$colVal->images[0]->PhotoURL:URL('frontend/images/default-avatar.png')}}')"><i class="far fa-heart"></i></a></li>
                                   @endif
                                </ul>
                             </div>
                          </div>
                       </div>
                    </div>

                 </div>
                 @endforeach
                 @else
                 <div class="col-lg-12 col-md-12"><div class="video_col"><h3>No Property Found</h3></div></div>
                @endif



                <!--===============  Start Pagination =================-->
                <nav aria-label="..." class="custom_pageination">
                  <ul class="pagination">
                      @php
                          $total_pages = $getQueryData;
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
</div>
