<?php
include("barre.php");
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- image a l'interieur -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <a href="style.php"><img src="image/tuto.jpg" class="img-circle" alt="style.php" width="400" height="400"></a>
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <a href="style.php"><img src="image/robe.jpg" class="img-circle" alt="style.php" width="400" height="400"></a>
        <div class="carousel-caption">
        </div>
      </div>
        <div class="item">
          <a href="cuisine.php"><img src="image/tiebp.jpg" class="img-circle" alt="cuisine.php" width="500" height="500"></a>
          <div class="carousel-caption">
          </div>
      </div>
      <div class="item">
        <a href="cuisine.php"><img src="image/beignet.jpeg" class="img-circle" alt="cuisine.php" width="400" height="400"></a>
        <div class="carousel-caption">
        </div>
    </div>
    <!-- fleche pour retourner le carousel -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  <p><br/>Africa style est le 1er site de partage d'idée 100% Africain<br/>
  ce site à pour but de partager les recettes ou des idées vetements,coiffure...<br></p>
<?php include("footer.php");
 ?>
