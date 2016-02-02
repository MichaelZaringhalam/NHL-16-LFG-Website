<?PHP
 $msg = NULL;	
$color = "black"; // Error Message	
$width = '100px';  
  
// Get Form Input  
  if(isset($_POST['logon'])) {
    $username = trim($_POST['username']);
    $pword = trim($_POST['password']);
	if ($username == NULL) 			
	{
		$color = "red"; 
		$msg = "username is missing";
	}
    if ($pword == NULL) 			
	{
		$msg = "PASSWORD is missing";
		$color = "red"; 
	}
    if (($username == NULL) AND ($pword == NULL)) 
	{
		$msg = "username & PASSWORD are missing";
		$color = "red"; 
	}
	if ($msg == NULL) {
      include('dbconnection.php');
	  $query = "SELECT username, password FROM users WHERE username='$username'";
      $result = $mysqli->query($query);
	  if (!$result) 
	  {
		$msg = "Error accessing Users Table " . mysql_error;
		$color = "red"; 
	  }
	  if ($result->num_rows > 0) {
	    list($username, $password) = $result->fetch_row();
	    if ($pword == $password) {
		    $_SESSION['username'] = $username;
		    $logon = TRUE;
			echo "<script>window.top.location='projectHomePage.php'</script>";
			//header("Location: projectHomePage.php", true);
			//exit;
//			$msg = "<font color='green'><b>$name Logon Successful</b></font>"; 
		    }
		else 
		{
			$color = "red"; 
			$msg = "Invalid Password";
	    }
		}
	  else 
	  {
		$msg = "username is invalid";
		$color = "red"; 
	  }
	 }
	}
  
// Logon Screen
  $td = "width='20%' align='right'";
  $tf = "width='80%' align='left'";
  if ($msg == NULL)  	$msg = "Enter User ID and Password";
	else if ($logon == FALSE) $msg = "<font color='$color'>$msg, please try again</font>";  
  echo "<form action='logonPage.php' enctype='multipart/form-data' method='post'>\n
		<table width='$width' align='center' bgcolor='white' cellspacing='10' class='text'>\n
		<tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		<tr><td $td>&nbsp;</td><td $tf><b>NHL16 LFG Logon</b></td></tr>\n
		<tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		<tr><td $td>User ID</td>	<td $tf><input type='text' name='username' size='25' maxlength='25' value=''></td></tr>\n
		<tr><td $td>Password</td>	<td $tf><input type='password' name='password' size='25' maxlength='25' value=''></td></tr>\n
		<tr><td $td>&nbsp;</td>		<td $tf>&nbsp;</td></tr>\n
		<tr><td $td>&nbsp;</td>		<td $tf><input type='submit' name='logon' value='Logon'></td></tr>\n
		<tr><td $td>&nbsp;</td>		<td $tf>&nbsp;</td></tr>\n
		</table>\n
		</form>\n
		<table width='$width' align='center' bgcolor='white' cellspacing='10' class='text'>\n
		<tr><td $td>Message:</td>	<td $tf><b>$msg<b></td></tr>\n
		</table>";
?>