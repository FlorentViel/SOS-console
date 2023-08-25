<?php require('includes/head.php');
require('includes/requestMark.php');?>

    <link href="asset/css/phone.css" rel="stylesheet">
    <title><?php echo $webTitle.$marque ?> </title>
</head>
<body>
    <?php require('includes/nav-bar.php');?>

    <div id="content" class="container">

    <?php include('includes/imageHeader.php')?>
   
       <main>


        <div id="border-bloc">

            <div>
                <div class="d-flex align-items-center justify-content-center mx-2">
                    <div class="circle-in-progess"></div>
                    <div class="trait-empty"></div>
                    <div class="circle-empty"></div>
                    <div class="trait-empty"></div>
                    <div class="circle-empty"></div>
                    <div class="trait-empty"></div>
                    <div class="circle-empty"></div>
                </div>
            </div>

            <p class="text-center playfair title-page display-5"><?php if($count > 0)
            {echo 'Choisez une marque de '.mb_strtolower($ligne['appelation'], 'UTF-8');} else{ echo 'Aucun résultat';} ?></p>

            <form class="form-search-page d-flex" method="GET"  action="" >
                <input class="search-bar loupe form-control me-2" name="recherche" type="search" 
                placeholder="Selection un appareil" aria-label="Search">
                <button class="btn btn-search btn-outline-success" name="envoyer" type="submit">Search</button>
            </form>
            <div class="d-flex justify-content-center flex-wrap">

                <?php  
            //Afficher le résultat dans un tableau
            if($count > 0 ) {
                foreach ($resultat as $key => $variable)
                {?>

        <form action="appareil.php" method="post">

        <figure class="figure">
        <button type="submit" value="<?php echo($resultat[$key]['Id_Marque']); ?>" name="appareil"><img class="img"
            src="images/appareil/<?php echo($resultat[$key]['image']); ?>" 
        class="figure-img img-fluid rounded" alt="<?php echo($resultat[$key]['marque']); ?>"></button>
        <figcaption id="caption-phone-1" class="figure-caption caption-style source-pro-sans h1"><?php echo($resultat[$key]['marque']); ?>
        </figcaption>
        </figure>
        </form>
        <?php 
                };
            }
        else{
            echo 'Aucun résultat trouvé';
        }?>
            </div>
        </div>

    </main>

    </div>

    <?php require('includes/footer.php'); ?>
</html>