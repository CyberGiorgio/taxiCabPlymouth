function sessionKiller(){       //kill any previous sessions
    sessionStorage.removeItem('user');
    sessionStorage.removeItem('customerId');
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






