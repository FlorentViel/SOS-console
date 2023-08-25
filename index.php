
<?php require('includes/head.php');
      require('includes/request-index.php')?>
<link href="asset/css/accueil.css" rel="stylesheet">
<title><?php echo $webTitle.'Accueil' ?> </title>
</head>
  <body>
<?php require('includes/nav-bar.php');?>

<div id="content" class="container">

 <?php include('includes/imageHeader.php')?>
1
    <main>
      
      <div id ="new" class="playfair py-4 px-4">
        <p class="font-weight-bold text-center display-6">  
        <?php if(empty($News['titre'])){
            echo " Aucune News pour l'instant ";
          }
          
          else {
            echo $News['titre'];
          }?>    
      </p>
        <p class='text-center font-weight-bold text-48 '>
          <?php if(empty($News['texte'])){
            echo " ";
          }
          
          else {
            echo $News['texte'];
          }?>
          </p>

      </div>

      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>

        </div>
        <div class="carousel-inner">

          <div class="carousel-item active">
            <?php if(!empty($resultatCarousel[0]['Id_Carouselle'])){ ?>
            <img src="images/<?php if(!empty($resultatCarousel[0]['image'])){echo $resultatCarousel[0]['image'];}else{echo $resultatCarousel[99]['image'];} ?>" class="d-block w-100" style="height: 600px !important; alt="<?php if (!empty($resultatCarousel[0]['titre'])){echo $resultatCarousel[0]['titre'];} else{ echo ''; }?>">
            <div class="carousel-caption d-none d-md-block">
              <h5><?php if(!empty($resultatCarousel[0]['titre'])){echo $resultatCarousel[0]['titre'];}?></h5>
              <p><?php if(!empty($resultatCarousel[0]['texte'])){echo $resultatCarousel[0]['titre'];}else{ echo ''; }?></p>
            </div>
          </div>
          <?php } ?>
          <div class="carousel-item">
            <img src="images/<?php if(!empty($resultatCarousel[1]['image'])){echo $resultatCarousel[1]['image'];}else{echo $resultatCarousel[99]['image'];} ?>" class="d-block h-30 w-100" style="height: 600px !important; alt="<?php if (!empty($resultatCarousel[1]['titre'])){echo $resultatCarousel[1]['titre'];} else{ echo ''; } ?>">
            <div class="carousel-caption d-none d-md-block">
              <h5><?php if (!empty($resultatCarousel[1]['titre'])){echo $resultatCarousel[1]['titre'];} else{ echo ''; }?></h5>
              <p><?php if(!empty($resultatCarousel[1]['texte'])){echo $resultatCarousel[1]['titre'];}else{ echo ''; }?></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/<?php if(!empty($resultatCarousel[2]['image'])){echo $resultatCarousel[2]['image'];}else{ echo $resultatCarousel[99]['image']; }?>" class="d-block h-30 w-100" style="height: 600px !important; alt="<?php if (!empty($resultatCarousel[2]['titre'])){echo $resultatCarousel[2]['titre'];} else{ echo ''; } ?>">
            <div class="carousel-caption d-none d-md-block">
              <h5><?php if(!empty($resultatCarousel[2]['titre'])){echo $resultatCarousel[2]['titre'];}else{ echo ''; }?></h5>
              <p><?php if(!empty($resultatCarousel[2]['texte'])){echo $resultatCarousel[2]['titre'];}else{ echo ''; }?></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/<?php if(!empty($resultatCarousel[3]['image'])){echo $resultatCarousel[3]['image'];}else{echo $resultatCarousel[99]['image'];} ?>" class="d-block h-30 w-100" style="height: 600px !important; alt="<?php if (!empty($resultatCarousel[3]['titre'])){echo $resultatCarousel[3]['titre'];} else{ echo ''; } ?>">
            <div class="carousel-caption d-none d-md-block">
              <h5><?php if(!empty($resultatCarousel[3]['titre'])){echo $resultatCarousel[3]['titre'];}else{ echo ''; }?></h5>
              <p><?php if(!empty($resultatCarousel[3]['texte'])){echo $resultatCarousel[3]['titre'];}else{ echo ''; }?></p>
            </div>
          </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        
      </div>

      <div id="choice" class="playfair text-center text-white">

        <h2 class="title-page display-4">Choisir votre appareil</h2>

        <form action="marque.php" method="post">
        <div class="card-group d-flex justify-content-center choice-card py-2">
          <?php
        foreach ($resultat as $key => $variable)
        {
          ?>
          <button class="btn-no-style card-link card-bloc pb-2" name="type" type="submit" value="<?php echo($resultat[$key]['Id_type']); ?>">
            <div class="card bg-dark text-white bloc-card">
              <img class="card-img" src="<?php echo'./images/'.$resultat[$key]['image'];?>" alt="<?php echo $resultat[$key]['appelation'] ?>">
              <div class="card-img-overlay">
                <h5 class="card-title"><?php echo $resultat[$key]['appelation'] ?></h5>
              </div>
            </div>
          </button>
        <?php 
        }
        ?>
          </div>
        </form>

    </main>

</div>
    
   <?php require('includes/footer.php'); ?>
  </body>
</html>