<?php 

include 'bdd.php';


// Affichage News 

$queryNews = $pdo->query("SELECT * FROM `Bloc_news`");

$queryNews->execute();


// envoie du resultat

$News = $queryNews->fetch(PDO::FETCH_ASSOC);

// Affichage caroussel 

$queryCarousel = $pdo->query("SELECT * FROM `Carouselle`");
$resultatCarousel = $queryCarousel->fetchALL();

//  Affichage Appareil  

$query = $pdo->query("SELECT * FROM `Type_appareil`");

$resultat = $query->fetchAll();
?>

