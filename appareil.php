<?php require('includes/head.php');
      require('includes/requestAppareil.php')  ?>
    <link href="asset/css/phone.css" rel="stylesheet">
    <title>SOS CONSOLES</title>
</head>
<body>
    <?php require('includes/nav-bar.php'); ?>

    <div id="content" class="container">

 <?php include('includes/imageHeader.php')?>

    <main>


        <div id="border-bloc">

            <div class="text-center">



                <div class="d-flex align-items-center justify-content-center mx-2">
                    <div class="circle-in-validate"> </div>
                    <div class="trait-validate"></div>
                    <div class="circle-in-progess"></div>
                    <div class="trait-empty"></div>
                    <div class="circle-empty"></div>
                    <div class="trait-empty"></div>
                    <div class="circle-empty"></div>
                </div>
                <small style="color:grey; font-size:7px;">L'auteur est du symbole validé est <a href="https://creativecommons.org/licenses/by/3.0/legalcode">Creative Common BY</a></small>

            </div>
            <p class="text-center playfair title-page display-5"><?php if($count > 0){echo 'Choissez votre ' . mb_strtolower($ligne['appelation']). ' de marque ' .  $ligne['marque'];} else{ echo 'Aucun résultat';} ?></p>
            

            <form class="form-search-page d-flex" method="GET"  action="" >
                <input class="search-bar loupe form-control me-2" name="recherche" type="search" placeholder="Selection un appareil"
                    aria-label="Search">
                <button class="btn btn-search btn-outline-success" name="envoyer" type="submit">Recherchez</button>
            </form>


            <div class="d-flex justify-content-center flex-wrap">


                <form action="piece.php" method="post">

                <?php 

                    if($count > 0 ) {
    
                        foreach ($resultatAppareil as $key => $variable)
                        {?>
                        <figure class="figure">
                            <button type="submit" value="<?php echo($resultatAppareil[$key]['Id_appareil']); ?>" name="appareil">
                            <img id="img-phone-1" class="img" src="images/<?php echo($resultatAppareil[$key]['logo']); ?>" 
                            class="figure-img img-fluid rounded" alt="<?php echo($resultatAppareil[$key]['nom']); ?>"></button>
                            <figcaption id="caption-phone-1" class="figure-caption caption-style source-pro-sans h1"><?php echo($resultatAppareil[$key]['nom']); ?>
                            </figcaption>
                        </figure>  
                        <?php }
                    }
                    else {
                        echo 'Aucun résultat';
                    };
                    ?>
                </form>
            </div> 
            <form action="marque.php" method="post" >
                <div class="d-flex justify-content-end mx-5 mt-5 back-btn">      
                    <button class="playfair btn text-end btn-outline-success" name="type" type="submit" value="<?php echo $ligne['Id_type'];?>">
                        <div class="">Retournez à la page précédente </div>
                    </button>
            </div>
            </form>
        </div>
        </main>
    </div>

    <?php require('includes/footer.php'); ?>
</html>