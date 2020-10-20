<?php
function groupe($nom,$membre1,$membre2,$membre3,$membre4,$membre5)
{
  global $conn;
  $sql="SELECT pseudo FROM login WHERE pseudo='".$membre2."'";
  $rep=$conn->query($sql);
  if(!$rep->fetch_assoc())
  {
    echo " se profil n'existe pas";
    return 0;
  }
    else
    {
    $sql="SELECT pseudo FROM login WHERE pseudo='".$membre3."'";
    $rep=$conn->query($sql);
      if(!$rep->fetch_assoc())
      {
        echo " se profil n'existe pas";
        return 0;
      }
    else
    {
      $sql="SELECT pseudo FROM login WHERE pseudo='".$membre4."'";
      $rep=$conn->query($sql);
      if(!$rep->fetch_assoc())
      {
        if ($membre4=="") {
        } else {
          echo " se profil n'existe pas";
          return 0;
        }

      }
      else
      {

        $sql="SELECT pseudo FROM login WHERE pseudo='".$membre5."'";
        $rep=$conn->query($sql);
        if(!$rep->fetch_assoc())
        {
            if ($membre5=="") {

            } else {
              echo " se profil n'existe pas";
              return 0;
            }

        }
          else
        {
        $sql = "INSERT INTO  groupe(nom,membre1,membre2,membre3,membre4,membre5) VALUES ('".$nom."','".$membre1."','".$membre2."','".$membre3."','".$membre4."','".$membre5."')";
        $req=$conn->query($sql);
        //$result=$req->fetch_assoc();
        return 1;
        }
      }
    }
  }
}?>
<?php
include("config.php");
function chat($pseudo,$message,$groupe)
{
  global $conn;
      $sql = "INSERT INTO  chat(pseudo,message,id_groupe,date) VALUES ('".$pseudo."','".$message."','".$groupe."',NOW())";
      $req=$conn->query($sql);
      //$result=$req->fetch();
      return 1;
}
include("barre.php");
$sql="DELETE FROM groupe where TO_SECONDS(date) < (TO_SECONDS(now()) - (30 * 24 * 3600)) ";
$req=$conn->query($sql);
 ?>
<h2>chat de groupe</h2>
<button onclick="topFunction()" id="myBtn" title="retourner au debut">haut</button>
<?php
if(!isset($_GET["id_groupe"]))
{
  ?>
  groupes:
  <?php
$sql="SELECT * FROM groupe where membre1 = '".$_SESSION['login']."' or  membre2 = '".$_SESSION['login']."' or  membre3 = '".$_SESSION['login']."' or  membre4 = '".$_SESSION['login']."' or  membre5 = '".$_SESSION['login']."' ";
$req=$conn->query($sql);
  while($donnees = $req->fetch_assoc())
  {
    ?>
    <h4><a href="groupe.php?id_groupe=<?php echo $donnees["id"];?>"><?php echo $donnees["nom"] ;?></a></h4>
    <?php
  }
  ?>
  <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#groupe">crée un groupe</button><br/>
   <div id="groupe" class="collapse">
   <h2>créé un chat de 3 à 5 personnes</h2>
  <form action="" method="post">

  <input type="text" name="nom" placeholder=" nom du groupe" required />
   <input type="text" name="membre2" placeholder="ami 1" required />
   <input type="text" name="membre3" placeholder="ami 2" required />
  <input type="text" name="membre4" placeholder="ami 3" />
 <input type="text" name="membre5" placeholder="ami 4" /><br/>
    <input type="submit" value="créé" />

</form>
</div>

  <?php
  if (isset($_POST["membre2"]))
  {
    $err=groupe($_POST["nom"],$_SESSION['login'],$_POST["membre2"],$_POST["membre3"],$_POST["membre4"],$_POST["membre5"]);
    if ($err==0) {
      echo "un de vos amis n'existe pas";
    }
    else {
      $dest="groupe.php";
       echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
    }
  }
  }
if (isset($_GET["id_groupe"]))
{
  ?>
  <form action="" method="post">

    <textarea name="message" rows="3" cols="45" placeholder="message" required></textarea><br />

    <input type="submit" value="Envoyer" />

  </form>
  <?php
  $sql="SELECT * from chat
  INNER JOIN groupe ON groupe.id = chat.id_groupe and groupe.id= '".$_GET["id_groupe"]."' order by chat.id desc limit 20";
  $req=$conn->query($sql);
  while($donnees = $req->fetch_assoc())
  {
    if($donnees['pseudo']==$donnees["membre1"])
    {
      if($donnees['pseudo']==$_SESSION['login'])
      {
      ?><div class="moi">
        <div class="col-sm-3">
      <h4><i>moi</i>:</h4>
      <i><?php echo $donnees['date'];?></i>
      </div>
        <div class="col-sm-8">
         <big><?php echo $donnees['message'];?></big>
         </div>
         <br/><i>lu</i>
         </div>
        <?php }
      else {
        ?>
        <div class="membre1">
          <div class="col-sm-3">
        <h4><i><?php echo $donnees['pseudo'];?></i>:</h4>
        <i><?php echo $donnees['date'];?></i>
        </div>
          <div class="col-sm-8">
          <big><?php echo $donnees['message'];?></big>
        </div>
        <br/><i>lu</i>
        </div>
        <?php
      }
    }
    if($donnees['pseudo']==$donnees["membre2"])
    {
      if($donnees['pseudo']==$_SESSION['login'])
      {
      ?><div class="moi">
        <div class="col-sm-3">
      <h4><i>moi</i>:</h4>
      <i><?php echo $donnees['date'];?></i>
    </div>
        <div class="col-sm-8">
         <big><?php echo $donnees['message'];?></big>
         </div>
         <br/><i>lu</i>
         </div>
        <?php }
      else {
        ?>
        <div class="membre2">
          <div class="col-sm-3">
        <h4><i><?php echo $donnees['pseudo'];?></i>:</h4>
        <i><?php echo $donnees['date'];?></i>
        </div>
          <div class="col-sm-8">
          <big><?php echo $donnees['message'];?></big>
        </div>
        <br/><i>lu</i>
        </div>
        <?php
      }
      }
    if($donnees['pseudo']==$donnees["membre3"])
    {
      if($donnees['pseudo']==$_SESSION['login'])
      {
      ?><div class="moi">
        <div class="col-sm-3">
      <h4><i>moi</i>:</h4>
      <i><?php echo $donnees['date'];?></i>
    </div>
        <div class="col-sm-8">
         <big><?php echo $donnees['message'];?></big>
         </div>
         <br/><i>lu</i>
         </div>
        <?php }
      else {
        ?>
        <div class="membre3">
          <div class="col-sm-3">
        <h4><i><?php echo $donnees['pseudo'];?></i>:</h4>
        <i><?php echo $donnees['date'];?></i>
      </div>
          <div class="col-sm-8">
          <big><?php echo $donnees['message'];?></big>
        </div>
        <br/><i>lu</i>

        </div><?php
      }
    }
    if($donnees['pseudo']==$donnees["membre4"])
    {
      if($donnees['pseudo']==$_SESSION['login'])
      {
      ?><div class="moi">
        <div class="col-sm-3">
      <h4><i>moi</i>:</h4>
      <i><?php echo $donnees['date'];?></i>
    </div>
        <div class="col-sm-8">
         <big><?php echo $donnees['message'];?></big>
         </div>
         <br/><i>lu</i>
         </div>
        <?php }
      else {
        ?>
        <div class="membre4">
          <div class="col-sm-3">
        <h4><i><?php echo $donnees['pseudo'];?></i>:</h4>
          <i><?php echo $donnees['date'];?></i>
        </div>
          <div class="col-sm-8">
          <big><?php echo $donnees['message'];?></big>
        </div>
        <br/><i>lu</i>
        </div><?php
      }
  }
    if($donnees['pseudo']==$donnees["membre5"])
    {
      if($donnees['pseudo']==$_SESSION['login'])
      {
      ?><div class="moi">
        <div class="col-sm-3">
      <h4><i>moi</i>:</h4>
        <i><?php echo $donnees['date'];?></i>
      </div>
        <div class="col-sm-8">
         <big><?php echo $donnees['message'];?></big>
         </div>
         <br/><i>lu</i>
         </div>
        <?php }
      else {
        ?>
        <div class="membre5">
          <div class="col-sm-3">
        <h4><i><?php echo $donnees['pseudo'];?></i>:</h4>
          <i><?php echo $donnees['date'];?></i>
        </div>
          <div class="col-sm-8">
          <big><?php echo $donnees['message'];?></big>
        </div>
        <br/><i>lu</i>
        </div>
        <?php
      }
  }

}
if (isset($_POST['message']))
{
$err=chat($_SESSION['login'],$_POST['message'],$_GET['id_groupe']);
if ($err==1) {
  $lien="groupe.php?id_groupe=".$_GET['id_groupe']."";
   echo '<script language="JavaScript">window.location=\'' . $lien . '\'</script>';
}
}

}

  include("footer.php");
   ?>
