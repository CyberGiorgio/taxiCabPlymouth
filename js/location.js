window.onload = function showPosition(position)  {
  var container = L.DomUtil.get('map');  // if map is already initialised do not reapeat
  if(container != null){ container._leaflet_id = null; }
     if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        L.mapquest.key = 'GuAyR1y0tEOMuM5mOO3ouWj5QDQUDfxz';

        var map = L.mapquest.map('map', {     //get coords map
          center: [latitude,  longitude],
          layers: L.mapquest.tileLayer('map'),
          zoom: 14, zoomControl: false
        });
        let searchControl = L.mapquest.searchControl(
      ).addTo(map);
   
        L.mapquest.textMarker([latitude, longitude], {    //add marker map
        text: 'My position',
        subtext: '',
        position: 'right',
        type: 'marker',
        icon: {
          primaryColor: '#333333',
          secondaryColor: '#333333',
          size: 'sm'
        }
      }).addTo(map);
        L.mapquest.textMarker([latitude, longitude], {    //add marker map
        text: 'nnnnnnnnn position',
        subtext: '',
        position: 'left',
        type: 'marker',
        icon: {
          primaryColor: '#333333',
          secondaryColor: '#333333',
          size: 'sm'
        }
      }).addTo(map);

      map.addControl(L.mapquest.control());
    } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
 console.log(placeSearch.getVal());
}   