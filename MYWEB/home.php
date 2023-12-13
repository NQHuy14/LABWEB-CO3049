<div class="full-screen-image">
  <img
    src="img/mainPage2.jpg"
    alt="MAIN PAGE PICTURE"
    class="img-fluid"
    id="mainPage"
  />
  <div id="map"></div>
</div>

<script>



let map;
let mapIsVisible = false;

function initMap() {
  // Initial coordinates (you can set your preferred location)
  const initialCoordinates = { lat: 37.7749, lng: -122.4194 };

  map = new google.maps.Map(document.getElementById("map"), {
    center: initialCoordinates,
    zoom: 12,
  });

  // Create a search bar
  const input = document.createElement("input");
  input.type = "text";
  input.placeholder = "Search...";
  input.style.marginTop = "10px";
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Perform search on Enter key press
  input.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
      const geocoder = new google.maps.Geocoder();
      geocoder.geocode({ address: input.value }, function (results, status) {
        if (status === "OK" && results[0]) {
          map.setCenter(results[0].geometry.location);
        } else {
          alert("Location not found");
        }
      });
    }
  });

  // Close map when clicking anywhere on the page
  document.body.addEventListener("click", function () {
    if (mapIsVisible) {
      toggleMap();
    }
  });
}

function toggleMap() {
  const mapDiv = document.getElementById("map");
  mapIsVisible = !mapIsVisible;

  if (mapIsVisible) {
    mapDiv.style.display = "block";
    // Load the Google Maps API script if not loaded
    if (!window.google) {
      const script = document.createElement("script");
      script.src =
        "https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap";
      script.async = true;
      script.defer = true;
      document.head.appendChild(script);
    } else {
      initMap();
    }
  } else {
    mapDiv.style.display = "none";
  }
}

</script>