
<?php include("barre.php");
echo htmlspecialchars($_SESSION['login']);
include("config.php");
$sql="SELECT id FROM login WHERE pseudo= '".$_SESSION['login']."'";
$rep = $conn->query($sql);
$result=$rep->fetch_assoc();
$sql="INSERT INTO fav_style (id_style,id_login) VALUES ('".$_GET['id_style']."','".$result['id']."')";
$rep = $conn->query($sql);
//$result=$rep->fetch();

?>
