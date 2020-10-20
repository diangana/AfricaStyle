
<?php
include("config.php");
function modif_plat($plas,$ingredients,$recette,$image)
{
  global $conn;
    if($ingredients)
    {
      $sql="UPDATE cuisines SET ingredients='$ingredients' WHERE plas='".$plas."'";
      $req=$conn->query($sql);
      //$result=$req->fetch();
    }
    if ($recette)
    {
      $sql = "UPDATE cuisines SET recette='$recette' WHERE plas='".$plas."'";
      $req=$conn->query($sql);
      //$result=$req->fetch();
    }
    if ($image)
    {
      $sql = "UPDATE cuisines SET image='$image' WHERE plas='".$plas."'";
      $req=$conn->query($sql);
      //$result=$req->fetch();
    }
    return 1;
}


?>
