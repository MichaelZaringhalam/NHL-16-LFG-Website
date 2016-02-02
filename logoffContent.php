<?PHP

// Logoff by unsetting session variables  
  if (!$logon) $username = "USER";  
  session_unset();
  
  $logon = FALSE;
 
// LOGOFF SCREEN
  echo "<table width='$100%' align='center' bgcolor='white' cellspacing='10' class='text'>
		<tr><td>&nbsp;</td></tr>
		<tr><td align='center'><b><font size='+2'>$username Logged Off</font></b></td></tr>
		<tr><td>&nbsp;</td></tr>
		</table>\n";
?>