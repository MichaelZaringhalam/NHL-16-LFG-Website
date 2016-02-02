<?php	



$pgm = "listSkaterPage.php";
$goto = "projectHomePage.php";
$width = 700;
$title = "NHL16 List My Skater";
$errorMessage = "";	//single error message
$msg_color = "red";	//color is red by default
$noneEmpty = True;	//true when there are no fields empty. false when 1 or more fields are empty

$lfg = array("Looking For Group", "Looking For More");
$consoles = array("Xbox 360", "Xbox One","PS3","PS4");
$positions = array("C", "RW", "LW", "LD", "RD", "G");

$tag = NULL;
$mic = TRUE;
$level = NULL;
$description = "Enter text here...";
$console = NULL;
$position = NULL;
$temp = NULL;
//CURRENT_TIMESTAMP();

if (!$logon)
{
	$username = "Guest";
}

include('dbconnection.php');	//connecting to the projects database

if ($_SERVER["REQUEST_METHOD"] == "POST") //error checking
{
if (empty($_POST["console"])) {		
    $errorMessage .= "Console is required<br>";
	$noneEmpty = False;
  }
  else
  {
	$console = $_POST["console"];
  }
  
  if (empty($_POST["tag"])) {		
    $errorMessage .= "Tag is required<br>";
	$noneEmpty = False;
  }
  else
  {
	$tag = $_POST["tag"];
  }
  
  if (empty($_POST["lfg"])) {		
    $errorMessage .= "Please specify if you are looking for a group<br>";
	$noneEmpty = False;
  }
  else{
	$temp = $_POST["lfg"];
  }
  
  if (empty($_POST["position"])) {		
    $errorMessage .= "Position is required<br>";
	$noneEmpty = False;
  }
  else
  {
	$position = $_POST["position"];
  }
  
  if (empty($_POST["level"])) {		
    $errorMessage .= "Level is required<br>";
	$noneEmpty = False;
  }
  else if ($_POST["level"] < 1 OR $_POST["level"] > 50)
  {
	$errorMessage .= "Only numbers 1-50 allowed<br>";
  }
  else{
	$level = $_POST["level"];
  }
  
  if (empty($_POST["mic"])) {		
	$mic = FALSE;
  }
  else
  {
	$mic = TRUE;
  }
  
  if ($_POST["description"] == "" || $_POST["description"] == "Enter text here...") {		
    $errorMessage .= "Description is required<br>";
	$noneEmpty = False;
  }
  else
  {
	$description = $_POST["description"];
  }
}//end error checking


echo	"<div>
		<form id='form' action='$pgm' method='post'>
		<table align='center' width='100%'>
		<tr><td><h2 align='center'>$title</h2></td></tr>
		<tr><td><h4 align='center'>You will be directed back to the home page when you successfully list your skater</h4></td></tr>		
		</table>
		<table align='center' width='$100%'>		
		<tr><td>&nbsp;</td></tr>
		
		<tr><td>Console</td>  <td><select name='console'><option></option>";
  foreach($consoles as $con) {
	if ($con == $consoles)
	  $se = "SELECTED";
	  else $se = NULL;
	echo "<option $se>$con</option>";
	}
  echo "</select>*</td></tr>
  
		<tr><td>Tag: </td><td><input type='text' name='tag' size='16' maxlength='16' value='$tag'>*</td></tr>
		
		<tr><td>I am...</td>  <td><select name='lfg'><option></option>";
  foreach($lfg as $l) {
	if ($l == $lfg)
	  $se = "SELECTED";
	  else $se = NULL;
	echo "<option $se>$l</option>";
	}
  echo "</select>*</td></tr>
  
  <tr><td>Position</td>  <td><select name='position'><option></option>";
  foreach($positions as $pos) {
	if ($pos == $positions)
	  $se = "SELECTED";
	  else $se = NULL;
	echo "<option $se>$pos</option>";
	}
  echo "</select>*</td></tr>
  
  <tr><td>Level: </td><td><input type='text' name='level' size='2' maxlength='2' value='$level'>*</td></tr>
  
  <tr><td>MIC <input type='checkbox' name='mic' value='$mic'></td></tr>
  <tr><td>Description:</td><td> <textarea rows='4' cols='50' name='description' form='form' maxlength='150'>
$description</textarea>*</td></tr>
		</table>
		<br>
		<p>* means the field is required</p>
		 <div align='center'>
			<input type='submit' name='submit' value='List Skater'>
		 </div>
		 <br><br>
		<td>";

		if (isset($_POST['submit']))//checks to see if the user ever clicked the submit button. dont want the insert to run on the first load of the page
		{
		if($errorMessage == "" AND $noneEmpty == True)//if there are no errors or empty fields
		{
		$duplicate = FALSE;
			if($username != "Guest")	//if not a guest check for duplicates
			{
				$existsQuery = "Select user From forum WHERE user='$username'";
				$existsResult = $mysqli->query($existsQuery);
				
				if ($existsResult->num_rows != 0)	//if one already exists
				{
					$updateQuery = "Update forum SET 
					tag			='$tag',
					lfg			= '$temp',
					console 	= '$console',
					mic			= '$mic',
					level		= '$level',
					position	= '$position',
					description	= '$description',
					time		= CURRENT_TIMESTAMP()
					WHERE user	= '$username'";
					
					$updateResult = $mysqli->query($updateQuery);
				}
				else
				{
					$query = "INSERT INTO forum SET
						user		= '$username',
						tag			= '$tag',
						lfg			= '$temp',
						console 	= '$console',
						mic			= '$mic',
						level		= '$level',
						position	= '$position',
						description	= '$description',
						time		= CURRENT_TIMESTAMP()";
					$result = $mysqli->query($query);
				}
			}
			else
			{			
			// query stuff
				$query = "INSERT INTO forum SET
					user		= '$username',
					tag			= '$tag',
					lfg			= '$temp',
					console 	= '$console',
					mic			= '$mic',
					level		= '$level',
					position	= '$position',
					description	= '$description',
					time		= CURRENT_TIMESTAMP()";
				$result = $mysqli->query($query);
			}
			
			if ($mysqli->error != NULL) {
				$msg = "Error: Could not post your skater" . $mysqli->error;
			}
			else
			{
				$msg_color = "black";
				$errorMessage .= "Skater Listed Successfully!!";
				echo "<script>window.top.location='projectHomePage.php'</script>";
			}
		}
		}
		
		echo "<table align='center' width='100%'><tr><td><b>Message:<br></b> <font color='$msg_color'>$errorMessage</font></td></tr></table></form>
				<br><br></html>";
?>