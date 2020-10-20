<?php
include("barre.php");

if(isset($_GET['id_cuisine']))
{
  echo htmlspecialchars($_SESSION['login']);
  include("config.php");
  $sql="SELECT id FROM login WHERE pseudo= '".$_SESSION['login']."'";
  $rep = $conn->query($sql);
  $result=$rep->fetch_assoc();
  $sql="SELECT id FROM fav_cuisines WHERE id_cuisine='".$_GET['id_cuisine']."' AND id_login='".$result['id']."'";
  $rep=$conn->query($sql);
  if($rep->fetch_assoc())
  {
    echo " ce plat est dejà dans vos favoris";
  }
  else
  {
    $sql="INSERT INTO fav_cuisines (id_cuisine,id_login) VALUES ('".$_GET['id_cuisine']."','".$result['id']."')";
    $rep = $conn->query($sql);
    //$result=$rep->fetch_assoc();
    echo " plat ajouter :)";

  }

}

?>
<h3><?php echo htmlspecialchars($_SESSION['login']);?></h3><?php

  $sql="SELECT cuisines.id, cuisines.plas, cuisines.ingredients, cuisines.recette, cuisines.image,cuisines.profil, login.pseudo
  FROM cuisines
  INNER JOIN fav_cuisines ON cuisines.id = fav_cuisines.id_cuisine
  INNER JOIN login ON fav_cuisines.id_login = login.id and login.pseudo= '".$_SESSION['login']."'";

  $requete = $conn->query($sql);

while ($donnees = $requete->fetch_assoc())
        {
        ?>
          <div class="row">

            <div class="col-sm-3">
                <p><h3><?php echo $donnees['plas']; ?> </h3></p>
                <a href="upload/<?php  echo $donnees['image']; ?>"><img src="upload/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
                <p><a href="page.php?pseudo=<?php  echo $donnees['profil']; ?>">ajouter par <?php  echo $donnees['profil'];?></a></p>

                <p>Ingredients: <?php echo $donnees['ingredients']; ?> <br/>Recette: <?php  echo $donnees['recette']; ?><br/><a href="cuisine_fav_sup.php?id_cuisine=<?php echo $donnees['id']; ?>">supprimer des favoris</a></p>
            </div>

        <?php
         }
        ?>
        </div>
        <?php include("footer.php");
 ?>
