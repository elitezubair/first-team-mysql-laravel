
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google Places demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   <div class="row">
        <div style="width:100%;height:700px;" id="maps">

        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-floating mb-3 mt-5">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" id="lat">
            <label for="floatingInput">Lattitude</label>
            </div>
            <div class="form-floating">
            <input type="text" class="form-control" id="floatingPassword" placeholder="Password" id="lng">
            <label for="floatingPassword">Longitude</label>
            </div>
            <button class="btn btn-success" onclick="showMaps()">Submit</button>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <script>


        function showMaps()
        {
             var lat = document.getElementById('lat');
             var long = document.getElementById('lng');
            var cord = {lat:lat,lng:long};
           var map =    new google.maps.Map(
               document.getElementById('maps'),
               {
                   zoom:10,
                   center: cord
               }

           );
               new google.maps.Marker({
                position:cord,
                map:map
               });


    }
       function MyFunction()
        {
           var lat = document.getElementById('lat');
           var lng = document.getElementById('lng');

        }
        showMaps(26.89359257911742, 80.9724883688515);
    </script>
</body>
</html>
