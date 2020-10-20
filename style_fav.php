<?php
include("barre.php");
if(isset($_GET['id_style']))
{
  echo htmlspecialchars($_SESSION['login']);
  $sql="SELECT id FROM login WHERE pseudo= '".$_SESSION['login']."'";
  $rep = $conn->query($sql);
  $result=$rep->fetch_assoc();
  $sql="SELECT id FROM fav_style WHERE id_style='".$_GET['id_style']."' AND id_login='".$result['id']."'";
  $rep=$conn->query($sql);
  if($rep->fetch_assoc())
  {
    echo " ce style est dejà dans vos favoris";
  }
  else
  {
    $sql="INSERT INTO fav_style (id_style,id_login) VALUES ('".$_GET['id_style']."','".$result['id']."')";
    $rep = $conn->query($sql);
    //$result=$rep->fetch_assoc();
    echo " style ajouté :)";

}
}
echo htmlspecialchars($_SESSION['login']);

  $sql="SELECT style.id, style.nom, style.description, style.image,style.profil, login.pseudo
  FROM style
  INNER JOIN fav_style ON style.id = fav_style.id_style
  INNER JOIN login ON fav_style.id_login = login.id and login.pseudo= '".$_SESSION['login']."'";

  $requete = $conn->query($sql);

while ($donnees = $requete->fetch_assoc())
        {
        ?>

          <div class="row">
            <div class="col-sm-3">

                <h3><?php echo $donnees['nom']; ?> </h3>
                <a href="upload/<?php  echo $donnees['image']; ?>"><img src="upload/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
                <p><a href="page.php?pseudo=<?php  echo $donnees['profil']; ?>">ajouter par <?php  echo $donnees['profil'];?></a></p>
                <p><?php echo $donnees['description']; ?> <br><br><a href="style_fav_sup.php?id_style=<?php echo $donnees['id']; ?>">supprimer des favoris</a></p>
              </div>
            <?php
           }
        ?>
        </div>
<?php
include("footer.php");

 ?>
