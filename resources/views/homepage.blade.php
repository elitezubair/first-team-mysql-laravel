@extends('partials_homepage.front_master')
@section('page_title','home page')
@section('content')


<div class="container-fluid">
    <div class="row ">
        <div class="col-lg-4 left_bar">
            <div class="property-search-field">
                <div class="property-search-item">
                    <!--=============  Search Form ============-->
                    <div class="search-wrapper">
                        <form class="row basic-select-wrapper">
                            <div class="col-xl-8 col-lg-8 col-md-9 col-10">
                                <input type="text" class="form-control"
                                    placeholder="Address, City or Zip">
                                <button type="submit" class="search_icon">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-3 col-2">
                                <button class="btn">
                                    <i class="fa fa-bell"></i> <span>Save Search</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--=============  End Search Form ============-->

                    <!--=============  Filter Form =============-->
                    <div class="filter_form">
                        <div class="row">
                            <div class="filter_btn">
                                <button class="btn" data-bs-toggle="modal" data-bs-target="#filterModal">
                                    <i class="bi bi-funnel"></i>
                                    <span class="text">Filters</span> <span class="badge">9</span>
                                </button>
                            </div>
                            <div class="status-dropdown">
                                <select class="form-control">
                                    <option>Active</option>
                                    <option>Pending</option>
                                    <option>Comming Soom</option>
                                </select>
                            </div>
                            <div class="short-dropdown d-lg-block d-md-block d-none">
                                <i class="bi bi-arrow-down-up"></i>
                                <select class="form-control">
                                    <option>Newest</option>
                                    <option>Oldest</option>
                                    <option>Expensive</option>
                                </select>
                            </div>
                            <div class="switch-buttons-wrapper d-lg-none">
                                <a href="#" class="switch-button map-view w-inline-block">
                                    <div><span class="fa-icon no-margin"><img
                                                src="{{ URL('frontend/images/video-white.svg') }}"
                                                alt="" class="light"></span><span
                                            class="view-text">Videos</span></div>
                                </a>
                                <a href="#" class="switch-button list-view w-inline-block"
                                    style="display: none;">
                                    <div><span class="fa-icon no-margin"><i
                                                class="bi bi-list-task"></i></span><span
                                            class="view-text">List</span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--============= End Filter Form =============-->
                </div>
            </div>
            <div class="scrollbar scroll_dark property_list">
                <!-- Start Property Item -->
                <div class="property-item property-col-list mt-4">
                    @livewire('frontend.product-list-component')
                </div>
                <!-- End Property Item -->
            </div>
        </div>
        <div class="col-lg-8 right_bar d-lg-block d-none">
            <div class="right_content">
                <!--================== Main tabs ========================-->
                <ul class="nav nav-tabs nav-tabs-03 nav-fill main_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-01-tab" data-bs-toggle="tab" href="#tab-01"
                            role="tab" aria-controls="tab-01" aria-selected="true">
                            <!-- <i class="fa fa-play"></i>  -->
                            <img src="{{ URL('frontend/images/video.svg') }}" alt=""
                                class="dark">
                            <img src="{{ URL('frontend/images/video-white.svg') }}" alt=""
                                class="light">
                            City Videos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-02-tab" data-bs-toggle="tab" href="#tab-02"
                            role="tab" aria-controls="tab-02" aria-selected="false">
                            <!-- <i class="bi bi-geo-alt-fill"></i> -->
                            <img src="{{ URL('frontend/images/map.svg') }}" alt=""
                                class="dark">
                            <img src="{{ URL('frontend/images/map-white.svg') }}" alt=""
                                class="light">
                            Map
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-03-tab" data-bs-toggle="tab" href="#tab-03"
                            role="tab" aria-controls="tab-03" aria-selected="false">
                            <img src="{{ URL('frontend/images/city.svg') }}" alt=""
                                class="dark">
                            <img src="{{ URL('frontend/images/city-white.svg') }}" alt=""
                                class="light">
                            City Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-04-tab" data-bs-toggle="tab" href="#tab-04"
                            role="tab" aria-controls="tab-04" aria-selected="false">
                            <img src="{{ URL('frontend/images/news.svg') }}" alt=""
                                class="dark">
                            <img src="{{ URL('frontend/images/news-white.svg') }}" alt=""
                                class="light">
                            News</a>
                    </li>
                </ul>
                <!--================== End Main tabs ========================-->
                <!--================== Main tabs Content ========================-->
                <div class="tab-content scrollbar" id="myTabContent">
                    <!--================== City Videos tab Content ========================-->
                    <div class="tab-pane fade show active tab_space" id="tab-01" role="tabpanel"
                        aria-labelledby="tab-01-tab">
                        <h2 class="tab-heading">City Videos</h2>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="video_col">
                                    <iframe width="560" height="250"
                                        src="https://www.youtube.com/embed/E5WGzdnR2Gw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="video_col">
                                    <iframe width="560" height="250"
                                        src="https://www.youtube.com/embed/E5WGzdnR2Gw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="video_col">
                                    <iframe width="560" height="250"
                                        src="https://www.youtube.com/embed/E5WGzdnR2Gw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="video_col">
                                    <iframe width="560" height="250"
                                        src="https://www.youtube.com/embed/E5WGzdnR2Gw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="video_col">
                                    <iframe width="560" height="250"
                                        src="https://www.youtube.com/embed/E5WGzdnR2Gw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="video_col">
                                    <iframe width="560" height="250"
                                        src="https://www.youtube.com/embed/E5WGzdnR2Gw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>

                            <!--===============  Start Pagination =================-->
                            <nav aria-label="..." class="custom_pageination">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"
                                            aria-disabled="true"><i class="bi bi-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link"
                                            href="#">1</a></li>
                                    <li class="page-item" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i
                                                class="bi bi-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                            <!--===============  End Pagination =================-->

                        </div>
                    </div>
                    <!--================== End City Videos tab Content ========================-->
                    <!--================== Maps List tab Content ========================-->
                    <div class="tab-pane fade " id="tab-02" role="tabpanel"
                        aria-labelledby="tab-02-tab">
                        <div class="half-map-full">
                            <div class="map-canvas h-90vh">
                            </div>
                        </div>
                    </div>
                    <!--================== End Maps List tab Content ========================-->

                    <!--================== City Information List tab Content ========================-->
                    <div class="tab-pane fade tab_space" id="tab-03" role="tabpanel"
                        aria-labelledby="tab-03-tab">
                        <h2 class="tab-heading">City Information</h2>
                        <!--================== inner tabs ========================-->
                        <ul class="nav nav-tabs nav-tabs-03 nav-fill ineer_tabs" id="myTab"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-01-tab" data-bs-toggle="tab"
                                    href="#inner-tab-01" role="tab" aria-controls="tab-01"
                                    aria-selected="true">
                                    <img src="{{ URL('frontend/images/restaurant.svg') }}" alt=""
                                        class="dark">
                                    <img src="{{ URL('frontend/images/restaurant-white.svg') }}"
                                        alt="" class="light">
                                    Restaurants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-02-tab" data-bs-toggle="tab"
                                    href="#inner-tab-02" role="tab" aria-controls="tab-02"
                                    aria-selected="false">
                                    <img src="{{ URL('frontend/images/park.svg') }}" alt=""
                                        class="dark">
                                    <img src="{{ URL('frontend/images/park-white.svg') }}" alt=""
                                        class="light">
                                    Parks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-03-tab" data-bs-toggle="tab"
                                    href="#inner-tab-03" role="tab" aria-controls="tab-03"
                                    aria-selected="false">
                                    <img src="{{ URL('frontend/images/hospital.svg') }}" alt=""
                                        class="dark">
                                    <img src="{{ URL('frontend/images/hospital-white.svg') }}"
                                        alt="" class="light">
                                    Hospitals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-04-tab" data-bs-toggle="tab"
                                    href="#inner-tab-04" role="tab" aria-controls="tab-04"
                                    aria-selected="false">
                                    <img src="{{ URL('frontend/images/school.svg') }}" alt=""
                                        class="dark">
                                    <img src="{{ URL('frontend/images/school-white.svg') }}"
                                        alt="" class="light">
                                    Schools</a>
                            </li>
                        </ul>
                        <div class="tab-content inner-tab" id="myInnerTabContent">
                            <div class="tab-pane fade show active" id="inner-tab-01" role="tabpanel"
                                aria-labelledby="tab-01-tab">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!--===============  Start Pagination =================-->
                                    <nav aria-label="..." class="custom_pageination">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"
                                                    aria-disabled="true"><i
                                                        class="bi bi-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item active"><a class="page-link"
                                                    href="#">1</a></li>
                                            <li class="page-item" aria-current="page">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">3</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">4</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">5</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i
                                                        class="bi bi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!--===============  End Pagination =================-->

                                </div>
                            </div>
                            <div class="tab-pane fade " id="inner-tab-02" role="tabpanel"
                                aria-labelledby="tab-02-tab">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!--===============  Start Pagination =================-->
                                    <nav aria-label="..." class="custom_pageination">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"
                                                    aria-disabled="true"><i
                                                        class="bi bi-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item active"><a class="page-link"
                                                    href="#">1</a></li>
                                            <li class="page-item" aria-current="page">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">3</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">4</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">5</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i
                                                        class="bi bi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!--===============  End Pagination =================-->

                                </div>
                            </div>
                            <div class="tab-pane fade" id="inner-tab-03" role="tabpanel"
                                aria-labelledby="tab-03-tab">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!--===============  Start Pagination =================-->
                                    <nav aria-label="..." class="custom_pageination">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"
                                                    aria-disabled="true"><i
                                                        class="bi bi-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item active"><a class="page-link"
                                                    href="#">1</a></li>
                                            <li class="page-item" aria-current="page">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">3</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">4</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">5</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i
                                                        class="bi bi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!--===============  End Pagination =================-->

                                </div>
                            </div>
                            <div class="tab-pane fade" id="inner-tab-04" role="tabpanel"
                                aria-labelledby="tab-04-tab">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="w-layout-grid modal-grid city-info">
                                            <a href="#" target="_blank"
                                                class="nearby-wrapper w-inline-block">
                                                <img src="{{ URL('frontend/images/c1.jpeg') }}"
                                                    alt="Lounge Area" class="nearby-image">
                                                <div class="circle-button info-card">
                                                    <div class="plus-icon"><i class="bi bi-plus"></i>
                                                    </div>
                                                    <div class="circle-base"></div>
                                                </div>
                                                <div class="nearby-info-wrap">
                                                    <div class="nearby-title">School Name</div>
                                                    <div class="paragraph">9550 Warner Avenue, Fountain
                                                        Valley, CA 92708</div>
                                                    <div class="reviews">10 Review: 3.5 Average</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--===============  Start Pagination =================-->
                                    <nav aria-label="..." class="custom_pageination">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"
                                                    aria-disabled="true"><i
                                                        class="bi bi-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item active"><a class="page-link"
                                                    href="#">1</a></li>
                                            <li class="page-item" aria-current="page">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">3</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">4</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="#">5</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i
                                                        class="bi bi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!--===============  End Pagination =================-->


                                </div>
                            </div>
                        </div>
                        <!--=================  End inner tabs ======================-->
                    </div>
                    <!--================== End City Information List tabs Content ========================-->

                    <!--================== News List tab Content ========================-->
                    <div class="tab-pane fade tab_space" id="tab-04" role="tabpanel"
                        aria-labelledby="tab-04-tab">
                        <h2 class="tab-heading">News</h2>
                        <!--================== News inner tabs ========================-->
                        <ul class="nav nav-tabs nav-tabs-03 nav-fill ineer_tabs" id="myTab"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-01-tab" data-bs-toggle="tab"
                                    href="#newsinner-tab-01" role="tab" aria-controls="tab-01"
                                    aria-selected="true">
                                    Buyer News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-02-tab" data-bs-toggle="tab"
                                    href="#newsinner-tab-02" role="tab" aria-controls="tab-02"
                                    aria-selected="false">
                                    Seller News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-03-tab" data-bs-toggle="tab"
                                    href="#newsinner-tab-03" role="tab" aria-controls="tab-03"
                                    aria-selected="false"> Local News</a>
                            </li>
                        </ul>
                        <div class="tab-content inner-tab" id="myInnerTabContent">
                            <div class="tab-pane fade show active" id="newsinner-tab-01" role="tabpanel"
                                aria-labelledby="tab-01-tab">
                                <div class="wrapper nearby-news">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="news_link">
                                                <div class="media">
                                                    <img src="{{ URL('frontend/images/ns1.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div id="" class="blog-content">
                                                    <h3 class="news-title">12 unique examples of
                                                        photography portfolio websites</h3>
                                                    <p class="news-paragraph">You have many options to
                                                        choose from when putting together your own online
                                                        photography portfolio website ...</p>
                                                    <div class="profile-block">
                                                        <img sizes="(max-width: 991px) 100vw, 40px"
                                                            width="50"
                                                            src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                                            alt="First Team Logo" class="author-picture">
                                                        <div class="normal-wrapper">
                                                            <div class="title-small-2">First Team</div>
                                                            <p class="paragraph-detials-small">January 10,
                                                                2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="news_link">
                                                <div class="media">
                                                    <img src="{{ URL('frontend/images/ns1.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div id="" class="blog-content">
                                                    <h3 class="news-title">12 unique examples of
                                                        photography portfolio websites</h3>
                                                    <p class="news-paragraph">You have many options to
                                                        choose from when putting together your own online
                                                        photography portfolio website ...</p>
                                                    <div class="profile-block">
                                                        <img sizes="(max-width: 991px) 100vw, 40px"
                                                            width="50"
                                                            src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                                            alt="First Team Logo" class="author-picture">
                                                        <div class="normal-wrapper">
                                                            <div class="title-small-2">First Team</div>
                                                            <p class="paragraph-detials-small">January 10,
                                                                2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="news_link">
                                                <div class="media">
                                                    <img src="{{ URL('frontend/images/ns1.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div id="" class="blog-content">
                                                    <h3 class="news-title">12 unique examples of
                                                        photography portfolio websites</h3>
                                                    <p class="news-paragraph">You have many options to
                                                        choose from when putting together your own online
                                                        photography portfolio website ...</p>
                                                    <div class="profile-block">
                                                        <img sizes="(max-width: 991px) 100vw, 40px"
                                                            width="50"
                                                            src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                                            alt="First Team Logo" class="author-picture">
                                                        <div class="normal-wrapper">
                                                            <div class="title-small-2">First Team</div>
                                                            <p class="paragraph-detials-small">January 10,
                                                                2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <!--===============  Start Pagination =================-->
                                        <nav aria-label="..." class="custom_pageination">
                                            <ul class="pagination">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1"
                                                        aria-disabled="true"><i
                                                            class="bi bi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active"><a class="page-link"
                                                        href="#">1</a></li>
                                                <li class="page-item" aria-current="page">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link"
                                                        href="#">3</a></li>
                                                <li class="page-item"><a class="page-link"
                                                        href="#">4</a></li>
                                                <li class="page-item"><a class="page-link"
                                                        href="#">5</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#"><i
                                                            class="bi bi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!--===============  End Pagination =================-->

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade " id="newsinner-tab-02" role="tabpanel"
                                aria-labelledby="tab-02-tab">
                                <div class="wrapper nearby-news">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="news_link">
                                                <div class="media">
                                                    <img src="{{ URL('frontend/images/ns1.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div id="" class="blog-content">
                                                    <h3 class="news-title">12 unique examples of
                                                        photography portfolio websites</h3>
                                                    <p class="news-paragraph">You have many options to
                                                        choose from when putting together your own online
                                                        photography portfolio website ...</p>
                                                    <div class="profile-block">
                                                        <img sizes="(max-width: 991px) 100vw, 40px"
                                                            width="50"
                                                            src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                                            alt="First Team Logo"
                                                            class="author-picture">
                                                        <div class="normal-wrapper">
                                                            <div class="title-small-2">First Team</div>
                                                            <p class="paragraph-detials-small">January 10,
                                                                2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="news_link">
                                                <div class="media">
                                                    <img src="{{ URL('frontend/images/ns1.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div id="" class="blog-content">
                                                    <h3 class="news-title">12 unique examples of
                                                        photography portfolio websites</h3>
                                                    <p class="news-paragraph">You have many options to
                                                        choose from when putting together your own online
                                                        photography portfolio website ...</p>
                                                    <div class="profile-block">
                                                        <img sizes="(max-width: 991px) 100vw, 40px"
                                                            width="50"
                                                            src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                                            alt="First Team Logo"
                                                            class="author-picture">
                                                        <div class="normal-wrapper">
                                                            <div class="title-small-2">First Team</div>
                                                            <p class="paragraph-detials-small">January 10,
                                                                2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="news_link">
                                                <div class="media">
                                                    <img src="{{ URL('frontend/images/ns1.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div id="" class="blog-content">
                                                    <h3 class="news-title">12 unique examples of
                                                        photography portfolio websites</h3>
                                                    <p class="news-paragraph">You have many options to
                                                        choose from when putting together your own online
                                                        photography portfolio website ...</p>
                                                    <div class="profile-block">
                                                        <img sizes="(max-width: 991px) 100vw, 40px"
                                                            width="50"
                                                            src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                                            alt="First Team Logo"
                                                            class="author-picture">
                                                        <div class="normal-wrapper">
                                                            <div class="title-small-2">First Team</div>
                                                            <p class="paragraph-detials-small">January 10,
                                                                2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <!--===============  Start Pagination =================-->
                                        <nav aria-label="..." class="custom_pageination">
                                            <ul class="pagination">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1"
                                                        aria-disabled="true"><i
                                                            class="bi bi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active"><a class="page-link"
                                                        href="#">1</a></li>
                                                <li class="page-item" aria-current="page">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link"
                                                        href="#">3</a></li>
                                                <li class="page-item"><a class="page-link"
                                                        href="#">4</a></li>
                                                <li class="page-item"><a class="page-link"
                                                        href="#">5</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#"><i
                                                            class="bi bi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!--===============  End Pagination =================-->


                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="newsinner-tab-03" role="tabpanel"
                                aria-labelledby="tab-03-tab">
                                <div class="wrapper nearby-news">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="news_link">
                                                <div class="media">
                                                    <img src="{{ URL('frontend/images/ns1.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div id="" class="blog-content">
                                                    <h3 class="news-title">12 unique examples of
                                                        photography portfolio websites</h3>
                                                    <p class="news-paragraph">You have many options to
                                                        choose from when putting together your own online
                                                        photography portfolio website ...</p>
                                                    <div class="profile-block">
                                                        <img sizes="(max-width: 991px) 100vw, 40px"
                                                            width="50"
                                                            src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                                            alt="First Team Logo"
                                                            class="author-picture">
                                                        <div class="normal-wrapper">
                                                            <div class="title-small-2">First Team</div>
                                                            <p class="paragraph-detials-small">January 10,
                                                                2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="news_link">
                                                <div class="media">
                                                    <img src="{{ URL('frontend/images/ns1.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div id="" class="blog-content">
                                                    <h3 class="news-title">12 unique examples of
                                                        photography portfolio websites</h3>
                                                    <p class="news-paragraph">You have many options to
                                                        choose from when putting together your own online
                                                        photography portfolio website ...</p>
                                                    <div class="profile-block">
                                                        <img sizes="(max-width: 991px) 100vw, 40px"
                                                            width="50"
                                                            src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                                            alt="First Team Logo"
                                                            class="author-picture">
                                                        <div class="normal-wrapper">
                                                            <div class="title-small-2">First Team</div>
                                                            <p class="paragraph-detials-small">January 10,
                                                                2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="news_link">
                                                <div class="media">
                                                    <img src="{{ URL('frontend/images/ns1.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div id="" class="blog-content">
                                                    <h3 class="news-title">12 unique examples of
                                                        photography portfolio websites</h3>
                                                    <p class="news-paragraph">You have many options to
                                                        choose from when putting together your own online
                                                        photography portfolio website ...</p>
                                                    <div class="profile-block">
                                                        <img sizes="(max-width: 991px) 100vw, 40px"
                                                            width="50"
                                                            src="{{ URL('frontend/images/First-Team-Logo.png') }}"
                                                            alt="First Team Logo"
                                                            class="author-picture">
                                                        <div class="normal-wrapper">
                                                            <div class="title-small-2">First Team</div>
                                                            <p class="paragraph-detials-small">January 10,
                                                                2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                        <!--===============  Start Pagination =================-->
                                        <nav aria-label="..." class="custom_pageination">
                                            <ul class="pagination">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1"
                                                        aria-disabled="true"><i
                                                            class="bi bi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active"><a class="page-link"
                                                        href="#">1</a></li>
                                                <li class="page-item" aria-current="page">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link"
                                                        href="#">3</a></li>
                                                <li class="page-item"><a class="page-link"
                                                        href="#">4</a></li>
                                                <li class="page-item"><a class="page-link"
                                                        href="#">5</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#"><i
                                                            class="bi bi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!--===============  End Pagination =================-->


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--=================  End inner tabs ======================-->
                    </div>
                    <!--================== End News List tab Content ========================-->
                </div>
                <!--================== End Main tabs Content ========================-->
            </div>
        </div>
    </div>
</div>


@endsection


