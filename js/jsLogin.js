function sessionKiller(){       //kill any previous sessions
  sessionStorage.removeItem('id');
   sessionStorage.removeItem('user');
}

function sessionStored(){ //get a new session stored
    var input = document.getElementById('email');
    sessionStorage.setItem('user', input.value); 
}
function hide(id){          //show login/register
    document.getElementById(id).style.display = 'none';
}
function show(id){          //hide login/register
    document.getElementById(id).style.display = 'block';
}






