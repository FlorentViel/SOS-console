<?php 

$marque = 'Aucun résultat';


if(isset($_GET['recherche']) AND !empty($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
     // query affichage du titre
    $title = $pdo->query('SELECT type_appareil.appelation , marque.marque FROM `marque` JOIN `type_appareil`
     ON type_appareil.Id_type = marque.id_type WHERE marque.marque LIKE "%'.$recherche.'%"');

    // excution de la requete

    $title->execute();


    // envoie du resultat

    $ligne = $title->fetch(PDO::FETCH_ASSOC);

    // Modfication du titre qui prend le nom de la marque sélectionné



    if($ligne['marque'] == !NULL){
        $marque = $ligne['marque'];
    }


    // query affichage marque

    $query = $pdo->query('SELECT Id_Marque , marque ,marque.image FROM `marque` WHERE marque.marque LIKE "%'.$recherche.'%"');
    $count = $query->rowCount();

    // affichage appareil 
    

    $resultat = $query->fetchAll();


    //Afficher le résultat 
}

// récupération de l'ID appareil


    else if(isset($_POST['type']) AND !empty($_POST['type'])){

    $IdAppareil = $_POST['type']; 
    
    $title = $pdo->query("SELECT Type_appareil.appelation FROM `Type_appareil` WHERE Type_appareil.Id_type = $IdAppareil");

    $title->execute();


    $ligne = $title->fetch(PDO::FETCH_ASSOC);

    $marque = $ligne['appelation'];


    $query = $pdo->query("SELECT Id_Marque, marque, marque.image 
    FROM `Marque` JOIN `Type_appareil`
    ON type_appareil.id_type = marque.Id_type 
    WHERE type_appareil.Id_type = $IdAppareil
    ");
        $count = $query->rowCount();
        $resultat = $query->fetchAll();
    }

    else {

        $count = 0;
    }


?>