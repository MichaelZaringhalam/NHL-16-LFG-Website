<?PHP

//header (session start in there)
include('headerFile.php');

//navigation bar (needs to change)
include('navbar.php');

if($logon)
{
echo "<script>window.top.location='projectHomePage.php'</script>";
}

//contents (should be forum for main page
include('logonContent.php');

//footer
include('footer.php');
?>