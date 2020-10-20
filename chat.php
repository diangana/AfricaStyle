+<?php
function chat($pseudo,$message,$a)
{
  global $conn;
  $sql="SELECT pseudo FROM login WHERE pseudo='".$a."'";
  $rep=$conn->query($sql);
  if(!$rep->fetch_assoc())
  {
    $sql="SELECT nom FROM groupe WHERE nom='".$a."'";
    $rep=$conn->query($sql);
    if(!$rep->fetch_assoc())
    {
      echo " se profil n'existe pas";
      return 0;
    }
    else {
      $sql = "INSERT INTO  chat(pseudo,message,a,date) VALUES ('".$pseudo."','".$message."','".$a."',NOW())";
      $req=$conn->query($sql);
      //$result=$req->fetch();
      return 1;
    }

  }
  else {
    $sql = "INSERT INTO  chat(pseudo,message,a,date) VALUES ('".$pseudo."','".$message."','".$a."',NOW())";
    $req=$conn->query($sql);
    //$result=$req->fetch();
    return 1;
  }
} ?>
  <?php
  //alerte message
  include("barre.php");
$sql="DELETE FROM chat where TO_SECONDS(date) < (TO_SECONDS(now()) - (30 * 24 * 3600)) ";
$req=$conn->query($sql);
$sql="UPDATE login SET date=NOW() WHERE pseudo='".$_SESSION['login']."'";
$req=$conn->query($sql);
if(!isset($_GET["a"]))
{
  ?>
  <form  method="GET" action="">
    <input type="text" name="recherche" placeholder="recherche"><input type="submit" value="chercher">
  </form>
  <?php
  if(isset($_GET['recherche']))
  {

  $sql="SELECT * from login WHERE
  pseudo LIKE '%".$_GET['recherche']."%'";
  $rep = $conn->query($sql);
  while($donnees = $rep->fetch_assoc())
  {
    ?>
    <div class="col-sm-3">
    <h4><a href="chat.php?a=<?php echo $donnees["pseudo"];?>"><?php echo $donnees["pseudo"] ;?></a></h4>
      <?php
      $rep=$conn->query("SELECT * from profil where pseudo='".$donnees["pseudo"]."'");
        while($donnees = $rep->fetch_assoc())
        {?>
     <a href="chat.php?a=<?php echo $donnees["pseudo"];?>"><img src="/~diana/upload/<?php  echo $donnees['image']; ?>" alt="" width="100" height="100"></a>
    <?php
  }
  ?></div></div><?php
  }
}
else {
  $sql="SELECT * FROM login";
  $req=$conn->query($sql);
  while($donnees = $req->fetch_assoc())
  {
    ?>
    <?php

    if($donnees["pseudo"]!=$_SESSION['login']){
      ?>
      <div class="col-sm-3">
        <h4><a href="chat.php?a=<?php echo $donnees["pseudo"];?>"><?php echo $donnees["pseudo"] ;?></a></h4>
        <?php
        $rep=$conn->query("SELECT * from profil where pseudo='".$donnees["pseudo"]."'");
        while($donnees = $rep->fetch_assoc())
        {?>
          <a href="chat.php?a=<?php echo $donnees["pseudo"];?>"><img src="/~diana/upload/<?php  echo $donnees['image']; ?>" alt="" width="100" height="100"></a>
          <?php
        }
        ?></div><?php
      }
    }
}
}
if(isset($_GET["a"]))
{
  $rep=$conn->query("SELECT * from profil where pseudo='".$_GET['a']."'");
    while($donnees = $rep->fetch_assoc())
    {?>
      <h3><?php echo $donnees['pseudo'];?></h3>
      <a href="page.php?pseudo=<?php  echo $donnees['pseudo']; ?>"><img src="/~diana/upload/<?php  echo $donnees['image']; ?>" alt="" width="100" height="100"></a><br/>
      <?php
    }
//pour voir la derniere connexion de l'autre


  echo $date->diff($now)->format("vu il y a %d days, %h hours and %i minuts");
  ?>

   <form action="" method="post">
     <p>
     <textarea name="message" rows="3" cols="45" placeholder="message" required /></textarea><br />

     <input type="submit" value="Envoyer" />
 </p>
 </form>

 <?php
 $sql="SELECT date FROM login WHERE pseudo='".$_GET['a']."'";
 $req=$conn->query($sql);
 $result=$req->fetch_assoc();
 $date = new DateTime($result['date']);
 $now = new DateTime();
 $sql="SELECT date FROM login WHERE pseudo='".$_SESSION['login']."'";
 $req=$conn->query($sql);
 $result=$req->fetch_assoc();
 $datemoi = new DateTime($result['date']);
//voir si le message a été lu
  $sql="SELECT * from chat where pseudo='".$_SESSION['login']."' and a='".$_GET['a']."' or pseudo='".$_GET['a']."' and a='".$_SESSION['login']."' order by id desc limit 10";
  $req=$conn->query($sql);
  if($donnees = $req->fetch_assoc())
  {
    if($donnees['pseudo']==$_SESSION['login'])
    {
    $datemess=new DateTime($donnees['date']);
    if($datemess<$date)
    {
      $sql="UPDATE chat SET etat='lu' WHERE message='".$donnees['message']."' and pseudo='".$_SESSION['login']."' and a='".$_GET['a']."' and date='".$donnees['date']."' order by id desc limit 10";
      $req=$conn->query($sql);
    }
    else {
      $sql="UPDATE chat SET etat='non lu' WHERE message='".$donnees['message']."' and pseudo='".$_SESSION['login']."' and a='".$_GET['a']."' and date='".$donnees['date']."' order by id desc limit 10";
      $req=$conn->query($sql);
    }
    }
  else {
    $datemess=new DateTime($donnees['date']);
    if($datemess<$datemoi)
    {
      $sql="UPDATE chat SET etat='lu' WHERE message='".$donnees['message']."' and pseudo='".$_GET['a']."' and a='".$_SESSION['login']."' and date='".$donnees['date']."' order by id desc limit 10";
      $req=$conn->query($sql);
    }
    else {
      $sql="UPDATE chat SET etat='non lu' WHERE message='".$donnees['message']."'and pseudo='".$_GET['a']."' and a='".$_SESSION['login']."' and date='".$donnees['date']."' order by id desc limit 10";
      $req=$conn->query($sql);
    }
  }
}
//afficher les messages
  $sql="SELECT * from chat where pseudo='".$_SESSION['login']."' and a='".$_GET['a']."' or pseudo='".$_GET['a']."' and a='".$_SESSION['login']."' order by id desc limit 10";
  $req=$conn->query($sql);
  while($donnees = $req->fetch_assoc())
  {
    if($donnees['pseudo']==$_SESSION['login'])
    {
    ?><div class="moi">
      <div class="col-sm-3">
    <h4><i>moi</i>:</h4>
    <i>le <?php echo $donnees['date'];?></i>
    </div>
      <div class="col-sm-8">
      <big><?php echo $donnees['message'];?></big><br/>
       </div>
       <br/><i><?php echo $donnees['etat']; ?></i>
       </div>
      <?php
    }
    else {
      ?>
      <div class="membre2">
        <div class="col-sm-3">
      <h4><i><?php echo $donnees['pseudo'];?></i>:</h4>
      <i>le <?php echo $donnees['date'];?></i>
      </div>
        <div class="col-sm-8">
        <big><?php echo $donnees['message'];?></big><br/>
      </div>
      <br/><i><?php echo $donnees['etat']; ?></i>
    </div>
    <?php
    }
}
if (isset($_POST['message']))
{
  $err=chat($_SESSION['login'],$_POST['message'],$_GET['a']);
  if ($err==0)
  {
    echo "une erreur à eu lieu lors de l'envoi";
  }
  else {
    $lien="chat.php?a=".$_GET['a']."";
     echo '<script language="JavaScript">window.location=\'' . $lien . '\'</script>';
  }
}
}
include("footer.php");
 ?>
