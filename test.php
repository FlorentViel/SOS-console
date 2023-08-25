<?php
session_start(); 
if (isset($_SESSION['count']) && ($_SESSION['count'] > 9)) {
	header('Location: http://www.google.com/');
} else {
    require('includes/head.php');
?> 
<link href="asset/css/accueil.css" rel="stylesheet">
<link href="asset/css/admin.css" rel="stylesheet">
</head>
<body>
<?php
	$password = 'SOSTELEPHONECONSOLE59';
	if ((isset($_POST['password']) && ($_POST['password'])) != $password) {
		if (!isset($_SESSION['count'])) {
			$_SESSION['count'] = 0;
		} else {
			$_SESSION['count']++;
		}
	?> <h1>Connexion</h1>
    <form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    <p><label for="password">Mot de passe</label> <input type="password" title="Saisissez le mot de passe" name="password" /></p> 
    <p><input type="submit" name="submit" value="Connexion" /></p> 
    </form>
        <?php
        } else { require('includes/insert.php');
            ?> 

        <p>Hi</p>




<?php } 
} ?>