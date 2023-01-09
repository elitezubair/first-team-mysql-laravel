<div class="common-space description-section">
    <div class="container property-desc">
        <div class="wrapper">

            <!--=============  Property Details Section =============-->

            <h2 class="pd-tab-heading">Property Details</h2>
            <div class="property-detail-card">
                <div class="pd-card-header-wrap overiew">
                    <div>
                        <div class="card-heading address">{{ $propertyCollection->szAddress_nm }}
                        </div>
                    </div>
                    <div class="card-heading price-text"><strong class="bold-text">${{ number_format($propertyCollection->mListPrice_amt) }}</strong>
                    </div>
                </div>
                <div class="w-layout-grid pd-grid overview">
                    <div class="pd-info-wrap">
                        <div class="fa-icon large">
                            <img src="{{ URL('frontend/images/Single-Family.svg') }}" alt="">
                        </div>
                        <div>
                            <div class="pd-text"><strong>{{$propertyCollection->szPropType_cd}}</strong></div>
                            <div class="pd-text">Property Type</div>
                        </div>
                    </div>
                    <div class="pd-info-wrap">
                        <div class="fa-icon large">
                            <img src="{{ URL('frontend/images/Bedrooms.svg') }}" alt="">
                        </div>
                        <div>
                            <div class="pd-text"><strong>{{ $propertyCollection->iBR_no}}</strong></div>
                            <div class="pd-text">Bedrooms</div>
                        </div>
                    </div>
                    <div class="pd-info-wrap">
                        <div class="fa-icon large">
                            <img src="{{ URL('frontend/images/Bathrooms.svg') }}" alt="">
                        </div>
                        <div>
                            <div class="pd-text"><strong>{{(int) $propertyCollection->dBath_no }}</strong></div>
                            <div class="pd-text">Bathrooms</div>
                        </div>
                    </div>
                    <div class="pd-info-wrap">
                        <div class="fa-icon large">
                            <img src="{{ URL('frontend/images/Garage.svg') }}" alt="">
                        </div>
                        <div>
                            <div class="pd-text"><strong>{{ $propertyAdditionalAmenities->iTotalParking }}</strong></div>
                            <div class="pd-text">Parking</div>
                        </div>
                    </div>
                    <div class="pd-info-wrap">
                        <div class="fa-icon large">
                            <img src="{{ URL('frontend/images/SQFt.svg') }}" alt="">
                        </div>
                        <div>
                            <div class="pd-text"><strong>{{ number_format($propertyCollection->iSqFt_no) }}</strong></div>
                            <div class="pd-text">SQFt</div>
                        </div>
                    </div>
                    <div class="pd-info-wrap">
                        <div class="fa-icon large">
                            <img src="{{ URL('frontend/images/Yea- Built.svg') }}" alt="">
                        </div>
                        <div>
                            <div class="pd-text"><strong>{{ $propertyCollection->iYearBuilt_no }}</strong></div>
                            <div class="pd-text">Year Built</div>
                        </div>
                    </div>
                    <div class="pd-info-wrap">
                        <div class="fa-icon large">
                            <img src="{{ URL('frontend/images/Heating.svg') }}" alt="">
                        </div>
                        <div>
                            {{-- @dd($propertyCollection) --}}
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->sHeating=='Y'?$propertyAdditionalAmenities->szHeatingTypes:'NA'}}</strong></div>
                            <div class="pd-text">Heating/Cooling</div>
                        </div>
                    </div>
                    <div class="pd-info-wrap">
                        <div class="fa-icon large">
                            <img src="{{ URL('frontend/images/Views.svg') }}" alt="">
                        </div>
                        <div>
                            <div class="pd-text"><strong>NA</strong></div>
                            <div class="pd-text">Views</div>
                        </div>
                    </div>
                    <div class="pd-info-wrap">
                        <div class="fa-icon large">
                            <img src="{{ URL('frontend/images/Days.svg') }}" alt="">
                        </div>
                        <div>
                            <div class="pd-text"><strong>{{ $propertyCollection->iDaysOnMarket_no }}</strong></div>
                            <div class="pd-text">Days on Market</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--=============  Description Section =============-->

            <div class="property-detail-card">
                <div class="pd-card-header-wrap">
                    <h3 class="card-heading">Description</h3>
                </div>
                <div class="desc-wrap">
                    <p class="pd-description margin-bottom">{{$propertyCollection->szPropertyDescription_nm}}</p>
                    <div class="pd-wrap">
                        <div class="pd-text">Presented By:</div>
                        <div class="pd-text"><strong>{{$propertyCollection->szListingAgent_nm}}</strong></div>
                    </div>
                    <div class="pd-wrap">
                        <div class="pd-text">License #:</div>
                        <div class="pd-text"><strong>{{$propertyCollection->szListingAgent_DRE}}</strong></div>
                    </div>
                </div>
            </div>

            <!--=============  Facts and Features Section =============-->

            <div class="property-detail-card">
                <div class="pd-card-header-wrap">
                    <h3 class="card-heading">Facts and Features</h3>
                </div>
                <div class="wrapper">
                    <div class="ff-small-heading"><strong>Interior</strong></div>
                    <div class="w-layout-grid details-grid">
                        <div class="detail-wrap">
                            <div class="pd-text">Main Level Bedrooms</div>
                            <div class="pd-text"><strong>NA</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Total Bedrooms</div>
                            <div class="pd-text"><strong>{{ $propertyCollection->iBR_no}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Full Baths</div>
                            <div class="pd-text"><strong>NA</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Half Baths</div>
                            <div class="pd-text"><strong>NA</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Main Level Bathroom</div>
                            <div class="pd-text"><strong>NA</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Total Baths</div>
                            <div class="pd-text"><strong>{{(int) $propertyCollection->dBath_no }}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Air Conditioning</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sAirconditioning??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Heating</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->sHeating??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Fireplace</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->sHeating??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Fireplace Feature</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->szHeatingTypes??'NA'}}</strong></div>
                        </div>
                    </div>
                </div>
                <div class="wrapper  yushooph-description">
                    <div class="ff-small-heading"><strong>Exterior</strong></div>
                    <div class="w-layout-grid details-grid">
                        <div class="detail-wrap">
                            <div class="pd-text">Lot Size (SQFT)</div>
                            <div class="pd-text"><strong>{{number_format($propertyAdditionalAmenities->fLotSizeSQFT)??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Parking Features</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->szParkingFeatures??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Spa</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->sPatio??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Total Parking</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->iTotalParking??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Lot Size (Acres)</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->fLotSizeAcres??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Water Source</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->szWaterSource??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Pool</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->szPoolFeatures??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Garden</div>
                            <div class="pd-text"><strong>NA</strong></div>
                        </div>
                    </div>
                </div>
                <div class="wrapper yushooph-description">
                    <div class="ff-small-heading " ><strong>General</strong></div>
                    <div class="w-layout-grid details-grid">
                        <div class="detail-wrap">
                            <div class="pd-text">Appliances</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->szAppliances??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Architectural Style</div>
                            <div class="pd-text"><strong>NA</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Association Y/N</div>
                            <div class="pd-text"><strong>NA</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Private Pool</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sPool??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Property Condition</div>
                            <div class="pd-text"><strong>NA</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Sewer</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->szSewer??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Heating</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->sHeating??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Cooling</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->szCoolingType??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Community Features</div>
                            <div class="pd-text"><strong>{{$propertyAdditionalAmenities->szCommunityFeatures??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">More Feature</div>
                            <div class="pd-text"><strong>Answer</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Just Listed</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sJustListed??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Price Reduced</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sPriceReduced??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Views</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sViews??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">SPA</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sSpa??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Pool</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sPool??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Golf Course</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sGolfCourse??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Fireplace</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sFireplace??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Airconditioning</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sAirconditioning??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text"> Adult 55 Plus</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sAdult55Plus??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Open House</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sOpenHouse??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Deck</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sDeck??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Water Front</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sWaterFront??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Basement</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sBasement??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Master On Main</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sMasterOnMain??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Horse Property</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sHorseProperty??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Fixer Upper</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sFixerUpper??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Newly Built</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sNewlyBuilt??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Foreclosures</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sForeclosures??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Short Sales</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sShortSales??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">No HOA Fees</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sNoHOAFees??'NA'}}</strong></div>
                        </div>

                        <div class="detail-wrap">
                            <div class="pd-text">Seller Financing</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sSellerFinancing??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Furnished</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sFurnished??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Allows Pets</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->sAllowsPets??'NA'}}</strong></div>
                        </div>
                        <div class="detail-wrap">
                            <div class="pd-text">Car Garage</div>
                            <div class="pd-text"><strong>{{$propertyAmenities->s1CarGarage??'NA'}}</strong></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=============  Contact Information =============-->

          {{-- @include('livewire.frontend.property-detail.partials.property-contact-partial') --}}
        </div>
    </div>
</div>
