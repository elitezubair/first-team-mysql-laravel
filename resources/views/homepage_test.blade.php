<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>First Team IXD</title>


    <style>

        #iva_map{
            position: relative !important;
            width: 100%;
            height: 100%;
            min-height: 1080px;
            opacity: 0.8;
            z-index: 1;
        }
        body {
            overflow: hidden;
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
            padding: 25px 0px 0px 30px;
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
        </style>

@livewireStyles
  </head>


  <body>
    @livewire('list-poperty-component')


            <div class="price-tag-marker active-list">$69,800,000</div>
        <div class="icon">
            <div class=" dot-marker pending"></div>
            <div class=" property-image photo"><img id="photos_main" class="img-responsive" style="width:100%;height:100%;" src="https://propphoto.firstteam.com/ftwebmls/mrmls2.pix/a1133p1/np21118313.11.jpg">
                <span class="card-info offers">ACT</span>
            </div>
        </div>
      <div class="details">
          <div class="price">$2000</div>
          <div class="address">${property.id}</div>
          <div class="features">
          <div>
              <i aria-hidden="true" class="fa fa-bed fa-lg bed" title="bedroom"></i>
              <span class="fa-sr-only">bedroom</span>
              <span>y</span>
          </div>
          <div>
              <i aria-hidden="true" class="fa fa-bath fa-lg bath" title="bathroom"></i>
              <span class="fa-sr-only">bathroom</span>
              <span>7</span>
          </div>
          <div>
              <i aria-hidden="true" class="fa fa-ruler fa-lg size" title="size"></i>
              <span class="fa-sr-only">size</span>
              <span>500 ft<sup>2</sup></span>
          </div>
          <div>
            <i aria-hidden="true" class="fa-solid fa-car fa-lg parking" title="building"></i>
            <span class="fa-sr-only">building</span>
            <span>3</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa fa-building fa-lg building" title="building"></i>
            <span class="fa-sr-only">building</span>
            <span>LAND</span>
        </div>
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @livewireScripts
  </body>
</html>
