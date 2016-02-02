<?PHP

//home or page1

$lfgs = array("Group", "More");
$consoles = array("Xbox 360", "Xbox One","PS3","PS4");
$positions = array("C", "RW", "LW", "LD", "RD", "G");
$mics = array("Yes", "No");
$console = "ALL";
$lfg = "ALL";
$position = "ANY";
$mic = "ALL";
$search = FALSE;

$where = "WHERE ";

If($logon)
{
	echo"				<h1>Welcome $username</h1>
						<hr>";
}

echo "
<style>
a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
	width: 100%;
	text-align: center;
	height: 30px;
	font-size: 20px;
	vertical-align:middle;
	display: block;
}

p {
	margin-left: 12em;
	margin-right: 1em;
	text-align: left;
	line-height: 1.2em;
	font-size: 15px;
}
</style>

<a href='listSkaterPage.php' class='button'>List My Skater</a>
<br>";
$and = FALSE;

if (isset($_POST['submit'])) //error checking
{

if ($_POST["console"] != "ALL") {		
	$console = $_POST["console"];
	$where .= " console = '$console'";
	$and = TRUE;
	$search = TRUE;
  }
  
  if ($_POST["lfg"] != "ALL") {		
    $lfg = $_POST["lfg"];
	$search = TRUE;
	//"Looking For Group", "Looking For More"
	if($lfg == "Group")
	{
		$lfg = "Looking For Group";
	}
	else{
		$lfg = "Looking For More";
	}
	
	if($and == TRUE)
	{
		$where .= " AND lfg = '$lfg'";
	}
	else
	{
		$where .= " lfg = '$lfg'";
	}
	$and = TRUE;
  }
  
  if ($_POST["position"] != "ANY") {		
	$position = $_POST["position"];
	$search = TRUE;
	if($and == TRUE)
	{
		$where .= " AND position = '$position'";
	}
	else
	{
		$where .= " position = '$position'";
	}
	$and = TRUE;
  }
  
  if ($_POST["mic"] != "ALL") {		
	$mic = $_POST["mic"];
	if($mic == "Yes")
	{
		$mic = 1;
	}
	else{
		$mic = 0;
	}
	
	$search = TRUE;
	if($and == TRUE)
	{
		$where .= " AND mic = '$mic'";
	}
	else
	{
		$where .= " mic = '$mic'";
	}
	$and = TRUE;
  }
}

//filter form
echo "
<h3>Filter Skaters</h3>

<form id='form' action='projectHomePage.php' method='post'>
		<table align='center' width='100%'>
		</table>
		<table align='center' width='$100%'>		
		<tr><td>&nbsp;</td></tr>
		
		<tr><td>Console</td>  <td><select name='console'><option selected='selected'>ALL</option>";
  foreach($consoles as $con) {
	if ($con == $consoles)
	  $se = "SELECTED";
	  else $se = NULL;
	echo "<option $se>$con</option>";
	}
  echo "</select></td></tr>
		
		<tr><td>Looking For..</td>  <td><select name='lfg'><option selected='selected'>ALL</option>";
  foreach($lfgs as $l) {
	if ($l == $lfg)
	  $se = "SELECTED";
	  else $se = NULL;
	echo "<option $se>$l</option>";
	}
  echo "</select></td></tr>
  
  <tr><td>Position</td>  <td><select name='position'><option selected='selected'>ANY</option>";
  foreach($positions as $pos) {
	if ($pos == $positions)
	  $se = "SELECTED";
	  else $se = NULL;
	echo "<option $se>$pos</option>";
	}
  echo "</select></td></tr>
  
  <tr><td>MIC</td>  <td><select name='mic'><option selected='selected'>ALL</option>";
  foreach($mics as $m) {
	if ($m == $mics)
	  $se = "SELECTED";
	  else $se = NULL;
	echo "<option $se>$m</option>";
	}
  echo "</select></td></tr>
  
  </form>
</table>
<br>
<div align='center'>
			<input type='submit' name='submit' value='Filter Skaters'>
		 </div>
";

include('dbconnection.php');	//connecting to the projects database

//create forum database
//columns:
//rowID (primary key) (auto increment) (have every other submission be white and grey (%2 == 0))
//user (can be guest)(multiples of guest)
//gamertag or PSN name (if duplicate of gamertag then delete old entry and replace with the new one)
//lfm or lfg
//console (xbox Gamertag: /PSN:)
//Microphone	checkbox
//Player Level
//position
//Description (regex cant be larger than 200)

//display username (guest or actual username if signed in)
//display gamertag or psn ID

//✘	&#10008	2718	 	HEAVY BALLOT X
//✔	&#10004	2714	 	HEAVY CHECK MARK

echo"<br>
<hr>
<h3  style='display: inline;'>Find A Skater</h3>
<sub'><font size='2'>Posts will delete after 4 hours</font></sub>
<br>
<br>
";

//remove old entries
$deleteQuery = "DELETE FROM forum WHERE time < (NOW() - INTERVAL 4 HOUR)";
$deleteResult = $mysqli -> query($deleteQuery);


//query to show all forum entries
if($search == false)
{
 $query = "SELECT rowid, user, tag, lfg, console, mic, level, position, description, TIME(time)
			FROM forum
			ORDER BY time DESC";
			}
			else
			{
				$query = "SELECT rowid, user, tag, lfg, console, mic, level, position, description, TIME(time)
				FROM forum
				$where
				ORDER BY time DESC";
			}
			
// Execute the Query
  $result = $mysqli -> query($query);
$counter = 0;
if ($result->num_rows < 1) 
{
    echo "<tr><td><font color='red'>No posts found</font></td></tr>";
	}
  while(list($rowid, $user, $tag, $lfg, $console, $mic, $level, $position, $description, $time) = $result->fetch_row()) {
  echo "$time";
  if ($counter % 2 == 0)
  {
	echo"<div style=' border-style: solid; background-color: lightgrey; text-align: center; width:100%; height:130px'>";
  }
  else
  {
	echo "<div style=' border-style: solid; text-align: center; width:100%; height:130px'>";
  }
  //limegreen
    echo"
<div style='line-height: 1.5em; padding:5px; text-align:left; float: left; width: 26%; height: 120px; align: left;'>$user<br>$console<br>Tag: $tag<br>Position: $position<br>Level: $level</div>
";
	//blueviolet
	echo "
	<div style=' display: inline; padding:5px; height: 30px; width: 54.7%; overflow: auto; float: left;   font-size: 25px'>$lfg</div>";
	
if ($mic == True)//red
{
	echo "<div style=' padding:5px; width:15%; height:30px; text-align:right; display: inline; float: right;'>Mic &#10004</div>";
}
else
{
	echo "<div style=' padding:5px; width:15%; height:30px; text-align:right; display: inline; float: right;'>Mic &#10008</div>";
}

echo "
<span style=' width:25%; height:30px; text-align: right; padding-left: 10px;'><b>Description:</b><br><p style='padding-left: 3em;'>$description</p></span>
</div><hr>";

$counter++;
}//end while

?>