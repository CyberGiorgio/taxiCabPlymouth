let latitudeActual = undefined;
let logitudeActual = undefined;
let latitudeDestination = undefined;
let longitudeDestination = undefined;
                                              //location loading
window.onload = function showPosition(position)  {
  var container = L.DomUtil.get('map');  // if map is already initialised do not repeat
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
   
        L.mapquest.textMarker([latitudeActual, longitudeActual], {    //add marker map coordinates from user location
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
      
      map.addControl(L.mapquest.control());

    } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}   

            //check if the place exist or input correct
const checkPlace = async () => {
    var address = document.getElementById("addressDestination");
    var number = document.getElementById("numberDestination");
    var city = document.getElementById("cityDestination");
    var postcode1 = document.getElementById("postcodeDestination1").value.toUpperCase();  //uppercase input
    var postcode2 = document.getElementById("postcodeDestination2").value.toUpperCase();
    var postcode = postcode1+ " " +postcode2;
      console.log(postcode);
    postcode = postcode.toString().replace(/ /g, '%20');
    var state = "GB";
    console.log(postcode);
     if(postcode1 == "" || postcode2 ==""){     //input check
    document.getElementById("textError").innerHTML = "postcode not valid";
  }else{          //rest api return json file
    const response = await fetch('https://open.mapquestapi.com/geocoding/v1/address?key=UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr&postalCode='+ postcode+'&State= + ' + state);
    const myJson = await response.json(); //extract JSON from the http response
    // do something with myJson
    latitudeDestination = myJson.results[0].locations[0].latLng.lat;
    longitudeDestination = myJson.results[0].locations[0].latLng.lng;
   
    checkDistance(latitudeDestination,longitudeDestination, postcode1,postcode2); //distance check
}

                    //check distance your place to destination
}
const checkDistance = async (latitudeDestination,longitudeDestination, postcode1,postcode2) =>{
  latitudeActual = parseFloat(latitudeActual);
  latitudeActual = latitudeActual.toFixed(6);   //6 decimal numbers
  latitudeActual = parseFloat(latitudeActual);

  longitudeActual = parseFloat(longitudeActual);
  longitudeActual = longitudeActual.toFixed(6);
  longitudeActual = parseFloat(longitudeActual);

                                          //rest api return json file
  const response = await fetch('https://open.mapquestapi.com/directions/v2/route?key=UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr&from='+latitudeActual+','+longitudeActual+'&to='+ latitudeDestination+','+longitudeDestination);
  console.log(response); //https://open.mapquestapi.com/directions/v2/route?key=UGrSTtknU6a0W3wgqydzUsOS4C1bD2Sr&from=50.376896,-4.143699&to=50.376828,-4.143656
  const myJson2 = await response.json(); //extract JSON from the http response
   console.log(myJson2);
  var distance = myJson2.route.distance;
                                                //tests values fetched
  console.log('actual lat: ',latitudeActual);
  console.log('actual long: ',longitudeActual);
  console.log('dest lat: ',latitudeDestination);
  console.log('dest long: ',longitudeDestination);
  console.log('distance: ',distance, ' miles');
   if(distance == undefined){       //if nothing found
    document.getElementById("textError").innerHTML = "postcode not found";
    console.log("not found");
  }else{
    openModal(8);             //else show the summary of the booking
    document.getElementById("destinationInfo").innerHTML = "Your destination is: <b>"+postcode1 + " " +postcode2+"</b><br/>distance: <b>" +distance +" miles</b>" + "<br/>the price is: <b>"
     + calculatePrice(distance) + "£</b>";
  }
}
        //calculate price booking
const calculatePrice = (distance) =>{
  var price = distance * 3 + 1;
  price = price.toFixed(2);
  return price;
}
          //open modal
function openModal(index) {
  var modal = document.getElementById("myModal"+index);
  modal.style.display = "block";
}

        // close modal
function closeModal(index) {
  var modal = document.getElementById("myModal"+index);
  modal.style.display = "none";
}
        //confirm booking message
const confirmMessage = () =>{
  document.getElementById("title").innerHTML = "Booked <span class='close'  onclick='closeModal(8);'>&times;</span>";
  document.getElementById("destinationInfo").innerHTML ="Your driver will be there shortly" 
  document.getElementById("buttons").innerHTML = " <button id='bookingConfirmed'style='left:123px' type='submit' onclick='closeModal(8), newBooking();'>Back</button>";
}
      //initialise new booking
const newBooking = () =>{
  document.getElementById("title").innerHTML = " <span class='close'  onclick='closeModal(8);'>&times;</span><p>Confirm details</p>";
  document.getElementById("destinationInfo").innerHTML ="Your destination is: <b>'+postcode1 + ' '  +postcode2+'</b><br/>distance: <b>' +distance +' miles</b>' + '<br/>the price is: <b>' + calculatePrice(distance) + '£</b>'" 
  document.getElementById("buttons").innerHTML = "<button  type='submit' onclick='confirmMessage();' >Confirm</button><button  type='submit' onclick='closeModal(8);''>Back</button>";
}


 