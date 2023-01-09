<div>
    @if(!$verify_flag)
    <div class="menual_login">
        <h3>Signup with Username | Email</h3>
        <form wire:submit.prevent="submit_form">

        <input type="text" class="form-control" placeholder="First Name" wire:model.defer="first_name">
        @error('first_name')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        <input type="text" class="form-control" placeholder="Last Name" wire:model.defer="last_name">
        @error('last_name')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        <input type="email" class="form-control" placeholder="Email" wire:model.defer="email">
        @error('email')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        <input type="password" class="form-control" placeholder="Password" wire:model.defer="password">
        @error('password')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
        <button type="submit" class="btn">
            Sign Up
        </button>
        </form>
        <p>
            Don't have account? <a href="#" data-bs-toggle="modal"
            data-bs-target="#login_modal">Login here</a>
        </p>
    </div>
    @else

    <div class="menual_login">
        <h3>Verify OTP | Email</h3>
        <form wire:submit.prevent="verifyOTP">

        <input type="number" class="form-control" placeholder="OTP" wire:model.defer="otp">
        @error('otp')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror

        <p>
            OTP not recived ? <a href="#" wire:click.prevent="resendOTP">Resend OTP</a>
        </p>
        <button type="submit" class="btn">
            Verify
        </button>
        </form>
        <p>
            already have account? <a href="#" data-bs-toggle="modal"
            data-bs-target="#login_modal">Login here</a>
        </p>
    </div>
    @endif

    <div class="loading" wire:loading>
        @include('LbsViews::utility.utility-default-loader', [env('APP_LOADER') => true])
    </div>
</div>
