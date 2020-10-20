<?php
include("config.php");
/*
// recuperation
if(isset($_POST['plas']))
   $plas=$_POST['plas'];
else
   $plas="";

if (isset($_POST['ingredients']))
   $ingredients=$_POST['ingredients'];
else
   $ingredients="";

if (isset($_POST['recette']))
   $recette=$_POST['recette'];
else
   $recette="";
if (isset($_POST['image']))
   $image=$_POST['image'];
else
   $image="";
$tab = array(
  ':plas'  => $_POST['plas'],
  ':ingredients' => $_POST['ingredients'],
  ':recette'  => $_POST['recette'],
  ':image'  => $_POST['image'],
);


$sql = "INSERT INTO cuisines (plas,ingredients,recette,image) VALUES ('".$plas."', '".$ingredients."', '".$recette."','".$image."')";
echo "plat ajouté";
$req = $conn->prepare($sql);
$result = $req->execute($tab);

header('Location: ../~diana/cuisine.php');
exit;*/
function ajout_plat($plas,$ingredients,$recette,$image,$profil)
{
  global $conn;
  $sql = "INSERT INTO cuisines (plas,ingredients,recette,image,profil) VALUES ('".$plas."', '".$ingredients."', '".$recette."','".$image."','".$profil."')";
  $req=$conn->query($sql);
  $result=$req->fetch_assoc();
    return 1;

}
?>
</body>
</HTML>
