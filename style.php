
<?php
include("barre.php");

if(isset($_GET['id_style']))
{
  include("style_fav_sup.php");

}
?>
<form  method="GET" action="">
<input type="text" name="recherche" placeholder="recherche"><input type="submit" value="chercher">
</form>
<?php
//recherche
if(isset($_GET['recherche']))
{
  ?>
  <?php
    $sql="SELECT * from style WHERE
    nom LIKE '%".$_GET['recherche']."%'
    OR description like '%".$_GET['recherche']."%'";
    $rep = $conn->query($sql);
while($donnees = $rep->fetch_assoc())
    {
      ?>
  <div class="row">

    <div class="col-sm-4">
        <h3><?php echo $donnees['nom']; ?> </h3>
        <a href="upload/<?php  echo $donnees['image']; ?>"><img src="upload/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
        <p><a href="page.php?pseudo=<?php  echo $donnees['profil']; ?>">ajouter par <?php  echo $donnees['profil'];?></a></p>
        <p><?php echo $donnees['description']; ?> <br><br><a href="style_fav.php?id_style=<?php echo $donnees['id']; ?>">ajouter au favoris</a></p>
      </div>
    <?php
   }
?>
</div>
<?php
}
//affichage de tous les style
  else {
echo htmlspecialchars($_SESSION['login']);
$rep = $conn->query('SELECT * FROM style');

while($donnees = $rep->fetch_assoc())
{

?>
<div class="row">

  <div class="col-sm-3">
      <h3><?php echo $donnees['nom']; ?></h3>
      <a href="upload/<?php  echo $donnees['image']; ?>"><img src="upload/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
      <p><a href="page.php?pseudo=<?php  echo $donnees['profil']; ?>">ajouter par <?php  echo $donnees['profil'];?></a></p>
      <p><?php echo $donnees['description']; ?> <br><br><a href="style_fav.php?id_style=<?php echo $donnees['id']; ?>">ajouter au favoris</a></p>
    </div>
  <?php
 }
?>
</div>
<?php
 }
 include("footer.php");
?>
