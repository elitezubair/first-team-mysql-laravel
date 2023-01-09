<div class="container filter_popup">
        <div class="modal left fade" id="filterModal" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body " id="style-3">
                        <!-- header -->
                        <div class="top-wrapper filter-header">
                            <div class="close-button btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                                    src="https://mysql-first-team.ml/frontend/images/close.svg" width="22px" alt=""></div>
                            <h3 class="details-heading description">Filters</h3>
                            <div class="search-total">Search 0 Properties</div>
                        </div>
                        <!-- content -->
                                                <input type="hidden" name="filter_count" id="filter_count" value="7">
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
                                                                                                                                                                                                                                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('counties', 'Kern')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">Kern</span></label>
                                                        <div class="available-prop-total">2,138</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('counties', 'Los Angeles')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">Los Angeles</span></label>
                                                        <div class="available-prop-total">61,195</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('counties', 'Orange')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">Orange</span></label>
                                                        <div class="available-prop-total">24,538</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('counties', 'Riverside')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">Riverside</span></label>
                                                        <div class="available-prop-total">30,369</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('counties', 'San Bernardino')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">San Bernardino</span></label>
                                                        <div class="available-prop-total">50,921</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('counties', 'San Diego')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">San Diego</span></label>
                                                        <div class="available-prop-total">22,377</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('counties', 'Ventura')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">Ventura</span></label>
                                                        <div class="available-prop-total">6,251</div>
                                                    </div>
                                                                                                                                                        </div>
                                            </div>
                                            <div class="filter-group-wrap">
                                                <div class="filter-heading-text">Property Type</div>
                                                <div class="filter-card-grid">
                                                                                                                                                            <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'CABN')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">CABN</span></label>
                                                        <div class="available-prop-total">184</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'CONDO')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">CONDO</span></label>
                                                        <div class="available-prop-total">24,067</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'COOP')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">COOP</span></label>
                                                        <div class="available-prop-total">675</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'DUPL')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">DUPL</span></label>
                                                        <div class="available-prop-total">467</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'FOUR')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">FOUR</span></label>
                                                        <div class="available-prop-total">34</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'HSE')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">HSE</span></label>
                                                        <div class="available-prop-total">131,620</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'LAND')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">LAND</span></label>
                                                        <div class="available-prop-total">18,199</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'MOBIL')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">MOBIL</span></label>
                                                        <div class="available-prop-total">5,316</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'OYO')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">OYO</span></label>
                                                        <div class="available-prop-total">3</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'RENT')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">RENT</span></label>
                                                        <div class="available-prop-total">2,003</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'RI')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">RI</span></label>
                                                        <div class="available-prop-total">5,804</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'TIME')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">TIME</span></label>
                                                        <div class="available-prop-total">8</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'TRIP')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">TRIP</span></label>
                                                        <div class="available-prop-total">86</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'TWNH')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">TWNH</span></label>
                                                        <div class="available-prop-total">7,019</div>
                                                    </div>
                                                                                                                                                                                                                <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                         wire:click="onCheckBoxes('property_type', 'UNK')"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">UNK</span></label>
                                                        <div class="available-prop-total">2,421</div>
                                                    </div>
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
                                                        <div class="available-prop-total" >9,349</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bedroom',2)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">2</span></label>
                                                        <div class="available-prop-total">40,593</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bedroom',3)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">3</span></label>
                                                        <div class="available-prop-total">65,533</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bedroom',4)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">4</span></label>
                                                        <div class="available-prop-total">39,741</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bedroom',5)"
                                                                type="checkbox" id="checkbox-11"
                                                                name="checkbox-11" data-name="Checkbox 11"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="checkbox-11">5+</span></label>
                                                        <div class="available-prop-total">15,358</div>
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
                                                        <div class="available-prop-total">23,248</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bathroom',2)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">2</span></label>
                                                        <div class="available-prop-total">58,895</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bathroom',3)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">3</span></label>
                                                        <div class="available-prop-total">26,251</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bathroom',4)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">4</span></label>
                                                        <div class="available-prop-total">5,087</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('bathroom',5)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">5+</span></label>
                                                        <div class="available-prop-total">5,472</div>
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
                                                        <div class="available-prop-total">10,732</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('carspace',2)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">2</span></label>
                                                        <div class="available-prop-total">59,491</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('carspace',3)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">3</span></label>
                                                        <div class="available-prop-total">13,062</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('carspace',4)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">4</span></label>
                                                        <div class="available-prop-total">6,407</div>
                                                    </div>
                                                    <div class="filter-info-card">
                                                        <label class="w-checkbox checkbox-field"><input
                                                        wire:click="onCheckBoxes('carspace',5)"
                                                                type="checkbox" name="Checkbox"
                                                                data-name="Checkbox"
                                                                class="w-checkbox-input checkbox"><span
                                                                class="checkbox-label w-form-label"
                                                                for="Checkbox">5+</span></label>
                                                        <div class="available-prop-total">6,825</div>
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
                                                            <div class="available-prop-total">3,656</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sAdult55Plus')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Adult 55+</span></label>
                                                            <div class="available-prop-total">46</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sWaterFront')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Water Front</span></label>
                                                            <div class="available-prop-total">55</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sFixerUpper')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Fixer Upper</span></label>
                                                            <div class="available-prop-total">239</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sHorseProperty')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Horse Property</span></label>
                                                            <div class="available-prop-total">608</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sViews')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Views</span></label>
                                                            <div class="available-prop-total">18,538</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sNewlyBuilt')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Newly Built</span></label>
                                                            <div class="available-prop-total">646</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sGolfCourse')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Golf Course</span></label>
                                                            <div class="available-prop-total">0</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sPool')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Pool</span></label>
                                                            <div class="available-prop-total">5,513</div>
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
                                                            <div class="available-prop-total">385</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sForeclosures')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Forecloses</span></label>
                                                            <div class="available-prop-total">19</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sNoHOAFees')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">No HOA Fees</span></label>
                                                            <div class="available-prop-total">240</div>
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
                                                            <div class="available-prop-total">0</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','s2Stories')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">2 Story</span></label>
                                                            <div class="available-prop-total">0</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','s3Stories')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">3 Story</span></label>
                                                            <div class="available-prop-total">0</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sFireplace')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Fireplace</span></label>
                                                            <div class="available-prop-total">23,474</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sBasement')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Basement</span></label>
                                                            <div class="available-prop-total">971</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sMasterOnMain')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Master on Main</span></label>
                                                            <div class="available-prop-total">31</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sAirconditioning')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Air Conditioned</span></label>
                                                            <div class="available-prop-total">0</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sDeck')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Deck</span></label>
                                                            <div class="available-prop-total">11,362</div>
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
                                                            <div class="available-prop-total">3,919</div>
                                                        </div>
                                                        <div class="filter-info-card">
                                                            <label class="w-checkbox checkbox-field"><input
                                                            wire:click="onCheckBoxes('aminities','sAllowsPets')"
                                                                    type="checkbox" name="Checkbox"
                                                                    data-name="Checkbox"
                                                                    class="w-checkbox-input checkbox"><span
                                                                    class="checkbox-label w-form-label"
                                                                    for="Checkbox">Allows Pets</span></label>
                                                            <div class="available-prop-total">360</div>
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


