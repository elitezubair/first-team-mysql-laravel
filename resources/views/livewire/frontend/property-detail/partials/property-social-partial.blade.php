<div class="container pd-socials">
    <div class="breadcrumb-wrap">
        <a href="{{route('public.property_landing_page')}}" class="button prop-search w-button"><span class="fa-icon no-margin"><i
                    class="bi bi-chevron-left"></i></span></a>
        <div class="breadcrumb-link-wrap">
            <a href="{{route('public.property_landing_page')}}" class="breadcrumb-link">Home Search</a>
            <div class="breadcrumb-link">・</div>
            {{-- <div class="breadcrumb-link">{{ $propertyCollection->szAddress_nm }}, {{ $propertyCollection->szCity_nm }}, {{ $propertyCollection->szCounty_nm }}, {{ $propertyCollection->sState_cd }}, {{ $propertyCollection->sZip_cd }}</div> --}}
            <div class="breadcrumb-link">{{ $propertyCollection->szAddress_nm }}</div>
        </div>
    </div>
    <div class="social-buttons wrap">
        <a href="#" class="social-button w-button" data-bs-toggle="modal"
            data-bs-target="#request_modal"><span><i class="bi bi-telephone"></i></span></span></a>
        <a href="#" class="social-button w-button" data-bs-toggle="modal"
            data-bs-target="#schedule_tour_modal"><i class="bi bi-calendar"></i><span></a>
                @if (!auth()->check())
        <a href="#" data-bs-toggle="modal" data-bs-target="#login_modal" class="social-button liked w-button"><span><i class="bi bi-heart"></i></span></a>
        @elseif (auth()->check() and in_array($propertyCollection->szMLS_no, $favoriteArray))
        <a href="#" wire:click.prevent="removeFavorite('{{ $propertyCollection->szMLS_no }}')" class="social-button liked w-button"><span><i class="bi bi-heart"></i></span></a>
        @else
        <a href="#" wire:click.prevent="makeFavorite('{{ $propertyCollection->szMLS_no }}','{{ $propertyCollection->sStatus_cd }}','{{ $propertyCollection->szPropType_cd }}','{{ $propertyCollection->mListPrice_amt }}','{{ $propertyCollection->szAddress_nm }}','{{ !$propertyCollection->images->isEmpty() ? $propertyCollection->images[0]->PhotoURL : URL('frontend/images/default-cards/default_property.jpg') }}')"  class="social-button liked w-button"><span><i class="bi bi-heart"></i></span></a>
        @endif
        <div class="dropdown social w-dropdown">
            <div class="dropdown-toggle social-button w-button" id="dropdownMenuButtonShare"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div><span><i class="bi bi-share"></i></span></div>
            </div>
            <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButtonShare">
                <div class="ft-agent-info-wrap">
                    <div class="ft-agent-cta">Share on</div>
                    <div class="share-icons-wrap">
                        <a href="{{$socialMediaSharing['facebook']}}" class="social-button  ar-social-button share-icon" tabindex="0"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$socialMediaSharing['twitter']}}" class="social-button  ar-social-button share-icon" tabindex="0"><i class="fab fa-twitter"></i></a>
                        <a href="{{$socialMediaSharing['linkedin']}}" class="social-button  ar-social-button share-icon" tabindex="0"><i class="bi bi-linkedin"></i></a>
                        <a href="{{$socialMediaSharing['whatsapp']}}" class="social-button  ar-social-button share-icon" tabindex="0"><i class="fab fa-whatsapp"></i></a>
                        <a href="{{$socialMediaSharing['telegram']}}" class="social-button  ar-social-button share-icon email" tabindex="0"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



