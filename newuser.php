<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="newUser.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
function confrimpass(){
		ptr1=document.getElementById("password");
		ptr2=document.getElementById("confirmpass");
   
    if(ptr1.value!=ptr2.value){
      ptr2.value="";
      ptr2.placeholder="Password didn't match"; 
      $("#confirmpass").addClass("error");
    }
    else{$("#confirmpass").removeClass("error");}
}
function cleartext(element){
element.value="";
}
</script>
<style>
.error{
	border-color:red;
	font-weight: bold;
}
</style>
</head>

<div class = "Head">
    Shared
<a href="shared.php" id="shared">Home</a>
</div>

<form action="regNewUser.php" method ="post">
<fieldset> <legend>New User Registration form </legend>

<br><br>
<label for =" firstName">First Name: </label> &nbsp&nbsp&nbsp 
<input type = text name = "firstName" autocomplete ="off"
       placeholder="First Name" id ="firstName" required><br><br>

<label for =" lastName">Last Name: </label> &nbsp&nbsp&nbsp 
<input type="text" name= "lastName" autocomplete="off" placeholder ="Last Name" 
          id ="lastName"  required ><br><br>

<label for =" user">User name</label> &nbsp&nbsp&nbsp 
<input type = text name = "userID" autofocus = "on" 
       autocomplete ="off" placeholder="Type your UCID" maxlength=20 
       size=20 id ="user" required><br><br>

<label for = "password">Password: </label> &nbsp&nbsp&nbsp  
<input type = password name = "password"  autocomplete ="off" 
        placeholder="Type your password" id = "password" required><br><br>

<label for = "confirmpass">Comfirm pwd: </label> &nbsp&nbsp&nbsp 
<input type = password id = "confirmpass" name = "confirmpass" 
       placeholder="confirm password" onblur="confrimpass()" required ><br><br>

<label for = "major">Major: </label> &nbsp&nbsp&nbsp 
<input type = text id = "major"   autocomplete ="off" 
       name = "major" placeholder="Major"><br><br>

<div id=sub>
<input type = submit id='submitb' value= "Register" 
        style="width:90px; height:30px; font-size: larger;" ><br><br>
</div>
</fieldset> 
</form>

