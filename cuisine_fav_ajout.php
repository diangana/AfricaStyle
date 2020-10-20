
<?php include("barre.php");
echo htmlspecialchars($_SESSION['login']);
include("config.php");
$sql="SELECT id FROM login WHERE pseudo= '".$_SESSION['login']."'";
$rep = $conn->query($sql);
$result=$rep->fetch_assoc();
$sql="INSERT INTO fav_cuisines (id_cuisine,id_login) VALUES ('".$_GET['id_cuisine']."','".$result['id']."')";
$rep = $conn->query($sql);
//$result=$rep->fetch();

?>
;

?>
