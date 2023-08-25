<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php';?>
    <title>SOS CONSOLES</title>
    <link href="asset/css/piece.css" rel="stylesheet">
</head>
<body>
    <?php require('includes/nav-bar.php');?>
    <div id="content" class="container">

    <?php require('includes/imageHeader.php')?>

    <main>
    
    <div class="pt-5 text-center">

      <div class="text-center">
        <div class="d-flex align-items-center justify-content-center mx-2">
          <div class="circle-in-validate"></div>
          <div class="trait-validate"></div>
          <div class="circle-in-validate"></div>
          <div class="trait-validate"></div>
          <div class="circle-in-progess"></div>
          <div class="trait-empty"></div>
          <div class="circle-empty"></div>
        </div>
        <small style="color:grey; font-size:7px;">L'auteur est du symbole validé est <a href="https://creativecommons.org/licenses/by/3.0/legalcode">Creative Common BY</a></small>
      </div>       

        <div id="phone-block">

          <p class="text-center playfair title-page display-4 mb-5">Choisir les pièces</p>

          <div id="arrow"><img src="./asset/images/icon/Arrow_1.png"/></div>


          <?php 

            // Récupération des données du formulaire
            
            $appareil = $_POST['appareil']; 
            
            // query affichage du titre
            $title = $pdo->query("SELECT image_piece FROM `Appareil` JOIN `Piece` ON Appareil.Id_Appareil = Piece.Id_appareil WHERE appareil.Id_Marque = $appareil");

            // excution de la requete

            $title->execute();


            // envoie du resultat

            $ligne = $title->fetch(PDO::FETCH_ASSOC);

            
            $query = $pdo->query("SELECT Id_Piece, piece.type, piece.Id_appareil FROM `piece` JOIN `Appareil` ON Appareil.Id_appareil = piece.Id_appareil WHERE piece.Id_appareil = $appareil");

            // affichage appareil 

            $resultat = $query->fetchAll();

            //Afficher le résultat         


            // 
            $query->fetchAll();
          ?>


            <div class="d-flex align-items-center justify-content-center mb-5">
                <div class="flex-column">
                <form action="devis.php" method="post">
                  <?php $i=0;
                  foreach ($resultat as $key => $variable){$i =$i+1;?>
                      <div class="form-check">
                          <input class="form-check-input checkbox-color" type="checkbox" name="<?php echo 'piece'.$i ?>" value="<?php echo($resultat[$key]['Id_Piece']); ?>" id="<?php echo 'flexCheckDefault'.$i?>">
                          <input id="prodId" name="appareil" type="hidden" value="<?php echo ($resultat[$key]['Id_appareil'])?>">
                          <label class="form-check-label source-pro-sans" for="flexCheckDefault">
                          <?php echo($resultat[$key]['type']);?>
                          </label>
                      </div>
                  <?php } ?>
                </div>
                <div><img src ="images/<?php echo $ligne['image_piece']?>" alt="Appareil" id="img-piece" class="my-3"/></div>
              </div>

          </div>

          <div class="d-flex justify-content-center mt-4 pb-5">
                <button class="btn-devis btn-search btn-outline-success mt-3 link-btn link-success" 
                type="submit" name="envoyer">Envoyer</button>
                </form>
              </div>                


        </div>
        </main>
      </div>
    
    <?php require('includes/footer.php'); ?>

  </body>
</html>