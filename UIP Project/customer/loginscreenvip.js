function validateForm()
{
    var a = document.myForm.user.value;
    var b = document.myForm.pass1.value;

    if(a=="")
    {
        alert("Enter the username");
        return false;
    }
    if(!isNaN(a))
    {
        alert("Please enter only character");
        return false;
    }
    if((a.length < 4)||(a.length > 12))
    {
        alert("Character must be 4 to 12 ");
    }
    else if(b=="")
    {
        alert("Enter the password");
        return false;
    }
    else if(b.length<6){
        alert("Password must be at least 6 characters long.");
        return false;
    }


}
