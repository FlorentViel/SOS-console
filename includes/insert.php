<?php


// ajout de new 




if (isset($_POST['submitNew']) AND !empty($_POST['titleNew']) AND !empty($_POST['txtNew'])){

    $titleNew = $_POST['titleNew'];
    $txtNew = $_POST['txtNew'];

    $valid = 'valid-feedback';


    $error ="Réussi";


    $updateNew = $pdo->query("UPDATE `bloc_news` SET `texte` = '$txtNew' , `titre` = '$titleNew' WHERE `bloc_news`.`Id_Block_NEWS` = 1");

    $updateNew->execute();

}

else{

    $valid = 'invalid-feedback';

    $error =" Une erreur est survenu";
}


// ajout image

if(isset($_POST['submit'])) {

    $number = $_POST['Number'];
    $title = $_POST['title'];
    $txt = $_POST['txt'];
    $uploadOk = 1;


    //$ImageName = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));

    if(isset($_FILES['image']['tmp_name'])){
    $filename = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    
    
    
    
    $check = getimagesize($_FILES["image"]["tmp_name"]);

    //var_dump($check["mime"]);
    
    $target_dir = "./images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $extensions_arr = array("image/jpg","image/jpeg","image/png");

    $checkmessage = NULL;


    if(!empty($check)){
        if((in_array($check["mime"], $extensions_arr))){
            $checkmessage = "Ce fichier est " . $check["mime"] . ".";
            move_uploaded_file($tmpName, $target_dir.$filename );
            $updateImage = $pdo->query("UPDATE `carouselle` SET `titre` = '$title', `texte` = '$txt', `image` = '$filename '  WHERE `carouselle`.`Id_Carouselle` = $number");
            
            // excution de la requete
    
            $updateImage->execute();
        }
        else{
            $checkmessage = "Ce n'est pas une image";
        }
    }

    else{
        $checkmessage = "Ce n'est pas une image";
    }



    
    }
}





?>
