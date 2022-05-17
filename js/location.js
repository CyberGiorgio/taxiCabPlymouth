let latitudeActual = undefined;
let logitudeActual = undefined;

window.onload = function showPosition(position)  {
  var container = L.DomUtil.get('map');  // if map is already initialised do not reapeat
  if(container != null){ container._leaflet_id = null; }
     if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        latitudeActual = position.coords.latitude;
        longitudeActual = position.coords.longitude;
        L.mapquest.key = 'UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr';

        var map = L.mapquest.map('map', {     //get coords map
          center: [latitudeActual,  longitudeActual],
          layers: L.mapquest.tileLayer('map'),
          zoom: 14, zoomControl: false
        });
       
   
   
        L.mapquest.textMarker([latitudeActual, longitudeActual], {    //add marker map
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
        L.mapquest.textMarker([latitudeActual, longitudeActual], {    //add marker map
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
}   

 
const checkPlace = async () => {

    var address = document.getElementById("addressDestination");
    var number = document.getElementById("numberDestination");
    var city = document.getElementById("cityDestination");
    var postcode = document.getElementById("postcodeDestination");
    var state = "GB";

    const response = await fetch('https://open.mapquestapi.com/geocoding/v1/address?key=UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr&postalCode=PL4%206AG&State= + ' + state);
    const myJson = await response.json(); //extract JSON from the http response
    // do something with myJson
    var latitudeDestination = myJson.results[0].locations[0].latLng.lat;
    var longitudeDestination = myJson.results[0].locations[0].latLng.lng;
   
    checkDistance(latitudeDestination,longitudeDestination);
   


//https://open.mapquestapi.com/geocoding/v1/address?key=UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr&postalCode=PL4%206AG&State=GB
}
const checkDistance = async (latitudeDestination,longitudeDestination) =>{
  latitudeActual = parseFloat(latitudeActual);
  latitudeActual = latitudeActual.toFixed(6);
  latitudeActual = parseFloat(latitudeActual);

  longitudeActual = parseFloat(longitudeActual);
  longitudeActual = longitudeActual.toFixed(6);
  longitudeActual = parseFloat(longitudeActual);

  //https://developer.mapquest.com/documentation/open/directions-api/route/get

  //http://open.mapquestapi.com/directions/v2/route?key=UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr&from=50.376896,-4.143699&to=50.376828,-4.143656

  const response = await fetch('https://open.mapquestapi.com/directions/v2/route?key=UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr&from='+latitudeActual+','+longitudeActual+'&to='+ latitudeDestination+','+longitudeDestination);
  console.log(response); //https://open.mapquestapi.com/directions/v2/route?key=UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr&from=50.376896,-4.143699&to=50.376828,-4.143656
  const myJson2 = await response.json(); //extract JSON from the http response
   console.log(myJson2);
  var distance = myJson2.route.distance;
  //https://open.mapquestapi.com/directions/v2/route?key=UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr&from=50.376289,-4.143841&to=50.376289,-4.1438400

  console.log('actual lat: ',latitudeActual);
  console.log('actual long: ',longitudeActual);
  console.log('dest lat: ',latitudeDestination);
  console.log('dest long: ',longitudeDestination);
  console.log('distance: ',distance, ' miles');
}