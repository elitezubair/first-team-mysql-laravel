function initMap() {
    const center = {
      lat: 37.43238031167444,
      lng: -122.16795397128632,
    };
    const map = new google.maps.Map($('.map-canvas')[0], {
      zoom: 6,
      center,
      mapId: "4504f8b37365c3d0",
    });



     let index = [100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,371,372,373,374,375,376,377,378,379,380,381,382,383,384,385,386,387,388,389,390,391,392,393,394,395,396,397,398,399,400,401,402,403,404,405,406,407,408,409,410,411,412,413,414,415,416,417,418,419,420,421,422,423,424,425,426,427,428,429,430,431,432,433,434,435,436,437,438,439,440,441,442,443,444,445,446,447,448,449,450,451,452,453,454,455,456,457,458,459,460,461,462,463,464,465,466,467,468,469,470,471,472,473,474,475,476,477,478,479,480,481,482,483,484,485,486,487,488,489,490,491,492,493,494,495,496,497,498,499,500,501,502,503,504,505,506,507,508,509,510,511,512,513,514,515,516,517,518,519,520,521,522,523,524,525,526,527,528,529,530,531,532,533,534,535,536,537,538,539,540,541,542,543,544,545,546,547,548,549,550,551,552,553,554,555,556,557,558,559,560,561,562,563,564,565,566,567,568,569,570,571,572,573,574,575,576,577,578,579,580,581,582,583,584,585,586,587,588,589,590,591,592,593,594,595,596,597,598,599,600];

    let indexArr = index.map(i => properties[i]);
    console.log('final 500: ',indexArr);
    for (const property of indexArr) {
      const advancedMarkerView = new google.maps.marker.AdvancedMarkerView({
        map,
        content: buildContent(property),
        position: new google.maps.LatLng(property.Location.Latitude, property.Location.Longitude),
        title: property.Name,
      });
      const element = advancedMarkerView.element;

      ["focus", "pointerenter"].forEach((event) => {
        element.addEventListener(event, () => {
          highlight(advancedMarkerView, property);
        });
      });
      ["blur", "pointerleave"].forEach((event) => {
        element.addEventListener(event, () => {
          unhighlight(advancedMarkerView, property);
        });
      });
      advancedMarkerView.addListener("click", (event) => {
        unhighlight(advancedMarkerView, property);
      });
    }
  }





function getBooks(filters) {
    return properties.filter(function (o) {
        return Object.keys(filters).every(function (k) {
            return filters[k].some(function (f) {
                return o[k] === f;
            });
        });
    });
}


// console.log(getBooks({ City: 'Covina' }));
// console.log(getBooks({ City: 'Covina', Status: 'PND' }));

  function highlight(markerView, property) {
    markerView.content.classList.add("highlight");
    markerView.element.style.zIndex = 1;
  }

  function unhighlight(markerView, property) {
    markerView.content.classList.remove("highlight");
    markerView.element.style.zIndex = "";
  }

  function buildContent(property) {
    const content = document.createElement("div");

    content.classList.add("property");
    content.innerHTML = `<div class="price-tag-marker active-list">$69,800,000</div>
    <div class="icon">
        <div class=" dot-marker pending"></div>
        <div class=" property-image photo"><img id="photos_main" class="img-responsive" style="width:100%;height:100%;" src="https://propphoto.firstteam.com/ftwebmls/mrmls2.pix/a1133p1/np21118313.11.jpg">
            <span class="card-info offers">ACT</span>
        </div>
    </div>
  <div class="details">
      <div class="price">$2000</div>
      <div class="address">${property.Address}</div>
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
  `;
    return content;
  }

