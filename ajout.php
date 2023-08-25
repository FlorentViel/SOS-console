<?php
session_start(); 
if (isset($_SESSION['count']) && ($_SESSION['count'] > 50)) {
	header('Location: http://www.google.com/');
} else {
?> 
<?php require('includes/head.php');
     //require('includes/insert.php');
     ?>
<link href="asset/css/accueil.css" rel="stylesheet">
<link href="asset/css/admin.css" rel="stylesheet">
</head>
<body>
	<?php
	//$password = 'motdepasse';
	//if ((isset($_POST['password']) && ($_POST['password'])) != $password) {
		//if (!isset($_SESSION['count'])) {
			//$_SESSION['count'] = 0;
		//} else {
			//$_SESSION['count']++;
		//}
	?> 
<h1>Connexion</h1>
<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
<p><label for="password">Mot de passe</label> <input type="password" title="Saisissez le mot de passe" name="password" /></p> 
<p><input type="submit" name="submit" value="Connexion" /></p> 
</form>
	<?php
//} else {    


        if (isset($_POST['submitNew']) AND !empty($_POST['titleNew']) AND !empty($_POST['txtNew'])){

            $titleNew = $_POST['titleNew'];
         $txtNew = $_POST['txtNew'];
        
            $error ="Les news ont étés modifiés";
        
        
            $updateNew = $pdo->query("UPDATE `bloc_news` SET `texte` = '$txtNew' , `titre` = '$titleNew' WHERE `bloc_news`.`Id_Block_NEWS` = 1");
        
            $updateNew->execute();
        
        }
        
        else{
            $error ="Une erreur est survenu";
        }
        
        
        // ajout image
        
        if(isset($_POST['submit'])) {
        
            $number = $_POST['Number'];
            $title = $_POST['title'];
            $txt = $_POST['txt'];
        
        
            //$ImageName = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
        
            if(isset($_FILES['image'])){
            $filename = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $error = $_FILES['image']['error'];
            
            
            echo $number;
            $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
            $extensions_arr = array("jpg","jpeg","png");
        
            move_uploaded_file($tmpName, './images/'.$filename );
        
            $updateImage = $pdo->query("UPDATE `carouselle` SET `titre` = '$title', `texte` = '$txt', `image` = '$filename '  WHERE `carouselle`.`Id_Carouselle` = $number");
        
            // excution de la requete
        
        
            $updateImage->execute();
            }
        }
        ?> 
<h1 id="send-note" class="text-center title-page display-4 my-5 playfair">Modifier des blocs</h1>


<div id="block-formulaire" class="mb-5">
    <form id="formulaire" class="playfair p-3" method="post" action="<?php $_SERVER['PHP_SELF']?>">

    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>';} ?>

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
    <form enctype="multipart/form-data" id="formulaire" class="playfair p-3" method="post" action="">

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
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
            <?php if(isset($errors['image'])){echo "<span class='text-danger'>" .$errors['image']. "</span>"; } ?>

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
            <label for="exampleFormControlFile1">Example file input</label>
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
<?php 
	}
//} 
?>
</body>
</html>