
<?php

include("config.php");
/* recuperation
if(isset($_POST['description']))
   $description=$_POST['description'];
else
   $description="";

if (isset($_POST['image']))
   $image=$_POST['image'];
else
   $image="";
if(isset($_POST['nom']))
   $nom=$_POST['nom'];
else
   $nom="";
$tab = array(
  ':description'  => $_POST['description'],
  ':image'  => $_POST['image'],
  ':nom'  => $_POST['nom'],

);


$sql = "INSERT INTO style (description,image,nom) VALUES ('".$description."', '".$image."', '".$nom."')";
echo "style ajouté";
$req = $conn->prepare($sql);
$result = $req->execute($tab);

header('Location: ../~diana/style.php');
exit;*/
function ajout_style($description,$image,$nom,$profil)
{
  global $conn;
  $sql = "INSERT INTO style (description,image,nom,profil) VALUES ('".$description."', '".$image."', '".$nom."', '".$profil."')";
  $req=$conn->query($sql);
  //$result=$req->fetch();
  return 1;
}
?>
</HTML>
