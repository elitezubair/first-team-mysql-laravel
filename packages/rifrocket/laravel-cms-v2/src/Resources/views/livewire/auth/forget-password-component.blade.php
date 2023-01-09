<div>
    <div class="card-body">
        <div class="login_log text-center"><img src="{{lbsUploadedAsset((int)env('APP_LOGO'),'thumb')}}" alt="logo"></div>
        <p class="login-box-msg">Sign in</p>
        @if (!$flag)
        <form wire:submit.prevent="sendOTP">
            <div class="input-group mb-3">
                <input wire:model.defer="email" type="email" class="form-control" placeholder="{{lbsTranslate('email')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <br>
                @error('email') <span class="error invalid-feedback ">{{ $message }}</span> @enderror
            </div>
            <div class="social-auth-links text-center mt-2 mb-3">
                <button type="submit" class="btn btn-primary btn-block">{{lbsTranslate('send otp')}}</button>
            </div>
        </form>
        <div class="row">
            <div class="col-12 text-right">
               <a href="{{route('lbs.auth.admin.login')}}">back to {{lbsTranslate('Sign In')}}</a>
            </div>
        </div>
        @endif

        @if ($flag)
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="otp">{{lbsTranslate('Enter OTP')}}</label>
                        <input type="text" class="form-control" id="otp" placeholder="enter OTP" wire:model='otp'>
                        @error('otp') <span class="error invalid-feedback ">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">{{lbsTranslate('New Password')}}</label>
                        <input type="password" class="form-control" id="password" placeholder="enter password"  wire:model='password'>
                        @error('password') <span class="error invalid-feedback ">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="confirm_password">{{lbsTranslate('Confirm Password')}}</label>
                        <input type="password" class="form-control" id="confirm_password" placeholder="confirm passowrd"  wire:model='confirm_password'>
                        @error('confirm_password') <span class="error invalid-feedback ">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-12 text-right">
                    <a href="javascript:void(0)" wire:click='sendOTP'> {{lbsTranslate('resend OTP')}}</a>
                </div>
                <div class="col-md-12">
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="button" wire:click='resetPassword' class="btn btn-primary btn-block">{{lbsTranslate('reset password')}}</button>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- /.card-body -->


</div>
