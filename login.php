<!DOCTYPE>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="login.css" rel="stylesheet" type="text/css">
<script language = "JavaScript" type ="text/javascript">
</script> 
</head>

<body>

<div class = "Head">
    Shared
<a href="shared.php" id="shared">Home</a>
</div> 
  <form  action="loginA.php" method = "post">
  <fieldset>
  <p align="center">Login Page</p>
  <label form="user">UCID</label>
  
  <input type="text" name="user" id="user" 
          autofocus = "on" autocomplete ="off" placeholder="UCID" required><br><br>
  
  <label form="pass">Password</label> 
  <input type = "password" name="pass" id="pass" placeholder="Password" autocomplete ="off" required><br><br>
  
  <div id="btn">
  <input name="submit" type="submit" value="Login" id ="button"><br><br>
  </div>
  <div id="instruct" >
    <p2>Enter UCID and Password</p2>
  </div>
  <span></span>
  </fieldset>
  </from>
  <div id="status"></div>

</body>
</html>

