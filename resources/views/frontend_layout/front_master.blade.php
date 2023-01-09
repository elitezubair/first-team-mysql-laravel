<!DOCTYPE html>
<html lang="en">
{{-- include frontend header --}}
@include('frontend_layout.front_header')

<body>
    <div class="wrapper">
        <!--=================================
            header -->
        <header class="header">
            {{-- include frontend navbar --}}
            @include('frontend_layout.front_navbar')

            @livewireStyles
        </header>
        <!--=================================
            header -->
        <!--=================================
            map full -->
        <section class="bg-white half-map">
            @section('content')
            @show
        </section>
    </div>
    <!--=================================
         map full -->
    </div>



    <!-- Login trigger modal -->
    <!-- Modal -->
    <div class="modal fade user_account_area" id="login_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Log In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="user_profile_form">
                        <ul class="social_login">
                            <li>
                                <a href="{{route('auth.socialite.google.redirect')}}"><i class="fab fa-google"></i> Login with Google</a>
                            </li>
                            <li>
                                <a href="{{route('auth.socialite.facebook.redirect')}}"><i class="fab fa-facebook-f"></i> Login with Facebook</a>
                            </li>
                            <li>
                                <a href="{{route('auth.socialite.linkedin.redirect')}}"><i class="fab fa-linkedin-in"></i> Login with LinkedIn</a>
                            </li>
                        </ul>
                        @livewire('frontend.auth.sign-in-component')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login trigger modal -->
    <!-- Register trigger modal -->
    <!-- Modal -->
    <div class="modal fade user_account_area" id="register_modal" wire:ignore.self tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="msg"></span>
                <div class="user_profile_form">
                    <ul class="social_login">
                        <li>
                            <a href="{{route('auth.socialite.google.redirect')}}"><i class="fab fa-google"></i> Login with Google</a>
                        </li>
                        <li>
                            <a href="{{route('auth.socialite.facebook.redirect')}}"><i class="fab fa-facebook-f"></i> Login with Facebook</a>
                        </li>
                        <li>
                            <a href="{{route('auth.socialite.linkedin.redirect')}}"><i class="fab fa-linkedin-in"></i> Login with LinkedIn</a>
                        </li>
                    </ul>
                    @livewire('frontend.auth.sign-up-component')
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="loading  loader-hidden" id="loading-container" >
        @include('LbsViews::utility.utility-default-loader',[env('APP_LOADER')=>true])
    </div>
    {{-- include frontend footer --}}

    @livewireScripts

    @include('frontend_layout.front_footer')

<script>

</script>
</body>


</html>
