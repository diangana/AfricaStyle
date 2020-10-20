
    <p><h1>modifier un plat</h1></p>
<?php
include("barre.php");
include("upload_form.php");
?>
    <form  method="POST" action="">
      <input type="text" name="image" readonly placeholder="image" value=<?php echo $images?>>
	<input type="text" name="plas" placeholder="Nom du plat" required />
		<textarea name="ingredients" rows="8" cols="45" placeholder="ingredients" ></textarea>
		<textarea name="recette" rows="8" cols="45" placeholder="recette"></textarea><br/>
	  <input type="submit" value="OK">
    </form>
    <?php if (isset($_POST['plas']))
    {
      include("modif_plas.php");
      $err=modif_plat($_POST['plas'],$_POST['ingredients'],$_POST['recette'],$_POST['image']);
      if ($err==1) {
        $dest="cuisine.php";
         echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
      }

    }include("footer.php");
?>
