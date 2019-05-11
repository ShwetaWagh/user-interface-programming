//language change

$('[lang="ch"]').hide();

    
$('#switch_lang').click(function() {
  $('[lang="ch"]').toggle();
  $('[lang="en"]').toggle();
    
/*  
    
    //store preference to cookie, this requires jQuery cookie
    
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