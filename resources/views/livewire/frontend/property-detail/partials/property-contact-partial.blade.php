<div class="contact--schedule-schedule">
    <div class="row">
        <!--=============  Contact Information =============-->
        <div class="col-lg-8">
            <div class="property-detail-card">
                <div class="pd-card-header-wrap">
                    <h3 class="card-heading">Contact Information</h3>
                </div>

                <div class="wrapper">
                    <div class="clac-fom-grid desc-contact">
                        <img sizes="(max-width: 479px) 100vw, (max-width: 767px) 60px, (max-width: 991px) 200px, 20vw"
                            src="{{$propertyAgentRoster->ImagePath?$propertyAgentRoster->ImagePath  : 'https://realestate.firstteam.com/wp-content/plugins/ft-idx-sync/assets/images/ft-default.png'}}" alt="Agent Image" class="agent-picture">
                        <div>
                            <div class="listing-agent-name contact">{{$propertyAgentRoster->firstname?$propertyAgentRoster->firstname : 'First Team'}}</div>
                            @if ($propertyAgentRoster->license)
                            <div class="agent-contact-info-card">
                                <div>License:&nbsp;</div>
                                <div>{{$propertyAgentRoster->license?$propertyAgentRoster->license : 'Info Not Found'}}</div>
                            </div>
                            @endif

                            <div class="agent-contact-info-card">
                                <div>Phone:&nbsp;</div>
                                <a href="tel:" class="agent-contact-info-link">{{$propertyAgentRoster->MobileNo_code?$propertyAgentRoster->MobileNo_code.' '. $propertyAgentRoster->MobileNo  : '+1 (949) 822-8804'}}</a>
                            </div>
                            <div class="agent-contact-info-card">
                                <div>Email:&nbsp;</div>
                                <a href="mailto:" class="agent-contact-info-link">{{$propertyAgentRoster->email?$propertyAgentRoster->email  : 'info@firstteam.com'}}</a>
                            </div>
                            <div class="agent-contact-info-card">
                                <div>Website:&nbsp;</div>
                                <a href="{{$propertyAgentRoster->WebSite?$propertyAgentRoster->WebSite  : '#'}}" target="_blank" class="agent-contact-info-link">Visit Website</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-wrapper request-info w-form">
                            @livewire('frontend.property-detail.property-enquiry-component', ['property_id'=>$propertyCollection->id, 'szAddress_nm'=>$propertyCollection->szAddress_nm, 'szMLS_no'=>$propertyCollection->szMLS_no])
                    </div>
                </div>
            </div>
        </div>
        <!--=============  End Contact Information =============-->
        <!--============== Schedule a tour ===============-->
        <div class="col-lg-4">
            <div class="schedule-tour-wrapper sticky">
                <div class="form-wrapper w-form">
                    @livewire('frontend.property-detail.property-visit-component', ['dateRangeAttrition'=>0,'property_id'=>$propertyCollection->id, 'szAddress_nm'=>$propertyCollection->szAddress_nm, 'szMLS_no'=>$propertyCollection->szMLS_no])
                </div>
            </div>
        </div>
        <!--============== End Schedule a tour ===============-->
    </div>
</div>
