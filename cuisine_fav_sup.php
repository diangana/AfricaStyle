<?php include("barre.php");
echo htmlspecialchars($_SESSION['login']);
include("config.php");
$sql="SELECT id FROM login WHERE pseudo= '".$_SESSION['login']."'";
$rep = $conn->query($sql);
$result=$rep->fetch_assoc();
$sql="DELETE FROM fav_cuisines WHERE id_cuisine='".$_GET['id_cuisine']."'AND id_login='".$result['id']."' ";
echo "le plat a ete supprimer des favoris";
$rep = $conn->query($sql);
$dest="cuisine_fav.php";
 echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
exit;

?>
;

?>
