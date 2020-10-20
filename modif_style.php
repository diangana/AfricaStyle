<?php
include("barre.php");
include("upload_form.php"); ?>
        <form  method="POST" action="">
          <input type="text" name="image" readonly placeholder="image" value=<?php echo $images?>>

		<input type="text" name="nom" placeholder="nom du style" required />
		<textarea name="description" rows="8" cols="45" placeholder="description" ></textarea><br/>
    <input type="submit" value="OK">
</form>
<?php if (isset($_POST['nom']))
{
  include("modifier_style.php");
  $err=modif_style($_POST['nom'],$_POST['description'],$_POST['image']);
  if ($err==1)
  {
    $dest="style.php";
     echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
  }
}
    include("footer.php");
 ?>
