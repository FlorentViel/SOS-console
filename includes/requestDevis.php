<?php 

// Démarre la temporisation de sortie. Tant qu'elle est enclenchée, 
        //aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.

        // écrire sur le fichier txt 

        //$write = fopen("devis.txt","w");

        ob_start();

    
        // Rediriger vers une autre page si aucune checkbox n'a été coché 


            if($_POST['piece1'] == "" AND $_POST['piece2'] == "" AND $_POST['piece3'] == "" AND $_POST['piece4'] == "" 
            AND $_POST['piece5'] == "" AND $_POST['piece6'] == "" AND $_POST['piece7'] == "" AND $_POST['piece8'] == ""
            AND $_POST['piece9'] == "" AND $_POST['piece10'] == ""){
                header("Location: http://127.0.0.1/dev/Stage/SOS_CONSOLES/index.php");
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

                    
                    session_start();

                    // Récupération de l'ID de l'appareil
                    $_SESSION['appareil'] = $_POST['appareil'];
                    $appareil = $_SESSION['appareil'] ; 

                // Verification des checkbox si elles sont selectionnés

                    if($_POST['piece1']==""){$dev1='0';}else{$dev1=$_POST['piece1'];}
                    if($_POST['piece2']==""){$dev2='0';}else{$dev2=$_POST['piece2'];}
                    if($_POST['piece3']==""){$dev3='0';}else{$dev3=$_POST['piece3'];}
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

                // Request SQL prix et calcule du prix total des pièces + execution de la request SQL

                    $query1 = $pdo->query("SELECT piece.prix , SUM(piece.prix) AS total FROM piece where Id_Piece IN ($variables_joins)");

                // Second request qui affiche en ligne chacune des pièces choisi avec leur prix unitaires
                
                    $query = $pdo->query("SELECT piece.Id_piece, piece.type, piece.prix FROM piece where Id_Piece IN ($variables_joins)");

                // Troisème request qui affichage le nom appareil et son image
                    $title = $pdo->query("SELECT appareil.nom, piece.Id_Appareil, Appareil.Id_Appareil, appareil.image_presentation FROM `Piece` JOIN `Appareil` ON piece.Id_Appareil = Appareil.Id_Appareil WHERE piece.Id_Appareil = $appareil");

                // envoie du resultat

                    $title->execute();
                    $query1->execute();

                // On publie toutes les lignes de la request SQL et on affiche le résultat dans le code HTML 
    
                    $resultat = $query->fetchAll();
                    $global = $query1->fetch(PDO::FETCH_ASSOC);
                    $rappel = $title->fetch(PDO::FETCH_ASSOC);
                
                
                ?>
