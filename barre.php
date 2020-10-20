<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<HTML>
  <head>
    <meta  charset = " utf-8 " >
    <title> africa style</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link href='https://fonts.googleapis.com/css?family=Codystar' rel='stylesheet'>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "stylesheet" href = "af_css.css">
</head>
<body>
  <h1>Bienvenue sur AfricaStyle</h1>
  <button onclick="topFunction()" id="myBtn" title="retourner au debut">haut</button>
<?php
if(!isset($_SESSION['login']))
{

  include('connexion.php');
  die('');

}
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="page.php">AfricaStyle</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a class="active" href="index.php">accueil</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">cuisine <span class="caret"></span></a>
        <div class="dropdown-menu">
          <ul>
          <a href="cuisine.php">liste<br/> </a>
          <a href="ajout_cuisine.php">ajouter un plat<br/></a>
          <a href="modif_cuisine.php">modifier un plat<br/></a>
          <a href="cuisine_fav.php">favoris<br/></a>
          </ul>
          </div>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">style <span class="caret"></span></a>
        <div class="dropdown-menu">
          <ul>
          <a href="style.php">liste<br/></a>
          <a href="ajout_styles.php">ajouter un style<br/></a>
          <a href="modif_style.php">modifier un style<br/></a>
                <a href="style_fav.php">favoris<br/></a>
          </ul>
        </div>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">chat <span class="caret"></span></a>
      <div class="dropdown-menu">
      <ul>
      <a href="chat.php">chat<br/></a>
      <a href="groupe.php"> groupes</a>
      </ul>
      </div>
      </li>
      <li class="right"><a href="deconnexion.php">deconnexion</a></li>
    </ul>
  </div>
</nav>
<?php
$rep=$conn->query("SELECT pseudo from chat where a='".$_SESSION['login']."'and etat='non lu'");
if($donnees=$rep->fetch_assoc())
{?>
  <div class="alert info alert-dismissible fade show "role="alert">
    <span class="closebtn">&times;</span>
    <strong>Info!</strong> vous avez un nouveau message de <a href="chat.php?a=<?php echo $donnees['pseudo'];?>"><?php echo $donnees['pseudo'];?></a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
}
$sql="SELECT * from chat
INNER JOIN groupe ON groupe.id = chat.id_groupe
WHERE membre1='%".$_SESSION['login']."%'
or  membre2='%".$_SESSION['login']."%'
or  membre3='%".$_SESSION['login']."%'
or  membre4='%".$_SESSION['login']."%'
or  membre5='%".$_SESSION['login']."%' order by chat.id desc";
$req=$conn->query($sql);
if($donnees = $req->fetch_assoc())
{?>
  <div class="alert info alert-dismissible fade show "role="alert">
    <span class="closebtn">&times;</span>
    <strong>Info!</strong> vous avez un nouveau message de <a href="chat.php?a=<?php echo $donnees['pseudo'];?>"><?php echo $donnees['pseudo'];?></a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
}
?>
