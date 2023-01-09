<div>
    <div class="user-profile-section">
        <div class="inner-user-profile">

           <!--======= User Header Area =======-->
           <div class="profile-wrapper user-info">
              <img src="{{auth()->user()->avatar}}" loading="lazy" sizes="(max-width: 479px) 60px, (max-width: 767px) 80px, 100px" alt="Agent Image" class="profile-image">
              <div class="info-wrap">
                 <h1 class="profile-u-name">{{auth()->user()->display_name}}</h1>
                 <div class="info-wrap fav-and-saved">
                    <div class="profile-text margin-right"><strong>{{$favorites?$favorites->count():0}}</strong> Favorites,</div>
                    <div><strong>3</strong> Saved Searches</div>
                 </div>
              </div>
           </div>
           <!--======= End User Header Area =======-->

           <!--======= Start Account List  =======-->

           <div class="account-info-list">
                <!--========== tabs  List ==========-->
                <div class="ineer_tabs">
                    <ul class="nav nav-tabs nav-tabs-03 nav-fill" id="myTab" role="tablist">
                       <li class="nav-item">
                          <a class="nav-link active" id="tab-01-tab" data-bs-toggle="tab" href="#favorites-tab-01" role="tab"
                             aria-controls="tab-01" aria-selected="true">
                             <i class="far fa-heart"></i>
                             Favorites
                          </a>
                       </li>
                       <li class="nav-item">
                          <a class="nav-link" id="tab-02-tab" data-bs-toggle="tab" href="#search-tab-02" role="tab"
                             aria-controls="tab-02" aria-selected="false">
                             <!--<i class="fa fa-search-plus" aria-hidden="true"></i>-->
                             <img src="{{ URL('frontend/images/seach-ac.svg') }}" alt="" class="dark">
                             <img src="{{ URL('frontend/images/seach-ac-white.svg') }}" alt="" class="light">
                             Saved Search
                          </a>
                       </li>
                       <li class="nav-item">
                          <a class="nav-link" id="tab-03-tab" data-bs-toggle="tab" href="#settings-tab-03" role="tab"
                             aria-controls="tab-03" aria-selected="false">
                             <i class="bi bi-gear"></i>
                             Account Settings</a>
                       </li>
                    </ul>
                 </div>
                 <!--========== End  tabs  List ==========-->
                 <div class="tab-content inner-tab" id="myTabContent">
                    <!--============= Start Favorite Tab Content =============-->
                    <div wire:ignore.self class="tab-pane fade show active" id="favorites-tab-01" role="tabpanel"
                       aria-labelledby="tab-01-tab">

                       <div class="profile-wrapper">
                          <h2 class="profile-heading">My favorite Listings</h2>
                          @if ($favorites and !$favorites->isEmpty())
                          <div class="profile-text margin-right"><strong>{{$favorites->where('sSingleStatus_cd', 'ACT')->count()}}</strong> for sale, <strong>{{$favorites->where('sSingleStatus_cd', 'PND')->count()}} </strong>pending, <strong>{{$favorites->where('sSingleStatus_cd', 'SLD')->count()}} </strong> recently sold, <strong>{{$favorites->where('sSingleStatus_cd', 'CSN')->count()}}</strong> off-market</div>
                          @endif
                          <div class="wrapper favorites">
                             <div class="w-layout-grid profile-grid favorite header">
                                <div><strong>Image</strong></div>
                                <div><strong>Address</strong></div>
                                <div><strong>Type</strong></div>
                                <div><strong>Status</strong></div>
                                <div><strong>Price</strong></div>
                                <div><strong>Actions</strong></div>
                             </div>
                             <!-- ======= Start Row =======-->
                             @if ($favorites)
                                @foreach ($favorites as $favorite)
                                <div class="w-layout-grid profile-grid favorite">
                                    <img sizes="(max-width: 479px) 87vw, (max-width: 767px) 90vw, 84vw" src="{{$favorite->image}}"
                                    onError="this.onerror=null;this.src='{{ $favorite->DefaultPhotoURL }}';"
                                    alt="Luxury Kitchen" class="fav-property-image">
                                    <div class="profile-text"><strong>{{$favorite->szAddress_nm}}</strong></div>
                                    <div class="profile-text">{{$favorite->szPropType_cd}}</div>
                                    <div class="profile-text">{{$favorite->sStatus_cd}}</div>
                                    <div class="profile-text"><strong>${{$favorite->mPrice_amt}}</strong></div>
                                    <div class="dropdown social w-dropdown">
                                       <div class="dropdown-toggle social-button w-button" id="dropdownMenuAction" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div><span><i class="bi bi-three-dots-vertical"></i></span></div>
                                       </div>
                                       <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuAction">
                                          <div class="ft-agent-info-wrap">
                                             <div class="user-action-btn">
                                                <a href="#" class="button action-button margin-bottom w-dropdown-link" wire:click.prevent="removeFavorite('{{$favorite->szMLS_no}}')" tabindex="0">Delete</a>
                                                @if ($favorite->property)
                                                <a href="{{route('public.property.property_details',['property_id'=>base64_encode($favorite->property->id)])}}" class="button action-button w-dropdown-link" tabindex="0">More Details</a>
                                                @endif
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                @endforeach
                             @endif


                          </div>
                       </div>



                    </div>
                    <!--============= Start Search Tab Content =============-->
                    <div wire:ignore.self class="tab-pane fade " id="search-tab-02" role="tabpanel" aria-labelledby="tab-02-tab">
                       <div class="profile-wrapper">
                          <h2 class="profile-heading">Saved Searches</h2>
                          <div class="wrapper saved-search">
                            @if ($searchHistory)
                                @foreach ($searchHistory as $searchHis )
                                <?php
                                $jsonString='';
                                // if ($searchHis->search_json_data and !empty($searchHis->search_json_data)) {
                                //     $decoded = json_decode($searchHis->search_json_data, true);
                                //     $jsonString=implode(',',$decoded);
                                // }
                                ?>
                                    <div class="w-layout-grid profile-grid saved-search">
                                        <div>
                                        <a href="/" class="profile-text s-search-title">{{str_replace(['{','}','[',']'],'', $searchHis->search_string) }}</a>
                                        <div class="profile-text">{{$jsonString}}</div>
                                        </div>

                                        <a wire:click.prevent="removeSearchHistory({{$searchHis->id}})" style="cursor: pointer" class="saved-search-action">
                                        <span class="fa-icon"><i class="bi bi-trash3"></i></span>
                                        <span class="ss-action-text" >Delete</span>
                                        </a>
                                    </div>
                                @endforeach
                            @endif


                          </div>
                       </div>
                    </div>
                    <!--============= Start Account Tab Content =============-->
                    <div wire:ignore.self class="tab-pane fade" id="settings-tab-03" role="tabpanel" aria-labelledby="tab-03-tab">

                       <div class="profile-wrapper">
                          <h2 class="profile-heading">Profile Setting</h2>
                          <div class="wrapper settings">
                             <div class="form-wrapper w-form">
                                <form  class="setting-form" wire:submit.prevent="profileUpdate">
                                   <div class="profile-image-wrap">
                                      <img src="{{auth()->user()->avatar}}" sizes="(max-width: 479px) 60px, (max-width: 767px) 80px, 100px"  alt="Agent Image" class="profile-image no-margins">
                                      <input type="file" class="profile-upload" accept=".jpg,.jpeg" wire:model="profile_avatar" style="display: none" name="" id="">
                                      <div class="edit-pen profile-upload-button"><i class="bi bi-pencil"></i></div>
                                   </div>
                                   <div><label for="Full-Name">Full Name</label> <label  class="input setting w-input" >{{$profile_full_name}}</label> </div>
                                   <div>
                                      <label for="My-Location">Location</label>
                                      <select class="input setting w-select">
                                         <option value="Huntington Harbour">Huntington Harbour</option>
                                         <option value="Irvine">Irvine</option>
                                         <option value="San diego">San Diego</option>
                                         <option value="Beverly Hills">Beverly Hills</option>
                                      </select>
                                   </div>
                                   <div>
                                      <label for="Email-6">Email Address</label>
                                      <input type="email" readonly class="input setting w-input" placeholder="sammason@examplesite.com" wire:model="profile_email">
                                   </div>
                                   <div>
                                      <label for="User-Name">First Name</label>
                                      <input type="text" class="input setting w-input" placeholder="smason47" wire:model="profile_first_name">
                                      @error('profile_first_name')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
                                   </div>
                                   <div>
                                    <label for="User-Name">Last Name</label>
                                    <input type="text" class="input setting w-input" placeholder="smason47" wire:model="profile_last_name">
                                    @error('profile_last_name')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
                                 </div>
                                   <div>
                                      <label for="Old-Password">Old Password</label>
                                      <input type="password" class="input setting w-input"  placeholder="xxxxxxxxxxx" wire:model="profile_password_old">
                                      @error('profile_password_old')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
                                   </div>
                                   <div>
                                      <label for="New-Password">New Password</label>
                                      <input type="password" class="input setting w-input" placeholder="xxxxxxxxxxx" wire:model="profile_password_new">
                                      @error('profile_password_new')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
                                   </div>
                                   <div>
                                      <label for="New-Password" class="alert-heading">Subscribe to be notified</label>
                                      <label class="w-checkbox checkbox-field a-setting">
                                         <input type="checkbox" class="w-checkbox-input checkbox">
                                         <span class="w-form-label" for="New-Home">New Home Alerts</span>
                                      </label>
                                      <label class="w-checkbox checkbox-field a-setting">
                                         <input type="checkbox" class="w-checkbox-input checkbox">
                                         <span class="w-form-label" for="Newsletter">Subscribe me to First Team newsletter</span>
                                      </label>
                                      <label class="w-checkbox checkbox-field a-setting">
                                         <input type="checkbox" class="w-checkbox-input checkbox">
                                         <span class="w-form-label" for="Just-Sold">Recently sold Alerts</span>
                                      </label>
                                      <label class="w-checkbox checkbox-field a-setting">
                                         <input type="checkbox" class="w-checkbox-input checkbox">
                                         <span class="w-form-label" for="Just-Listed">Just Listed Alerts</span>
                                      </label>
                                      <label class="w-checkbox checkbox-field a-setting">
                                         <input type="checkbox" class="w-checkbox-input checkbox">
                                         <span class="w-form-label" for="Coming-Soon">Coming soon alerts</span>
                                      </label>
                                      <label class="w-checkbox checkbox-field privacy">
                                         <input type="checkbox" class="w-checkbox-input checkbox">
                                         <span class="w-form-label" for="Coming-Soon-2">By submitting this form I agree to<strong> </strong>
                                            <a target="_blank" href="#" class="st-link">
                                               <strong>Terms of Use</strong>
                                            </a>
                                         </span>
                                      </label>
                                   </div>
                                   <input type="submit" value="Update Settings" class="submit-button setting w-button">
                                </form>

                             </div>
                          </div>
                          <a href="{{route('auth.logout')}}" class="button setting-logout w-button">Log Out</a>
                       </div>
                    </div>
                 </div>
              <!--=================  End City Info tabs ======================-->
           </div>

           <!--======= End Account List  =======-->


        </div>
     </div>

     <div class="loading" wire:loading>
      @include('LbsViews::utility.utility-default-loader', [env('APP_LOADER') => true])
  </div>
</div>

</div>
@push('front_scripts')

<script>

    document.addEventListener('livewire:load', function () {
        setTimeout(() => { @this.fetchFavorites();}, 100);
        setTimeout(() => { @this.fetchSearchHistory();}, 200);
    })



    $(".profile-upload-button").on('click', function() {
       $(".profile-upload").click();
    });
</script>
@endpush
