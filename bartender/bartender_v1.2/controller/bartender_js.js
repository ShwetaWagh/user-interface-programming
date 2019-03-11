//language change

//logout


//bartender home function


//change screen
function stockMenuClick(){
    window.location.href = 'http://localhost:8888/bartender_v1.1/bartender_stock_list2.php';
}

function orderMenuClick(){
    window.location.href = 'http://localhost:8888/bartender_v1.1/bartender_order_list.php';
}

function homeClick(){
    window.location.href = 'http://localhost:8888/bartender_v1.1/bartender_home.html';
}

function orderHistoryClick(){
    window.location.href = 'http://localhost:8888/bartender_v1.1/bartender_order_history.php';
}


function logoutClick(){
    window.location.href = 'http://localhost:8888/bartender_v1.1/bartender_login.php';
}



//Accordion

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}


