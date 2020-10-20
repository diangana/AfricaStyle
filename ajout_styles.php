<?php
include("barre.php");
include("upload_form.php"); ?>
    <form enctype="multipart/form-data" action="" method="POST">
      <input type="text" name="image" readonly placeholder="image" value=<?php echo $images?>>
	<input type="text" name="nom" placeholder="nom du style" required />
		<textarea name="description" rows="8" cols="45" placeholder="description" required /></textarea><br/>
	  <input type="submit" value="OK">
    </form>
    <?php if (isset($_POST['nom']))
    {
      include("ajouter_styles.php");
      $err=ajout_style($_POST['description'],$_POST['image'],$_POST['nom'],$_SESSION['login']);
      if ($err==1) {
        $dest="style.php";
         echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';

      }
    }
    include("footer.php");
 ?>
