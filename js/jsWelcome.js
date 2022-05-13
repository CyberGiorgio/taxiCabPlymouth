function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";

}

// When the user clicks the button, open the modal 
function openModal(index) {
  var modal = document.getElementById("myModal"+index);
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closeModal(index) {
  var modal = document.getElementById("myModal"+index);
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  var modal1 = document.getElementById("myModal1");
  var modal2 = document.getElementById("myModal2");
  var modal3 = document.getElementById("myModal3");
  var modal4 = document.getElementById("myModal4");
  var modal5 = document.getElementById("myModal5");
  var modal6 = document.getElementById("myModal6");
  var modal7 = document.getElementById("myModal7");
  if (event.target == modal1 || event.target == modal2 || event.target == modal3 || event.target == modal4 || event.target == modal5 || event.target == modal6 ||event.target == modal7) {
   modal1.style.display = "none";
   modal2.style.display = "none";
   modal3.style.display = "none";
   modal4.style.display = "none";
   modal5.style.display = "none";
   modal6.style.display = "none";
  modal7.style.display = "none";
  }
}