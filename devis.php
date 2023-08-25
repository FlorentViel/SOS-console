    <?php require('includes/head.php');

        // Démarre la temporisation de sortie. Tant qu'elle est enclenchée, 
        //aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.

        // écrire sur le fichier txt 

        //$write = fopen("devis.txt","w");

        ob_start();

    
        // Rediriger vers une autre page si aucune checkbox n'a été coché 

            error_reporting(E_ERROR | E_PARSE);

            if($_POST['piece1'] == "" AND $_POST['piece2'] == "" AND $_POST['piece3'] == "" AND $_POST['piece4'] == "" 
            AND $_POST['piece5'] == "" AND $_POST['piece6'] == "" AND $_POST['piece7'] == "" AND $_POST['piece8'] == ""
            AND $_POST['piece9'] == "" AND $_POST['piece10'] == ""){
                header("Location: http://127.0.0.1/dev/SOS_CONSOLE/piece.php");
                exit();
                }

                // Création de variable qui est par défaut à "0" si les checks box sont non rempli. 
                // Ces variables remplissent un tableaux qui sera utile pour la request SQL afin d'afficher les pièces 
                // selectionné par l'utilisateur

                    $dev1="0";
                    $dev2="0";
                    $dev3="0";
                    $dev4="0";
                    $dev5="0";
                    $dev6="0";
                    $dev7="0";
                    $dev8="0";
                    $dev9="0";
                    $dev10="0";

                    
                    session_start();

                    // Récupération de l'ID de l'appareil
                    $_SESSION['appareil'] = $_POST['appareil'];
                    $appareil = $_SESSION['appareil'] ; 

                // Verification des checkbox si elles sont selectionnés

                    if($_POST['piece1']==""){$dev1='0';}else{$dev1=$_POST['piece1'];}
                    if($_POST['piece2']==""){$dev2='0';}else{$dev2=$_POST['piece2'];}
                    if($_POST['piece3']==""){$dev3='0';}else{$dev3=$_POST['piece3'];}
                    if($_POST['piece4']==""){$dev4='0';}else{$dev4=$_POST['piece4'];}
                    if($_POST['piece5']==""){$dev5='0';}else{$dev5=$_POST['piece5'];}
                    if($_POST['piece6']==""){$dev6='0';}else{$dev6=$_POST['piece6'];}
                    if($_POST['piece7']==""){$dev7='0';}else{$dev7=$_POST['piece7'];}
                    if($_POST['piece8']==""){$dev8='0';}else{$dev8=$_POST['piece8'];}
                    if($_POST['piece9']==""){$dev9='0';}else{$dev9=$_POST['piece9'];}
                    if($_POST['piece10']==""){$dev9='0';}else{$dev10=$_POST['piece10'];}

                // On créer un tableau avec les variables qui comprenne la valeur $_POST des checksboxs, donc soit un ID d'une pièce
                // Soit une valeur de 0

                    $ligne= array($dev1, $dev2, $dev3, $dev4, $dev5, $dev6, $dev7);

                // On join une virgule au tableau afin que celui-ci puisse être lu par le PHP

                    $variables_joins = join(',',$ligne);

                // Request SQL prix et calcule du prix total des pièces + execution de la request SQL

                    $query1 = $pdo->query("SELECT piece.prix , SUM(piece.prix) AS total FROM piece where Id_Piece IN ($variables_joins)");

                // Second request qui affiche en ligne chacune des pièces choisi avec leur prix unitaires
                
                    $query = $pdo->query("SELECT piece.Id_piece, piece.type, piece.prix FROM piece where Id_Piece IN ($variables_joins)");

                // Troisème request qui affichage le nom appareil et son image
                    $title = $pdo->query("SELECT appareil.nom, piece.Id_Appareil, Appareil.Id_Appareil, appareil.image_presentation FROM `Piece` JOIN `Appareil` ON piece.Id_Appareil = Appareil.Id_Appareil WHERE piece.Id_Appareil = $appareil");

                // envoie du resultat

                    $title->execute();
                    $query1->execute();

                // On publie toutes les lignes de la request SQL et on affiche le résultat dans le code HTML 
    
                    $resultat = $query->fetchAll();
                    $global = $query1->fetch(PDO::FETCH_ASSOC);
                    $rappel = $title->fetch(PDO::FETCH_ASSOC);
                
                
                ?>
    <link href="asset/css/devis.css" rel="stylesheet">
    <title>SOS CONSOLE</title>
</head>
  <body>
  <?php 
  require('includes/nav-bar.php'); ?>
  <div id="content" class="container">

<?php require('includes/imageHeader.php')?>

   <main>


        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center my-5">
                <div class="circle-in-validate"> </div>
                    <div class="trait-validate"></div>
                <div class="circle-in-validate"> </div>
                <div class="trait-validate"></div>
                <div class="circle-in-validate"></div>
                <div class="trait-validate"></div>
                <div class="circle-in-progess"></div>
            </div>
            <small style="color:grey; font-size:7px;">L'auteur est du symbole validé est <a href="https://creativecommons.org/licenses/by/3.0/legalcode">Creative Common BY</a></small>
        </div>  

        <div id="block-formulaire">
            <form action="actions/pdf.php" method="post">
            
            <p class="text-center my-5 playfair title-page display-5">Votre récapitulatif</p>

            <div>
                <div id="devis-header" class="d-flex mb-3 mx-3 justify-content-around align-items-center">
                    <img class="align-items-center" 
                    src="images/<?php echo $rappel['image_presentation']; ?>" 
                    alt="" width="250" height="250">
                    <div id="bloc-appareil" class="px-5 playfair font-18">
                        <p class="color-green display-6">Appareil séléctionné :<input id="prodId1" name="appareil" type="hidden" value="<?php echo ($rappel['Id_appareil'])?>"> 
                                    <?php echo $rappel['nom']; ?></input></p>
                    </div>
                </div>
                
                <div class="d-flex mx-3">

                    
                        <table class="table table-striped table-bordered background-devis">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Prix</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    $a=1;
                                    $b=1;
                                    foreach ($resultat as $key => $variable){?>
                                <tr>
                                    <th scope="row"><?php echo $i;?> </th>
                                    <?php  ?>
                                    <td><input id="prodId1" name="<?php echo 'piece'.$a; ?>" type="hidden" value="<?php echo ($resultat[$key]['Id_piece'])?>"> 
                                    <?php echo ($resultat[$key]['type']); ?></input></td>
                                    <td><?php echo intval($resultat[$key]['prix']).' €'; ?></td>
                                </tr>
                                <?php  $a =$a+1; $i =$i+1; $b =$b+1; } ?>
                                <tr>
                                    <th scope="row"></th>
                                    <td class="fw-bold text-uppercase">Total</td>
                                    <td class="fw-bold font-weight-bold"><?php echo $global['total']. ' €';?></td>
                                </tr>
                                </tbody>
                        </table>
                    
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn-devis btn-search btn-outline-success m-3 link-success text-center link-btn">
                Obtenir un devis en Pdf</button>
                    <input id="prodId" name="appareil" type="hidden" value="<?php echo $rappel['Id_Appareil']?>">
            </form>
            </div>


            <p id="last" class="text-center title-page h1 my-3 playfair">Vous pouvez recevoir votre devis par mail</p>
            <p id="mail" class="text-center my-3 source-pro-sans">
             Pour recevoir votre devis, vous pouvez indiquer une adresse email, le devis sera envoyé directement à l'adresse notée</p>

             <form id="formulaire" method="post" action="confirmation-devis.php" class="source-pro-sans">

  <div class="mb-3 px-3 text-center w-100">
      <label for="exampleInputEmail1" class="form-label">
        Indiquez votre adresse email ci-dessous  <span class="text-danger font-weight-bold">*</span></label></label>
      <input type="text" class="form-control form-style" id="mail" placeholder="Votre email"  aria-describedby="emailHelp">
  </div>

  <div class="d-flex justify-content-center">
      <button type="submit" name="envoyer" class="btn btn-search btn-outline-success playfair">Envoiez l'email</button>
  </div>
</form>

<p class="text-danger text-right">Champs obligatoire *</p>
        </div>

            
            </main>
        </div>
    
    <?php require('includes/footer.php'); ?>

</body>
</html>