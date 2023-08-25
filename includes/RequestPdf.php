<?php

if($_POST['piece1'] == "" AND $_POST['piece2'] == "" AND $_POST['piece3'] == "" AND $_POST['piece4'] == "" 
AND $_POST['piece5'] == "" AND $_POST['piece6'] == "" AND $_POST['piece7'] == "" AND $_POST['piece8'] == ""
AND $_POST['piece9'] == "" AND $_POST['piece10'] == ""){
    //header("Location: http://127.0.0.1/dev/SOS_CONSOLE/piece.php");
    //exit();

    echo 'pas de donnée';
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

        
        //session_start();

        // Récupération de l'ID de l'appareil




        if(!empty($_POST['appareil'])){
            $appareil = $_POST['appareil'];
            $title = $pdo->query("SELECT nom, image_presentation FROM `appareil` WHERE `Id_Appareil` = $appareil;");
            $title->execute();
            $rappel = $title->fetch(PDO::FETCH_ASSOC);
        }

    // Verification des checkbox si elles sont selectionnés

        if(empty($_POST['piece1'])){$dev1='0';}else{$dev1=$_POST['piece1'];}
        if(empty($_POST['piece2'])){$dev2='0';}else{$dev2=$_POST['piece2'];}
        if(empty($_POST['piece3'])){$dev3='0';}else{$dev3=$_POST['piece3'];}
        if(empty($_POST['piece4'])){$dev4='0';}else{$dev4=$_POST['piece4'];}
        if(empty($_POST['piece5'])){$dev5='0';}else{$dev5=$_POST['piece5'];}
        if(empty($_POST['piece6'])){$dev6='0';}else{$dev6=$_POST['piece6'];}
        if(empty($_POST['piece7'])){$dev7='0';}else{$dev7=$_POST['piece7'];}
        if(empty($_POST['piece8'])){$dev8='0';}else{$dev8=$_POST['piece8'];}
        if(empty($_POST['piece9'])){$dev9='0';}else{$dev9=$_POST['piece9'];}
        if(empty($_POST['piece10'])){$dev9='0';}else{$dev10=$_POST['piece10'];}
        

    // On créer un tableau avec les variables qui comprenne la valeur $_POST des checksboxs, donc soit un ID d'une pièce
    // Soit une valeur de 0

        $ligne= array($dev1, $dev2, $dev3);

    // On join une virgule au tableau afin que celui-ci puisse être lu par le PHP

        $variables_joins = join(',',$ligne);


//Select the Products you want to show in your PDF file
$query = $pdo->query("SELECT piece.Id_piece ,piece.type, piece.prix FROM piece where Id_Piece IN ($variables_joins)");

$query1 = $pdo->query("SELECT SUM(piece.prix) AS total FROM piece where Id_Piece IN ($variables_joins)");


$number_of_products = $query->rowCount();

$resultat = $query->fetchAll();
$global = $query1->fetch(PDO::FETCH_ASSOC);


?>