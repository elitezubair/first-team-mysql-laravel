<head>
    <meta charset="utf-8">
    <meta name="keywords" content="@yield('meta_keyword')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="author" content="First Team">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('page_title') | {{env('APP_NAME')}} </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png" />
    <!-- Google Font -->
    <link rel="stylesheet"
       href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,500,600,700%7CRoboto:300,400,500,700">
    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="{{URL('frontend/css/font-awesome/all.min.css')}}" />
    <link rel="stylesheet" href="{{URL('frontend/css/flaticon/flaticon.css')}}" />
    <link rel="stylesheet" href="{{URL('frontend/css/bootstrap/bootstrap.min.css')}}" />
    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="{{URL('frontend/css/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{URL('frontend/css/range-slider/ion.rangeSlider.css')}}" />
    <link rel="stylesheet" href="{{URL('frontend/css/datetimepicker/datetimepicker.min.css')}}" />
    <link rel="stylesheet" href="{{URL('frontend/css/slick/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{URL('frontend/css/map/snazzy-info-window.min.css')}}" />
    <!-- Slider Css -->
    <link rel="stylesheet" href="{{URL('frontend/css/owl-carousel/owl.carousel.min.css')}}" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Template Style -->
    <link rel="stylesheet" href="{{URL('frontend/css/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{lbsAssets('dist/css/default-loader.css')}}">
    <link rel="stylesheet" href="{{URL('frontend/css/style.css')}}" />
    <!--Toaster-->

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <style>
       @font-face {
       font-family: Montserrat;
       src: url(frontend/fonts/Montserrat/Montserrat-Regular.ttf);
       }
    </style>

<style>

    #iva_map{
        position: relative !important;
        width: 100%;
        height: 100%;
        min-height: 1080px;
        opacity: 0.8;
        z-index: 1;
    }

    .gm-style .gm-style-iw-c {
        position: absolute;
        box-sizing: border-box;
        overflow: hidden;
        top: 0;
        left: 0;
        transform: translate3d(-50%,-100%,0);
        background-color: white;
        border-radius: 8px;
        padding: 12px;
        box-shadow: 0 2px 7px 1px rgb(0 0 0 / 30%);
    }
    .video_col {
        margin-bottom: 20PX;
    }
    .left_bar {
        /* padding: 25px 0px 0px 30px; */
    }
    .gm-style .gm-style-iw {
        font-weight: 300;
        font-size: 13px;
        overflow: hidden;
    }

    .gm-style .gm-style-iw-d {
        box-sizing: border-box;
        overflow: auto;
    }

    /*=============  Dropdoiwn CSS Start ========*/

.short-dropdown button {
  border-radius: 20px;
  background: #fff;
  color: #959595;
  padding: 0px;
  min-height: 36px;
  font-size: 16px;
  font-weight: 300;
  width: 100%;
  display: block !important;
  padding: 6px 0px 6px 16px;
}
.filter_form .short-dropdown i.bi.bi-arrow-down-up {
  position: absolute;
  top: 8px !important;
  left: 10px !important;
}


.nb-spinner {
    width: 75px;
    height: 75px;
    background: transparent;
    border-top: 4px solid #ffffff !important;
    border-right: 4px solid transparent;
    border-radius: 50%;
    -webkit-animation: 1s spin linear infinite;
    animation: 1s spin linear infinite;
    position: fixed !important;
    z-index: 999;
    overflow: show;
    margin: auto;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
}


    /* ========================================google map view style for property infowindow  OLD CSS============================ */
    .infoWindow {
        width: 400px !important;
        height: auto !important;
        padding: 5px 3px 3px;
    }

    .infoWindow a {
        text-decoration: none;
        display: flex;
        outline: none !important;
    }
    .infoWindow .photo {
        margin-right: 15px;
    }

    .infoWindow .photo {
        margin-bottom: 7px;
    }
    img#photos_main {
        height: 110px !important;
        width: 150px !important;
        object-fit: cover;
        border-radius: 3px;
    }

    <style>
    .gm-style img {
        max-width: none;
    }
    img {
        border-style: none;
        height: auto;
        max-width: 100%;
    }
    img {
        max-width: 100%;
        vertical-align: middle;
        display: inline-block;
    }
    img {
        border: 0;
    }

    .infoWindow .card-info.offers {
        left: 11%;
    }
    .card-info.offers {
        position: absolute;
        left: 4%;
        top: auto;
        right: auto;
        bottom: 0%;
        z-index: 2;
        display: inline-block;
        padding: 3px 16px;
        border-radius: 50px;
        background-color: #051D29;
        color: #fff;
        font-size: 12px;
    }
    .card-info {
        margin-bottom: 15px;
        color: #6b6b6b;
        font-size: 15px;
        line-height: 24px;
        text-decoration: none;
    }
    .infoWindow a {
        text-decoration: none;
        display: flex;
        outline: none !important;
    }
    .price {
        margin-top: 0px;
    }
    .infoWindow .i-feature {
        margin-bottom: 10px;
    }
    .infoWindow .addr, .infoWindow .addr + div {
        color: #333;
        font-size: 14px;
        font-weight: 400;
        line-height: 22px;
    }
    a {
        color: #1288CA;
        font-family: "Montserrat", Sans-serif;
        font-weight: 600;
    }
    a {
        color: #051D29 !important;
    }
    .infoWindow .price span {
        font-size: 20px;
        font-weight: 600;
        color: #000;
        display: block;
        margin-bottom: 10px;
    }


/* ========================================google map view style for property infowindow  NEW CSS============================ */

:root {
  --main-color-active-list: #f5020e;
  --main-color-sold: #051d29;
  --main-color-registered: #ff00d4;
  --main-color-coming-soon: #00b900;
  --main-color-pending: #00b3ef;
}
/*
/*
 * Property styles in unhighlighted state.
 */
 .property {
  align-items: center;
  border-radius: 50%;
  color: #263238;
  display: flex;
  font-size: 14px;
  gap: 15px;
  height: 20px;
  justify-content: center;
  padding: 0px;
  position: relative;
  position: relative;
  transition: all 0.3s ease-out;
  width: 30px;
}

.property .icon {
  align-items: center;
  display: flex;
  justify-content: center;
  color: #FFFFFF;
}

.property .icon svg {
  height: 20px;
  width: auto;
}

.property .details {
  display: none;
  flex-direction: column;
  flex: 1;
}

.property .price {
  color: #000000;
  font-size: 20px;
    font-weight: 600;
  margin-bottom: 5px;
  margin-top: 10px;
}

.property .address {
  color: #707070;
  font-size: 13px;
  margin-bottom: 10px;
  margin-top: 5px;
}

.property .features {
  align-items: flex-end;
  display: flex;
  flex-direction: row;
  gap: 10px;
}

.property .features > div {
  align-items: center;
  background: #F5F5F5;
  border-radius: 5px;
  border: 1px solid #ccc;
  display: flex;
  font-size: 10px;
  gap: 5px;
  padding: 5px;
}

/*
 * Property styles in highlighted state.
 */
.property.highlight {
  background-color: #FFFFFF;
  border-radius: 8px;
  box-shadow: 10px 10px 5px #00000033;
  height: 122px;
  padding: 8px 15px;
  width: auto;
}

.property.highlight::after {
  border-left: 9px solid transparent;
  border-right: 9px solid transparent;
  border-top: 9px solid #FFFFFF;
  content: "";
  height: 0;
  left: 50%;
  position: absolute;
  top: 95%;
  transform: translate(-50%, 0);
  transition: all 0.3s ease-out;
  width: 0;
  z-index: 1;
}


.property.highlight::after {
  border-top: 12px solid #FFFFFF;
}

.property.highlight .details {
  display: flex;
}

.property.highlight .icon svg {
  width: 50px;
  height: 50px;
}
.gm-style img {
    max-width: 132px;
    border-radius: 4px;
}
.property.highlight span.card-info.offers {
    position: absolute;
    color: #000;
    bottom: -13px;
    background: #000;
    color: #fff;
    padding: 4px 15px;
    left: 30%;
    border-radius: 20px;
}

.property .bed {
  color: #FFA000;
}

.property .bath {
  color: #03A9F4;
}

.property .size {
  color: #388E3C;
}

.property .parking {
  color: #af5c14;
}

.property .building {
  color: #051d29;
}

/* ==========price tag icon========= */
.property .price-tag-marker {
    border-radius: 15px;
    font-size: 14px;
    padding: 4px 8px;
    position: relative;
}


.property .price-tag-marker.active-list{
    background-color: var(--main-color-active-list);
    color: #FFFFFF;
}
.property .price-tag-marker.sold{
    background-color: var(--main-color-sold);
    color: #FFFFFF;
}
.property .price-tag-marker.registered{
    background-color: var(--main-color-registered);
    color: #FFFFFF;
}
.property .price-tag-marker.coming-soon{
    background-color: var(--main-color-coming-soon);
    color: #FFFFFF;
}
.property .price-tag-marker.pending{
    background-color: var(--main-color-pending);
    color: #FFFFFF;
}


.property .price-tag-marker.active-list::after{
    border-top: 8px solid var(--main-color-active-list);
}
.property .price-tag-marker.sold::after{
    border-top: 8px solid var(--main-color-sold);
}
.property .price-tag-marker.registered::after{
    border-top: 8px solid var(--main-color-registered);
}
.property .price-tag-marker.coming-soon::after{
    border-top: 8px solid var(--main-color-coming-soon);
}
.property .price-tag-marker.pending::after{
    border-top: 8px solid var(--main-color-pending);
}


.price-tag-marker::after {
  content: "";
  position: absolute;
  left: 50%;
  top: 100%;
  transform: translate(-50%, 0);
  width: 0;
  height: 0;
  border-left: 7px solid transparent;
  border-right: 7px solid transparent;
}

/* ========== circle tag icon========= */
.dot-marker{
    width: 15px;
    height: 15px;
    padding: 0px;
    text-align: center;
    font-size: 10px;
    border-style: solid;
    border-width: 2px;
    border-color: #fff;
    border-radius: 50%;
    box-shadow: 0 2px 4px 0 rgb(0 0 0 / 80%);
}
.dot-marker.active-list{
    background-color: var(--main-color-active-list);
}
.dot-marker.sold{
    background-color: var(--main-color-sold);
}
.dot-marker.registered{
    background-color: var(--main-color-registered);
}
.dot-marker.coming-soon{
    background-color: var(--main-color-coming-soon);
}
.dot-marker.pending{
    background-color: var(--main-color-pending);
    color: #000;

}


    </style>

    @stack('front_styles')
 </head>
