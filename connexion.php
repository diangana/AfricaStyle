<?php


/* Indique le bon format des entêtes (par défaut apache risque de les envoyer au standard ISO-8859-1)*/
//header('Content-type: text/html; charset=UTF-8');

/* Initialisation de la variable du message de réponse*/
$message = null;

/* Récupération des variables issues du formulaire par la méthode post*/
$pseudo = filter_input(INPUT_POST, 'pseudo');
$pass = filter_input(INPUT_POST, 'pass');

/* Si le formulaire est envoyé*/
if (isset($pseudo,$pass))
{

    /* Teste que les valeurs ne sont pas vides ou composées uniquement d'espaces */
    $pseudo = trim($pseudo) != '' ? $pseudo : null;
    $pass = trim($pass) != '' ? $pass : null;


  /* Si $pseudo et $pass différents de null */
  if(isset($pseudo,$pass))
  {
    include("config.php");
    /* Connexion */
    /*try
    {
      $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    }
    catch (PDOException $e)
    {
      exit('problème de connexion à la base');
    }*/

    /* Requête pour récupérer les enregistrements répondant à la clause : champ du pseudo et champ du mdp de la table = pseudo et mdp posté dans le formulaire */
    $requete = "SELECT * FROM login WHERE pseudo='".$pseudo."'  AND pass ='".$pass."'";
    echo $requete;
      /* Préparation de la requête*/
      $req_prep = $conn->query($requete);
      /* Exécution de la requête en passant les marqueurs et leur variables associées dans un tableau*/
      //$req_prep->mysqli_stmt_bind_param(array(':nom'=>$pseudo,':password'=>$pass));
      //$req_prep-> mysqli_stmt_execute();
      /* Création du tableau du résultat avec fetchAll qui récupère tout le tableau en une seule fois*/
      //$resultat = $req_prep->mysqli_stmt_fetch();
      //$req_prep->mysqli_stmt_close();

        /* Démarre une session si aucune n'est déjà existante et enregistre le pseudo dans la variable de session $_SESSION['login'] qui donne au visiteur la possibilité de se connecter.  */
        if($donnees=$req_prep->fetch_assoc())
          {
            if (!session_id())
            {
              session_start();
             $_SESSION['login'] = $donnees['pseudo'];

             $message = 'Bonjour '.htmlspecialchars($_SESSION['login']).', vous êtes connecté';
             $dest="page.php";
              echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
             exit;
            }
          }

      else
      {
        /* Par sécurité si plusieurs réponses de la requête mais si la table est bien construite on ne devrait jamais rentrer dans cette condition */
      include('connexion.php');
        die('');
      }

}
}
?>
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
  <button onclick="topFunction()" id="myBtn" title="retourner au debut">haut</button>

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
<div id = "connexion">
    <form action = "" method="post">
    <fieldset>Connexion</fieldset>
    <p><input type="text" name="pseudo" placeholder="Pseudo" id="pseudo" /></p>
    <p><input type="password" name="pass" placeholder="mot de passe" id="pass" /></p>
    <p><input type="submit" value="Envoyer" id = "valider" /></p>
    </form>
  </div>
    <?php
    include("footer.php");

?>
