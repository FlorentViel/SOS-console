<?php

 // Récupération des données du formulaire



            
            //$recherche = $_GET['recherche'];

            $request = $pdo->query("SELECT Id_Appareil, nom FROM `Appareil`");

            if(isset($_GET['recherche']) AND !empty($_GET['recherche'])) {
                $recherche = $_GET['recherche'];
                 // query affichage du titre
                $title = $pdo->query('SELECT type_appareil.Id_type , appareil.nom, appelation ,marque FROM `marque` JOIN `Appareil` ON marque.Id_Marque = appareil.Id_Marque JOIN `type_appareil` ON type_appareil.Id_type = marque.id_type WHERE appareil.nom LIKE "%'.$recherche.'%"');

                // excution de la requete

                $title->execute();


                // envoie du resultat

                $ligne = $title->fetch(PDO::FETCH_ASSOC);

                // query appareil

                $queryAppareil = $pdo->query('SELECT Id_appareil ,nom, marque, logo FROM `marque` JOIN `Appareil` ON marque.Id_Marque = appareil.Id_Marque WHERE appareil.nom LIKE "%'.$recherche.'%"');
                $count = $queryAppareil->rowCount();

                // affichage appareil 
                


                $resultatAppareil = $queryAppareil->fetchAll();


                //Afficher le résultat 
            }

            else if(isset($_POST['appareil']) AND !empty($_POST['appareil']) ){
                //$recherche = htmlspecialchars($_POST['recherche']);

                $appareil = $_POST['appareil'];
                // query affichage du titre
                $title = $pdo->query("SELECT type_appareil.Id_type, Id_Appareil, marque, appareil.nom, appelation, logo FROM `marque` JOIN `Appareil` ON marque.Id_Marque = appareil.Id_Marque JOIN `type_appareil` ON type_appareil.Id_type = marque.id_type WHERE appareil.Id_Marque = $appareil");

                // excution de la requete

                $title->execute();


                // envoie du resultat

                $ligne = $title->fetch(PDO::FETCH_ASSOC);

                // query appareil

                $queryAppareil = $pdo->query("SELECT Id_appareil , nom, marque , logo FROM `marque` JOIN `Appareil` ON marque.Id_Marque = appareil.Id_Marque WHERE appareil.Id_Marque = $appareil");
                $count = $queryAppareil->rowCount();

                // affichage appareil 

                $resultatAppareil = $queryAppareil->fetchAll();

                //Afficher le résultat 
            }



            else {

                //ob_start();
                //header('Location: index.php');      
                //exit(); 
                $count = 0;

            }
            

?>