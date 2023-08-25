<?php


//echo mail(); 


if (isset($_POST['Email']) !== "" || ($_POST['object']) !== "" || ($_POST['message']) !== "" || ($_POST['Name']) !== "" ) {
    $entete  = 'MIME-Version: 1.0' . "\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $entete .= 'From:'. $_POST['Email'] . "\r\n";
    $entete .= 'Reply-to: florviev@gmail.com' ;
    $entete .= 'Reply-to: ' . $_POST['Email'];
    $entete .= 'Objet:' . $_POST['object'];

if (empty($_POST['Telephone']) OR !is_numeric($_POST['Telephone'])){
    $_POST['Telephone'] = "N'a pas laisser son numéro de téléphone";
    }

if (empty($_POST['Name'])){
    $_POST['Name'] = "Non renseigné";
}
//<br>Information complémentaire : <br> Nom utilisateur :' .$_POST['Name']. '<br> Prénom :'. $_POST['FirstName'] . $_POST['Telephone'].''
    $message = '<h1>Votre message</h1>
    <p><b>Email : </b>' . $_POST['Email'] . '<br>
    <b>Message : </b>' . htmlspecialchars($_POST['Message']) . '</p>' . '<br><h2>Information complémentaire</h2>
     <br> <span>Nom utilisateur : ' .$_POST['Name']. '</span><br><span>Prénom :'. $_POST['FirstName'] 
     .'</span><br><span> Numéro de téléphone : ' . $_POST['Telephone'].'</span>' ;

    $retour = mail('florviev@gmail.com', 'Envoi depuis page Contact', $message, $entete);
    if($retour)
        echo '<p>Votre message a bien été envoyé. </p> ';
        //echo '</br> Numéro de Téléphone : ' .  . '' ;
        else{
            echo 'Message non envoyé ';

        }
}

else{
    echo 'Erreur';
}

?>

