<?php require('includes/bdd.php');

error_reporting(E_ERROR | E_PARSE);

/* if($_POST['piece1'] == "" AND $_POST['piece2'] == "" AND $_POST['piece3'] == "" AND $_POST['piece4'] == "" 
AND $_POST['piece5'] == "" AND $_POST['piece6'] == "" AND $_POST['piece7'] == "" AND $_POST['piece8'] == ""
AND $_POST['piece9'] == "" AND $_POST['piece10'] == ""){
    header("Location: http://127.0.0.1/dev/SOS_CONSOLE/piece.php");
    exit();
  }*/  

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

        if($_POST['piece1']==""){$dev1='1';}else{$dev1=$_POST['piece1'];}
        if($_POST['piece2']==""){$dev2='2';}else{$dev2=$_POST['piece2'];}
        if($_POST['piece3']==""){$dev3='3';}else{$dev3=$_POST['piece3'];}
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

        $query = $pdo->query("SELECT piece.type, piece.prix FROM piece where Id_Piece IN ($variables_joins)");
        $resultat = $query->fetchAll();

        foreach ($resultat as $key => $variable){ echo ($resultat[$key]['type']).', '; } 


?>

