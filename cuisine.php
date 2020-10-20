  <?php
  include("barre.php");
  if(isset($_GET['id_cuisine']))
  {
    include("cuisine_fav_sup.php");
  }
  ?>
  <form  method="GET" action="">
    <input type="text" name="recherche" placeholder="recherche"><input type="submit" value="chercher">
  </form>
  <?php
  if(isset($_GET['recherche']))
  {
    ?>
    <?php

    $sql="SELECT * from cuisines WHERE
    plas LIKE '%".$_GET['recherche']."%'
    OR ingredients like '%".$_GET['recherche']."%'
    OR recette like '%".$_GET['recherche']."%'";
    $rep = $conn->query($sql);
    while($donnees = $rep->fetch_assoc())
    {
      ?>
      <div class="row">
    <div class="col-sm-3">
      <h3><?php echo $donnees['plas'];?></h3>
      <a href="upload/<?php  echo $donnees['image']; ?>"><img src="upload/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
      <p><a href="page.php?pseudo=<?php  echo $donnees['profil']; ?>">ajouter par <?php  echo $donnees['profil'];?></a></p>
      <p>Ingredients:<?php echo $donnees['ingredients']; ?> <br/>Recette:<?php  echo $donnees['recette']; ?><br><a href="cuisine_fav.php?id_cuisine=<?php echo $donnees['id']; ?>">ajouter au favoris</a></p>
    </div>
    <?php
   }
?>
</div>
<?php
}
else {
?>
<?php
echo htmlspecialchars($_SESSION['login']);
$rep = $conn->query('SELECT * FROM cuisines');

while($donnees = $rep->fetch_assoc())
{
?>
<div class="row">
<div class="col-sm-3">
<h3><?php echo $donnees['plas'];?></h3>
<a href="upload/<?php  echo $donnees['image']; ?>"><img src="upload/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
<p><a href="page.php?pseudo=<?php  echo $donnees['profil']; ?>">ajouter par <?php  echo $donnees['profil'];?></a></p>
<p>Ingredients:<?php echo $donnees['ingredients']; ?> <br>Recette:<?php  echo $donnees['recette']; ?><br><a href="cuisine_fav.php?id_cuisine=<?php echo $donnees['id']; ?>">ajouter au favoris</a></p>
</div>
<?php
}
?>
</div>
<?php
}

?>
</div>
</div>
<?php include("footer.php");
 ?>
