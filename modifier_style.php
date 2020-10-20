
<?php
include("config.php");
/*recuperation
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

if ($image)
{
  $sql="UPDATE style SET image='$image' WHERE nom='".$nom."'";

}
if ($description)
  $sql="UPDATE style SET description='$description' WHERE nom='".$nom."'";

echo "style modifié";
$req = $conn->prepare($sql);
$result = $req->execute($tab);

header('Location: ../~diana/style.php');
exit;*/
function modif_style($nom,$description,$image)
{
  global $conn;

    if ($description)
    {
      $sql="UPDATE style SET description='$description' WHERE nom='".$nom."'";
      $req=$conn->query($sql);
      //$result=$req->fetch();
    }
    if ($image)
    {
      $sql = "UPDATE style SET image='$image' WHERE nom='".$nom."'";
      $req=$conn->query($sql);
      //$result=$req->fetch();
    }
    return 1;
}
?>
