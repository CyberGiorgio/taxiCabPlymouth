function sessionKiller1(){       //kill any previous sessions
  sessionStorage.removeItem('id');
}
function sessionKiller2(){       //kill any previous sessions
  sessionStorage.removeItem('user');
}
function sessionStored(){ //get a new session stored
    var input = document.getElementById('email');
    sessionStorage.setItem('user', input.value); 
}
function hide(id){
    document.getElementById(id).style.display = 'none';
}
function show(id){
    document.getElementById(id).style.display = 'block';
}






