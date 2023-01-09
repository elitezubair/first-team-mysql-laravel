<div>
    <div class="card-body">
        <div class="login_log text-center"><img src="{{lbsUploadedAsset((int)env('APP_LOGO'),'thumb')}}" alt="logo"></div>
        <p class="login-box-msg"> {{lbsTranslate('sign in')}}</p>

        <form wire:submit.prevent="tryAuthorization">
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
            <div class="input-group mb-3">
                <input wire:model.defer="password" type="password" class="form-control" placeholder="{{lbsTranslate('password')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <br>
                @error('password') <span class="error invalid-feedback ">{{ $message }}</span>@enderror
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input wire:model.defer="rememberMe"  type="checkbox" id="remember">
                        <label for="remember">
                            {{lbsTranslate('Remember Me')}}
                        </label>
                    </div>
                </div>
            </div>
            <div class="social-auth-links text-center mt-2 mb-3">
                <button type="submit" class="btn btn-primary btn-block">{{lbsTranslate('Sign In')}}</button>
            </div>
        </form>

        <div class="row">
            <div class="col-12 text-right">
               <a href="{{route('lbs.auth.admin.forget.password')}}"> {{lbsTranslate('Foreget Password')}}</a>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
