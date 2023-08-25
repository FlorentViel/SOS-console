

<?php require('includes/head.php');
      ?>
<link href="asset/css/accueil.css" rel="stylesheet">
<link href="asset/css/admin.css" rel="stylesheet">

<title>SOS CONSOLES</title>

</head>
<body>
<?php //require('includes/nav-bar.php'); ?>
<section class="position-relative mt-5">



<?php  

require('includes/insert.php');

//$queryAppareil = $pdo->query()
//$queryAppareil = "INSERT INTO `carouselle` (`Id_Carouselle`, `titre`, `texte`, `image`) VALUES (NULL, '$number', '$title', , '$txt' '$file')"; ?>


<h1 id="send-note" class="text-center title-page display-4 my-5 playfair">Espace Administrateur</h1>


<div id="block-formulaire" class="mb-5">
    <form id="formulaire" class="playfair p-3" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

    <?php if(isset($errorMsg)){ echo $errorMsg ;} ?>

        <div class="mb-3 px-3 text-center w-100">
            <label for="exampleInputEmail1" class="form-label">
                Titre du message <span class="text-danger font-weight-bold">*</span></label></label>
            <input type="text" class="form-control form-style" id="Object" placeholder="Description" aria-describedby="emailHelp" name="titleNew" required>
        </div>
        <div class="form-floating mb-3 px-3">
            <textarea class="form-control form-style" placeholder="Laissez votre message" id="txtNew" name="txtNew" aria-describedby="With textarea" style="height: 100px"></textarea>
            <label class="comments-label" for="floatingTextarea2"> Votre Message <span class="text-danger font-weight-bold">*</span></label></label>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" name="submitNew" class="btn btn-search btn-outline-success mb-3">Envoyer</button>
        </div>

        <p class="text-danger mr-3">Champs obligatoire *</p>

    </form>
    <?php echo $error; ?>
    <div class="<?php echo $valid;?>"><?php echo $error; ?></div>

    <form method="post" action="">        
        <div class="d-flex justify-content-center">
            <button type="submit" name="deleteItem" value="1" class="btn btn-search btn-outline-success mb-3">Envoyer</button>
        </div>
    </form>

    <?php
    
    // Requête de supression de donnée en PHP 

if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
{
    $delete = $_POST['deleteItem'];
    $deleteImage = $pdo->query("DELETE FROM `bloc_news` where `Id_Block_NEWS` = $delete"); 
    $deleteImage->execute();


  echo "ça marche";
  var_dump($delete);
}
    ?>

</div>


<div id="block-formulaire" class="mb-5">
    <form enctype="multipart/form-data" id="formulaire" class="playfair p-3" method="post" action="<?php echo$_SERVER['PHP_SELF'] ?>">

    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>';} ?>

        <div class="">
            <div class="mb-3 px-3 text-center w-100">
                <label for="FirstName" class="form-label">
                    Numéro de l'image <span class="text-danger font-weight-bold">*</span>
                </label>
                <input type="number" class="form-control form-style" id="Number" name="Number" placeholder="Le numéro / ordre de l'image" aria-describedby="firstNameHelp">
            </div>
        </div>
        <div class="mb-3 px-3 text-center w-100">
            <label for="exampleInputEmail1" class="form-label">
              Titre du message <span class="text-danger font-weight-bold">*</span></label></label>
            <input type="text" class="form-control form-style" id="Object" placeholder="Description" aria-describedby="emailHelp" name="title" required>
        </div>
        <div class="form-floating mb-3 px-3">
            <textarea class="form-control form-style" placeholder="Leave a comment here" id="txt" name="txt" style="height: 100px"></textarea>
            <label class="comments-label" for="floatingTextarea2">Message <span class="text-danger font-weight-bold">*</span></label></label>
        </div>
        <div>
            <div class="mb-3 px-3 text-center w-100">
            <label for="exampleFormControlFile1">Ajout image</label>
            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
            <?php if(!empty($checkmessage)){echo "<span class='text-danger'>" .$checkmessage. "</span>";} else{}  ?>

            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" name="submit" value='Upload' class="btn btn-search btn-outline-success mb-3">Envoyer</button>
        </div>

        <p class="text-danger mr-3">Champs obligatoire *</p>

      </form>
        
        </div>
      
</div>



<div id="block-formulaire" class="mb-5">
    <form id="formulaire" class="playfair p-3" method="post" action="">

    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>';} ?>

        <div class="mb-3 px-3 text-center w-100">
                <label for="Name" class="form-label">Nom</label>
                <input type="text" class="form-control form-style" id="Name" name="mark" placeholder="Votre nom" aria-describedby="NameHelp">
        </div>
        <div class="mb-3 px-3 text-center w-100">
            <label for="exampleInputEmail1" class="form-label">
              Titre du message <span class="text-danger font-weight-bold">*</span></label></label>
            <input type="text" class="form-control form-style" id="Object" placeholder="Description" aria-describedby="emailHelp" name="title" required>
        </div>
        <div class="form-floating mb-3 px-3">
            <textarea class="form-control form-style" placeholder="Leave a comment here" id="txt" name="txt" style="height: 100px"></textarea>
            <label class="comments-label" for="floatingTextarea2">Message <span class="text-danger font-weight-bold">*</span></label></label>
        </div>
        <div>
            <div class="mb-3 px-3 text-center w-100">
            <label for="exampleFormControlFile1">Fichier image</label>
            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
            <?php if(isset($errors['image'])){echo "<span class='text-danger'>" .$errors['image']. "</span>"; } ?>

            </div>
        </div>


        <div class="d-flex justify-content-center">
            <button type="submit" name="submit" class="btn btn-search btn-outline-success mb-3">Envoyer</button>
        </div>

        <p class="text-danger mr-3">Champs obligatoire *</p>

      </form>
      
</div>
</section>



</body>
</html>

