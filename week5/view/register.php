<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
	</script>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>
<style>
body {
  padding-left: 2%;
  padding-right:2%;
}

input[type=text], input[type=password], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password], input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}
button[type=submit] {
  background-color: #89cff0;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity: 1;
}
</style>
<body>

<form name="register" action="../control/saveDetails.php" method="POST" onsubmit="return validateForm()">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
	<br>

    <label for="email"><b>Firstname</b></label>
    <input type="text" placeholder="Enter Firstname" name="firstname" required>
    <br>

    <label for="psw"><b>Surname</b></label>
    <input type="text" placeholder="Enter Surname" name="surname" required>
     <br>
	 
    <label for="psw"><b>Mobile Number</b></label>
    <input type="number" placeholder="Enter Mobile Number" name="mobileno" required>
     <br>
	 
    <label for="psw"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
     <br>
	 
    <label for="psw"><b>Password</b></label>
    <input id="show" type="password" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required>
	 <br>
	<input type="checkbox" onclick="myFunction()">Show Password
    <br>
	
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input id="show2" type="password" placeholder="Repeat Password" name="psw-repeat" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
	 <br>
	<input type="checkbox" onclick="myFunction2()">Show Password
    <br>
	
<div class="g-recaptcha" data-sitekey="6LeQTrwUAAAAADMmVXBVEWC3bcuTZDqTSpxPYJL4"></div>


    <button type="submit" class="registerbtn">Register</button><!-- will take your to action.php as stated above-->
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>

</form>


<script>
function myFunction(){
  var x = document.getElementById("show");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
 
}
function myFunction2(){
 var y = document.getElementById("show2");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
  
 function validateForm() {
var fields = ["firstname", "surname", "mobileno", "email", "password", "psw-repeat"]

  var i, l = fields.length;
  var fieldname;
  for (i = 0; i < l; i++) {
    fieldname = fields[i];
	x = document.forms["register"][fieldname].value;
    //if (document.forms["register"][fieldname].value.includes("<")) {
	if (x.includes("<")||x.includes(">")) {
      alert(fieldname + " contains < or >");
      return false;
    }
  }
  return true;
}

</script>
</body>
</html>
