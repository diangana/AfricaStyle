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
session_start();
if(!isset($_SESSION['login']))
{
  ?>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="page.php">AfricaStyle</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a class="active" href="index.php">accueil</a></li>
        <li><a class="active" href="index.php">connexion</a></li>
        <li><a class="active" href="inscription.php">inscription</a></li>
      </ul>
    </div>
  </nav>
  <fieldset>inscription</fieldset>

    <form action = "" method = "post">
    <p><input type = "text" name = "pseudo" placeholder="Pseudo" id = "pseudo" /></p>
    <p><input type = "password" name = "pass" placeholder="mot de passe" id = "pass" /></p>
    <p><input type = "submit" value = "Envoyer" id = "valider" /></p>
    </form>
    <?php if (isset($_POST['pseudo']))
    {

      include("config.php");
      function ajout_login($pseudo,$pass)
      {
        global $conn;
        $sql = "INSERT INTO login (pseudo,pass,date) VALUES ('".$pseudo."', '".$pass."', NOW())";
        $req=$conn->query($sql);
        return 1;

      }
      $err=ajout_login($_POST['pseudo'],$_POST['pass']);
      if ($err==1) {
        $dest="index.php";
         echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
      }
    }
  }
      include("footer.php");

  ?>
