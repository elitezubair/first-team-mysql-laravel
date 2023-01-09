<div>
    <form wire:submit.prevent="submit_enquiry_form">
        <div class="small-heading">Enquire About This Property</div>
        <div class="col-lg-12">
            <div class="form-des"> All questions are texted in
                real time to our agents to ensure the fastest
                response possible.</div>
        </div>
        <div class="pd-form row">

            <div class="col-lg-6">
                <input type="text" class="input-2 w-input form-control"
                    placeholder="Enter Your Name" wire:model.defer="name">
                    @error('name')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-6">
                <input type="email" class="input-2 w-input form-control" placeholder="Email" wire:model.defer="email">
                @error('email')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-6">
                <input type="tel" class="input-2 w-input form-control"
                    placeholder="Phone Number" wire:model.defer="phone">
                    @error('phone')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-6">
                <select id="I-am-A-2" class="input-2 w-select form-control" wire:model.defer="type">
                    <option value="" >I am A ...</option>
                    <option value="Buyer">Buyer</option>
                    <option value="Agent">Agent</option>
                    <option value="11:30 AM">Tenant</option>
                </select>
                @error('type')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-12">
                <textarea id="Message-4" placeholder="Enter your message" class="text-area-2 large w-input form-control" wire:model.defer="description"></textarea>
                @error('description')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-6">
                <input type="submit" value="Submit Your Request" class="button-2 square w-button">
            </div>

        </div>
        <label class="w-checkbox checkbox-field st-term-of-use">
            <input type="checkbox" id="checkbox-3" class="w-checkbox-input checkbox-2" wire:model.defer="tnc">
            <span class="checkbox-label w-form-label" for="checkbox-3">By submitting this form I
                agree
                to<strong> </strong>
                <a href="{{route('public.property.terms_condition')}}" target="_blank" class="st-link-2">
                    <strong class="bold-600">Terms of Use</strong>
                </a>
            </span>
        </label>
        @error('tnc')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
    </form>
</div>
