<nav class="navbar navbar-light bg-white navbar-static-top navbar-expand-lg header-sticky">
    <div class="container-fluid">
       <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i
          class="fas fa-align-left"></i></button>
       <a class="navbar-brand" href="{{route('public.property_landing_page')}}">
       <img class="img-fluid" src="{{URL('frontend/images/logo.png')}}" alt="logo">
       </a>
       <div class="navbar-collapse collapse justify-content-center">
          <ul class="nav navbar-nav">
             <li class="nav-item {{Request::is('/')?'active':''}}"  >
                <a class="nav-link" href="{{route('public.property_landing_page')}}">Home Search </a>
             </li>
             <li class="nav-item {{Request::is('search-map')?'active':''}}"  >
                <a class="nav-link" href="{{route('public.property.map_search')}}">Map Search </a>
             </li>
             <li class="nav-item {{Request::is('city-videos')?'active':''}}"  >
                <a class="nav-link" href="{{route('public.property.city_videos')}}">City Videos </a>
             </li>
             <li class="nav-item  {{Request::is('city-info')?'active':''}}">
                <a class="nav-link" href="{{route('public.property.city_info')}}">City Info </a>
             </li>
             <li class="nav-item {{Request::is('news')?'active':''}}">
                <a class="nav-link" href="{{route('public.property.city_news')}}">News </a>
             </li>
          </ul>
       </div>
       <div class="right_item">
        @if (!auth()->check())
          <div class="login-user">
             <a href="#" data-bs-toggle="modal" data-bs-target="#login_modal"><i class="fas fa-user ps-2" style="color: white !important;"></i></a>
          </div>
          @endif
          @if (auth()->check())
          <div class="dropdown d-inline-block ps-2 ps-md-0 user_dropdown">
            <a class="dropdown-toggle" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">
            <img src="{{auth()->user()->avatar}}" alt="">
            </a>
            <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
               <div class="user-info">
                  <img src="{{auth()->user()->avatar}}" alt="">
                  <h6>
                     <b>{{auth()->user()->display_name}} </b>
                     <br>
                     {{-- <span>{{auth()->user()->email}}</span> --}}
                  </h6>
               </div>
               <div class="user-dash">
                  <a class="dropdown-item" href="{{route('authorized.user.dashboard')}}">Dashboard</a>
                  <a class="dropdown-item" href="{{route('authorized.user.dashboard')}}">Account Settings</a>
               </div>
               <div class="sign-out">
                  <a class="dropdown-item" href="{{route('auth.logout')}}">Sign out</a>
               </div>
            </div>
         </div>
          @endif

          <div class="external_link d-lg-block d-none">
             <a href="https://www.homeownersfirst.com/" target="_blank">
             <img src="{{URL('frontend/images/homeowners-first-logo.png')}}" alt="">
             </a>
          </div>
       </div>
    </div>
 </nav>
