    <?php
    include("barre.php");
    //afficher le profil d'une autre personne
 if(isset($_GET["pseudo"]))
 {


 $rep=$conn->query("SELECT * from profil");
while($donnees=$rep->fetch_assoc())
{
  if( $donnees['pseudo']==$_GET['pseudo'])
  {
    ?><h2>profil de <?php echo $donnees['pseudo'];?></h2>
    <a href="upload/<?php  echo $donnees['image']; ?>"><img src="upload/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
    <p>nom: <?php echo $donnees['nom'];?></p><?php
    ?><p>prenom: <?php echo $donnees['prenom'];?></p>
    <p><?php echo $donnees['age'];?> ans</p>
  <p>passions: <?php echo $donnees['interet'];?></p><?php
}
}?>
<a href="chat.php?a=<?php  echo $_GET['pseudo']; ?>">Envoyer un message</a><br/>
<?php
}
//afficher son profil
else {
  $rep=$conn->query("SELECT * from profil");
 while($donnees=$rep->fetch_assoc())
 {
   if( $donnees['pseudo']==$_SESSION['login'])
   {
     ?><h2>profil de <?php echo $donnees['pseudo'];?></h2>
     <a href="upload/<?php  echo $donnees['image']; ?>"><img src="upload/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
     <p>nom: <?php echo $donnees['nom'];?></p><?php
     ?><p>prenom: <?php echo $donnees['prenom'];?></p>
     <p><?php echo $donnees['age'];?> ans</p>
   <p>passions: <?php echo $donnees['interet'];?></p><?php
  }
 }


?>
<!--formulaire depliant avec bootstrap-->
<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#profil">modifier mon profil</button><br/>
<div id="profil" class="collapse"> <?php
include("upload_form.php");?>
    <form enctype="multipart/form-data" action="" method="POST">

       <input type="text" name="image" readonly placeholder="image" value=<?php echo $images?>>

        	 <p>
    		<input type="text" name="nom" placeholder="Nom" required />
    	</p>
      <p>
        <input type="text" name="prenom" placeholder="prenom" required />
      </p>
      <p>
        <input type="number" name="age" placeholder="20" required />
      </p>
    	  <p>
    		<textarea name="interet" rows="8" cols="45" placeholder="centre d'intêret" required /></textarea>
    	</p>

    	  <p><input type="submit" value="OK"></p>
        </form>
      </div>
        <?php if (isset($_POST['prenom']))
        {
          include("config.php");
          $rep=$conn->query("SELECT * from profil where pseudo='".$_SESSION['login']."'");
          if ($donnees=$rep->fetch_assoc())
          {
            $sql="UPDATE profil SET nom='".$_POST['nom']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $sql="UPDATE profil SET prenom='".$_POST['prenom']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $sql="UPDATE profil SET age='".$_POST['age']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $sql="UPDATE profil SET image='".$_POST['image']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $sql="UPDATE profil SET interet='".$_POST['interet']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $dest="page.php";
             echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';


          }
          else {

            $sql = "INSERT INTO profil (nom,prenom,age,image,interet,pseudo) VALUES ('".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['age']."','".$_POST['image']."','".$_POST['interet']."','".$_SESSION['login']."')";
            $req=$conn->query($sql);
            $dest="page.php";
             echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
          }
          }
        }


 ?>
<?php include("footer.php");
?>
