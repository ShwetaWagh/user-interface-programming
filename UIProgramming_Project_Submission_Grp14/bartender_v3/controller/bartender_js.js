//language change


    


$('[lang="ch"]').hide();

    
$('#switch_lang').click(function() {
  $('[lang="ch"]').toggle();
  $('[lang="en"]').toggle();
    
/*  
    
    //store preference to cookie
    
    if (Cookies.get('lang') === 'en'){
        
        lert("cookie lang === en");
    }
    
    if ($.cookie('lang') === 'en') {
        
        alert("cookie lang === en");
        
        $.cookie('lang', 'ch', { expires: 7 });
        
        alert("cookie switch to ch");
      } 
    
    else {
        $.cookie('lang', 'en', { expires: 7 });
        
        alert("cookie switch to en");
      }
      
      */
    
});



//bartender home function


//change screen
function stockMenuClick(){
    window.location.href = 'http://localhost:8888/bartender_v3/bartender_stock_list2.php';
}

function orderMenuClick(){
    window.location.href = 'http://localhost:8888/bartender_v3/bartender_order_list.php';
}

function homeClick(){
    window.location.href = 'http://localhost:8888/bartender_v3/bartender_home.html';
}

function orderHistoryClick(){
    window.location.href = 'http://localhost:8888/bartender_v3/bartender_order_history.php';
}


function logoutClick(){
    window.location.href = 'http://localhost:8888/bartender_v3/bartender_login.php';
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


