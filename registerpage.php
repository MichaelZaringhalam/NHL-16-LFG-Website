<?PHP

//header
include('headerfile.php');

if($logon)
{
echo "<script>window.top.location='projectHomePage.php'</script>";
}
$check = false;

//navigation bar
include('navbar.php');

//contents (register)
include('registerContent.php');

//footer
include('footer.php');
?>