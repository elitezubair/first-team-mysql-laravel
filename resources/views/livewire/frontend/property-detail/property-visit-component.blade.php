<div>
    <form class="schedule-tour-form" wire:submit.prevent="submit_visiting_form">
        <div class="small-heading">Schedule a tour</div>
        <div class="schedule-tour-section">
            <div class="owl-carousel" data-animateOut="fadeOut" data-nav-arrow="true" data-items="5"
                data-md-items="5" data-sm-items="5" data-xs-items="3" data-xx-items="4" data-space="0"
                data-loop="false" data-autoplay="false" wire:ignore>

                @if ($dateRange)
                    @foreach ($dateRange as $key => $dateShow)
                    <div class="item" wire:click="setScheduledDate('{{$dateShow}}')">
                        <div class="st-card">
                            <input type="radio" id="radio{{$dateRangeAttrition}}{{$key}}" name="selector" class="selector-item_radio"
                                checked>
                            <label for="radio{{$dateRangeAttrition}}{{$key}}" class="selector-item_label">
                                <div class="st-text">{{date_format($dateShow, 'D')}}</div>
                                <div class="st-text"><strong>{{date_format($dateShow, 'd')}}</strong></div>
                                <div class="st-text">{{date_format($dateShow, 'M')}}</div>
                            </label>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <br>
            @error('scheduled_date')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="st-heading margin-top">Tour Type</div>
        <div class="w-layout-grid person-video-grid">
            <a href="#" class="button st-buttons w-button {{$tour_type=='In-Person' ? 'active' : ''}}" wire:click="$set('tour_type','In-Person')">In-Person</a>
            <a href="#" class="button st-buttons w-button {{$tour_type=='Video-Tour' ? 'active' : ''}}" wire:click="$set('tour_type','Video-Tour')">Video Tour</a>
        </div>
        <div>
            <select id="Time-5" name="Time-5" data-name="Time 5" class="input w-select"  wire:model.defer="scheduled_time">
                <option value="">Select Time</option>
                <option value="9:00">9:00 AM</option>
                <option value="10:00">10:00 AM</option>
                <option value="11:30">11:30 AM</option>
                <option value="13:30">1: 30 PM</option>
                <option value="14:30">2: 30 PM</option>
            </select>
            @error('scheduled_time')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        </div>
        <div>
            <input type="text" class="input w-input form-control" placeholder="First Name"  wire:model.defer="first_name">
            @error('first_name')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        </div>
        <div>
            <input type="text" class="input w-input form-control" placeholder="Last Name"   wire:model.defer="last_name">
            @error('last_name')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        </div>
        <div>
            <input type="email" class="input w-input form-control" placeholder="Email"   wire:model.defer="email">
            @error('email')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        </div>
        <div>
            <input type="tel" class="input w-input form-control" placeholder="Phone Number"   wire:model.defer="phone">
            @error('phone')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        </div>
        <div>
            <textarea id="Message-5" name="Message-5" placeholder="Enter your message" class="text-area w-input form-control"   wire:model.defer="description"></textarea>
            @error('description')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        </div>
        <input type="submit" value="Submit A Tour Request" class="button fullwidth w-button">
        <label class="w-checkbox checkbox-field st-term-of-use">
            <input type="checkbox" name="Checkbox" required=""
                class="w-checkbox-input checkbox-2"   wire:model.defer="tnc">
            <span class="checkbox-label w-form-label" for="Checkbox">By
                submitting this form I agree to<strong> </strong>
                <a href="{{route('public.property.terms_condition')}}" target="_blank" class="st-link">
                    <strong class="bold-600">Terms of Use</strong>
                </a>
            </span>
        </label>
        @error('tnc')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
    </form>
</div>
