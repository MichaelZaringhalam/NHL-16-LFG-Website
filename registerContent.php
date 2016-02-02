<?php	

$pgm = "registerContent.php";
$goto = "projectHomePage.php";
$width = 700;
$title = "NHL16 LFG User Registry";
$username = "";
$password  = "";
$password2 = "";
$email = "";
$errorMessage = "";	//single error message
$msg_color = "red";	//color is red by default
$noneEmpty = True;	//true when there are no fields empty. false when 1 or more fields are empty

include('dbconnection.php');	//connecting to the projects database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = test_input($_POST["username"]);
   $email = test_input($_POST["email"]);
   $password = test_input($_POST["password"]);
   $password2 = test_input($_POST["password2"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	
  if (empty($_POST["username"])) {		//username
    $errorMessage .= "Name is required<br>";
	$noneEmpty = False;
  }
  else if(!preg_match("/^[a-zA-Z0-9_]{5,20}$/", $_POST["username"]))
  {
	if(strlen($_POST["username"]) < 5)
	{
		$errorMessage .= "Username must be at least 5 characters long<br>";
	}
	if (!preg_match("/^[a-zA-Z0-9_]*$/", $_POST["username"])){
	$errorMessage .= "Invalid Username. only numbers, letters, and underscores allowed<br>";
	}
  }
	else {
		$username = test_input($_POST["username"]);
		
		$userNameQuery = "Select username from users where username='$username'";
		$result = $mysqli->query($userNameQuery);
		
		if (($result->num_rows) != 0) {								//if the username already exists
			$errorMessage .= "Username already exists<br>";
			} 
	}
  if (empty($_POST["password"])) {		//password
    $errorMessage .= "Password is required<br>";
	$noneEmpty = False;
  }
	else if(!preg_match("/^.{7}/", $_POST["password"]))
	{
		$errorMessage .= "Password must be at least 7 characters long";
	}
  else {
    $password = test_input($_POST["password"]);
  }
  if (empty($_POST["password2"])) {		//password2 or password re-entry
    $errorMessage .= "Password re-entry is required<br>";
	$noneEmpty = False;
  } 
  else if ($_POST["password2"] != $_POST["password"]) {
	$emailError .= "Passwords do not match<br>";
  }
  else {
    $password2 = test_input($_POST["password2"]);
  }
  if (empty($_POST["email"])) {			//email
    $errorMessage .= "Email is required<br>";
	$noneEmpty = False;
  } else {
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$errorMessage .= "Invalid Email<br>";
	}
	else
	{
		$email = test_input($_POST["email"]);
	}
  }

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
	
echo	"<div>
		<form action='registerpage.php' method='post'>
		<table align='center' width='100%'>
		<tr><td><h2 align='center'>$title</h2></td></tr>
		<tr><td><h4 align='center'>You will be directed back to the home page when you successfully register</h4></td></tr>		
		</table>
		<table align='center' width='$100%'>		
		<tr><td>&nbsp;</td></tr>		
		<tr><td>User Name:</td>
		<td><input type='text' name='username' size='20' maxlength='20' value='$username'>*
		
		<tr><td>Password:</td><td><input type='text' name='password' size='20' maxlength='20' value='$password'>*
		
		<tr><td>Re-Enter Password:</td><td><input type='text' name='password2' size='20' maxlength='20' value='$password2'>*
		
		<tr><td>Email:</td><td><input type='text' name='email' size='40' maxlength='80' value='$email'>*
		</td></tr>
		</table>
		<br>
		<p>* means the field is required</p>
		 <div align='center'>
			<input type='submit' name='submit' value='Register'>
		 </div>
		 <br><br>
		<td>";

		if (isset($_POST['submit']))//checks to see if the user ever clicked the submit button. dont want the insert to run on the first load of the page
		{
		if($errorMessage == "" AND $noneEmpty == True)
		{
			// query stuff
			$query = "INSERT INTO users SET
				username		= '$username',
				password		= '$password',
				email			= '$email'";
			$result = $mysqli->query($query);
			
			if ($mysqli->error != NULL) {
				$msg = "Registration Error: " . $mysqli->error;
			}
			else
			{
				$msg_color = "black";
				$errorMessage .= "Registration Successful!!";
				echo "<script>window.top.location='logonPage.php'</script>";
			}
		}
		}
		
		echo "<table align='center' width='100%'><tr><td><b>Message:<br></b> <font color='$msg_color'>$errorMessage</font></td></tr></table>
				<br><br></html>";
?>