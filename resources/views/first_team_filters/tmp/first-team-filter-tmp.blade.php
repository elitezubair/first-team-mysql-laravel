<div class="container filter_popup">
        <div class="modal left fade" id="filterModal" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body " id="style-3">
                        <!-- header -->
                        <div class="top-wrapper filter-header">
                            <div class="close-button btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                                    src="{{ URL('frontend/images/close.svg') }}" width="22px" alt=""></div>
                            <h3 class="details-heading description">Filters</h3>
                            <div class="search-total">Search {{$total_property}} Properties</div>
                        </div>
                        <!-- content -->
                        <?php
                        $filter_count=1;
                        if($county)
                        {
                            $filter_count++;
                        }
                        if($property_type)
                        {
                            $filter_count++;
                        }
                        if($bedroom1 || $bedroom2 || $bedroom3 || $bedroom4 || $bedroom5plus)
                        {
                            $filter_count++;
                        }
                        if($bathroom1 || $bathroom2 || $bathroom3 || $bathroom4 || $bathroom5plus)
                        {
                            $filter_count++;
                        }
                        if($carspace1 || $carspace2 || $carspace3 || $carspace4 || $carspace5plus)
                        {
                            $filter_count++;
                        }
                        if($just_listed || $adult55 || $views || $pool || $waterfront || $fixerupper || $horse_property || $newly_built || $seller_finiancing || $fore_closure || $nohoefee || $s1story || $s2stories || $s3stories || $sFireplace || $sBasement || $master_onMain || $sAirconditioning || $sDeck || $sFurnished || $sAllowsPets || $sGolfCourse)
                        {
                            $filter_count++;
                        }
                        ?>
                        <input type="hidden" name="filter_count" id="filter_count" value="{{$filter_count}}">
                        <div class="bottom-wrapper filters">
                            <div class="form-container w-container">
                                <div class="filter-wrapper">
                                    <div class="w-form">
                                        <form id="wf-form-Filter-Form" name="wf-form-Filter-Form"
                                            data-name="Filter Form" method="get" class="form filter-wrap"
                                            aria-label="Filter Form">
                                            <div class="filter-group-wrap">
                                                <div class="filter-heading-text">Price Range</div>
                                                <div class="price-range-wrap" wire:ignore>
                                                    <div id="histogramSlider"></div>
                                                </div>

                                                <div class="contact-form-grid min-max-price">
                                                    <div>
                                                        <input  id="minimum-price-slider" type="text" class="input w-select" id="min_price">
                                                    </div>
                                                    <div class="min-max-divider"></div>
                                                    <div>
                                                        <input  id="maximum-price-slider" type="text" class="input w-select" id="max_price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-group-wrap">
                                                <div class="filter-heading-text">Counties</div>
                                                <div class="filter-card-grid">
                                                    @foreach($county as $county_key=>$county_value)
                                                    @if(!empty($county_value->county))
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('counties', '{{$county_value->county}}')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">{{$county_value->county}}</span></label>
                                                        <div class="available-prop-total">{{number_format($county_name[$county_value->county])}}</div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="filter-group-wrap">
                                                <div class="filter-heading-text">Property Type</div>
                                                <div class="filter-card-grid">
                                                    @foreach($property_type as $property_type_key=>$property_type_value)
                                                    @if(!empty($property_type_value->property_type))
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', '{{$property_type_value->property_type}}')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">{{$property_type_value->property_type}}</span></label>
                                                        <div class="available-prop-total">{{number_format($property_type_name[$property_type_value->property_type])}}</div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="filter-group-wrap">
                                                <div class="filter-heading-text">Bedrooms</div>
                                                <div class="filter-card-grid">
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bedroom',1)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">1</span></label>
                                                        <div class="available-prop-total" >{{number_format($bedroom1)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bedroom',2)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">2</span></label>
                                                        <div class="available-prop-total">{{number_format($bedroom2)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bedroom',3)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">3</span></label>
                                                        <div class="available-prop-total">{{number_format($bedroom3)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bedroom',4)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">4</span></label>
                                                        <div class="available-prop-total">{{number_format($bedroom4)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bedroom',5)"
                                                                type="checkbox" id="checkbox-11"
                                                                name="checkbox-11" data-name="Checkbox 11"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="checkbox-11">5+</span></label>
                                                        <div class="available-prop-total">{{number_format($bedroom5plus)}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-group-wrap">
                                                <div class="filter-heading-text">Bathrooms</div>
                                                <div class="filter-card-grid">
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bathroom',1)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">1</span></label>
                                                        <div class="available-prop-total">{{number_format($bathroom1)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bathroom',2)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">2</span></label>
                                                        <div class="available-prop-total">{{number_format($bathroom2)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bathroom',3)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">3</span></label>
                                                        <div class="available-prop-total">{{number_format($bathroom3)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bathroom',4)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">4</span></label>
                                                        <div class="available-prop-total">{{number_format($bathroom4)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bathroom',5)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">5+</span></label>
                                                        <div class="available-prop-total">{{number_format($bathroom5plus)}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-group-wrap">
                                                <div class="filter-heading-text">Car Spaces</div>
                                                <div class="filter-card-grid">
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('carspace',1)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">1</span></label>
                                                        <div class="available-prop-total">{{number_format($carspace1)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('carspace',2)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">2</span></label>
                                                        <div class="available-prop-total">{{number_format($carspace2)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('carspace',3)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">3</span></label>
                                                        <div class="available-prop-total">{{number_format($carspace3)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('carspace',4)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">4</span></label>
                                                        <div class="available-prop-total">{{number_format($carspace4)}}</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('carspace',5)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">5+</span></label>
                                                        <div class="available-prop-total">{{number_format($carspace5plus)}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-group-wrap property_facts">
                                                <div class="filter-heading-text">Property Facts</div>
                                                <div class="contact-form-grid min-max-price">
                                                    <div><label id="contact-first-name" for="Min-SQFT-2"
                                                            class="field-label">Min SQFT</label><input
                                                            wire:keyup="onCheckBoxes('min_square_ft',$event.target.value)"
                                                            type="text" class="input w-input filter_inout_range" maxlength="256"
                                                            name="Min-SQFT-2" data-name="Min SQFT 2"
                                                            placeholder="Min SQFT" id="Min-SQFT-2" required="">
                                                    </div>
                                                    <div class="min-max-divider"></div>
                                                    <div><label id="contact-last-name" for="Max-SQFT-2"
                                                            class="field-label">Max SQFT</label><input
                                                            wire:keyup="onCheckBoxes('max_square_ft',$event.target.value)"
                                                            type="text" class="input w-input filter_inout_range" maxlength="256"
                                                            name="Max-SQFT-2" data-name="Max SQFT 2"
                                                            placeholder="Max SQFT" id="Max-SQFT-2" required="">
                                                    </div>
                                                </div>
                                                <div class="contact-form-grid min-max-price">
                                                    <div><label id="contact-email" for="Min-Year-Built-2"
                                                            class="field-label">Min Year Built</label><input
                                                            wire:keyup="onCheckBoxes('min_built_year',$event.target.value)"
                                                            type="text" class="input w-input filter_inout_range" maxlength="256"
                                                            name="Min-Year-Built-2" data-name="Min Year Built 2"
                                                            placeholder="Min Year Built" id="Min-Year-Built-2"
                                                            required=""></div>
                                                    <div class="min-max-divider"></div>
                                                    <div><label id="contact-phone" for="Max-Year-Built-2"
                                                            class="field-label">Max Year Built</label><input
                                                            wire:keyup="onCheckBoxes('max_built_year',$event.target.value)"
                                                            type="text" class="input w-input filter_inout_range" maxlength="256"
                                                            name="Max-Year-Built-2" data-name="Max Year Built 2"
                                                            placeholder="Max Year Built" id="Max-Year-Built-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-group-heading">Property Amenities</div>
                                            <div class="filter-group-wrap">
                                                <div class="filter-card">
                                                    <div class="small-filter-group-heading">General Options</div>
                                                    <div class="filter-card-grid lite-bg">
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sJustListed')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Just Listed</span></label>
                                                            <div class="available-prop-total">{{ number_format($just_listed)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sAdult55Plus')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Adult 55+</span></label>
                                                            <div class="available-prop-total">{{number_format($adult55)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sWaterFront')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Water Front</span></label>
                                                            <div class="available-prop-total">{{number_format($waterfront)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sFixerUpper')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Fixer Upper</span></label>
                                                            <div class="available-prop-total">{{number_format($fixerupper)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sHorseProperty')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Horse Property</span></label>
                                                            <div class="available-prop-total">{{number_format($horse_property)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sViews')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Views</span></label>
                                                            <div class="available-prop-total">{{number_format($views)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sNewlyBuilt')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Newly Built</span></label>
                                                            <div class="available-prop-total">{{number_format($newly_built)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sGolfCourse')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Golf Course</span></label>
                                                            <div class="available-prop-total">{{number_format($sGolfCourse)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sPool')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Pool</span></label>
                                                            <div class="available-prop-total">{{number_format($pool)}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-card">
                                                    <div class="filter-card">
                                                        <div class="small-filter-group-heading">Financial Options
                                                        </div>
                                                    </div>
                                                    <div class="filter-card-grid lite-bg">
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sSellerFinancing')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Seller Financing</span></label>
                                                            <div class="available-prop-total">{{number_format($seller_finiancing)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sForeclosures')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Forecloses</span></label>
                                                            <div class="available-prop-total">{{number_format($fore_closure)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sNoHOAFees')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">No HOA Fees</span></label>
                                                            <div class="available-prop-total">{{number_format($nohoefee)}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-card">
                                                    <div class="small-filter-group-heading">Structural Options</div>
                                                    <div class="filter-card-grid lite-bg">
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','s1Storey')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">1 Story</span></label>
                                                            <div class="available-prop-total">{{number_format($s1story)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','s2Stories')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">2 Story</span></label>
                                                            <div class="available-prop-total">{{number_format($s2stories)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','s3Stories')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">3 Story</span></label>
                                                            <div class="available-prop-total">{{number_format($s3stories)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sFireplace')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Fireplace</span></label>
                                                            <div class="available-prop-total">{{number_format($sFireplace)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sBasement')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Basement</span></label>
                                                            <div class="available-prop-total">{{number_format($sBasement)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sMasterOnMain')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Master on Main</span></label>
                                                            <div class="available-prop-total">{{number_format($master_onMain)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sAirconditioning')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Air Conditioned</span></label>
                                                            <div class="available-prop-total">{{number_format($sAirconditioning)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sDeck')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Deck</span></label>
                                                            <div class="available-prop-total">{{number_format($sDeck)}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-card">
                                                    <div class="small-filter-group-heading">Rental Options</div>
                                                    <div class="filter-card-grid lite-bg">
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sFurnished')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Furnished</span></label>
                                                            <div class="available-prop-total">{{number_format($sFurnished)}}</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sAllowsPets')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Allows Pets</span></label>
                                                            <div class="available-prop-total">{{number_format($sAllowsPets)}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-group-wrap keywords" wire:ignore>
                                                <div class="filter-heading-text">Keywords</div>
                                                <input type="text" class="input w-input" maxlength="256" name="mlstags" data-name="First Name 2" placeholder="MLS #" id="mlstags" required="">
                                            </div>
                                            <div class="filter-group-wrap">
                                            <div class="filter-heading-text">Show Agency Only Listings</div>
                                            <div class="filter-card-grid"><label class="radio-button-field w-radio"><input type="radio" id="No" name="Agency-Only-Listings"  wire:model="filter_agency" value="no" data-name="Agency Only Listings" class="w-form-formradioinput radio-button w-radio-input"><span class="w-form-label" for="No">No</span></label><label class="radio-button-field w-radio"><input type="radio" id="Yes" name="Agency-Only-Listings"  wire:model="filter_agency" value="yes"  data-name="Agency Only Listings" class="w-form-formradioinput radio-button w-radio-input"><span class="w-form-label" for="Yes">Yes</span></label></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="top-wrapper filter-bottom">
                                    <div class="w-layout-grid filter-grid-bottom">

                                        <button class="filter-reset w-button" style="display: none" id="removeAllTagsmlstagify">Clear tagss</button>
                                        <a href="" class="filter-reset w-button" onclick="refreshPage()">Clear Filters</a>
                                        <a href="" class="submit-filter-button w-button" wire:click="executeFilters"  data-bs-dismiss="modal" aria-label="Close">Done</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


