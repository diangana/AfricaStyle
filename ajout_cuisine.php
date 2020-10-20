<?php
include("barre.php");
include("upload_form.php");?>
<form enctype="multipart/form-data" action="" method="POST">
  <input type="text" name="image" readonly placeholder="image" value= <?php echo $images?>>
		<input type="text" name="plas" placeholder="nom du plat" required >
		<textarea name="ingredients" rows="8" cols="45" placeholder="ingredients" required ></textarea>
		<textarea name="recette" rows="8" cols="45" placeholder="recette" required ></textarea><br/>
	  <p><input type="submit" value="OK"></p>
    </form>
    <?php if (isset($_POST['plas']))
    {
      include("ajout_plas.php");
      $err=ajout_plat($_POST['plas'],$_POST['ingredients'],$_POST['recette'],$_POST['image'],$_SESSION['login']);
      if ($err==1) {
        $dest="cuisine.php";
         echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
      }
    }
    include("footer.php");
?>
