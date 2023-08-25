<?php require('includes/head.php');

    if(empty($_POST['devis-id-1'])){$_POST['devis-id-1'] = "";} else{}
    if(empty($_POST['devis-id-2'])){$_POST['devis-id-2'] = "";}else{}
    if(empty($_POST['devis-id-3'])){$_POST['devis-id-3'] = "";}else{}
    if(empty($_POST['devis-id-4'])){$_POST['devis-id-4'] = "";}else{}
    if(empty($_POST['devis-id-5'])){$_POST['devis-id-5'] = "";}else{}
    if(empty($_POST['devis-id-6'])){$_POST['devis-id-6'] = "";}else{}
    if(empty($_POST['devis-id-7'])){$_POST['devis-id-7'] = "";}else{}
    if(empty($_POST['devis-id-8'])){$_POST['devis-id-8'] = "";}else{}
    if(empty($_POST['devis-id-9'])){$_POST['devis-id-9'] = "";}else{}
    if(empty($_POST['devis-id-10'])){$_POST['devis-id-10'] = "";}else{}

    ?>

<!DOCTYPE html>
<html lang="fr">

    <link href="asset/css/contact.css" rel="stylesheet">
    <title>SOS CONSOLE</title>
  </head>
  <body>
    <header>
      <div id="background-body">
        <nav id="slider" class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="./asset/images/icon/logo_sos_consoles.png" alt="SOS_CONSOLE"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <div class="navbar-toggler-icon">
                <div id="navbar-trait-1" class="navbar-trait"></div>
                <div id="navbar-trait-1" class="navbar-trait"></div>
                <div id="navbar-trait-1" class="navbar-trait"></div>
              </div>            
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
                </li>
              </ul>
              <form class="form-search-nav-bar d-flex">
                <input class="search-bar loupe form-control me-2" type="search" placeholder="Selection un appareil" aria-label="Search">
              <button class="btn btn-search btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <main>

    <div>
        <div class="d-flex align-items-center justify-content-center my-5 mx-2">
          <div class="circle-in-validate"></div>
          <div class="trait-validate"></div>
          <div class="circle-in-validate"></div>
          <div class="trait-validate"></div>
          <div class="circle-in-validate"></div>
          <div class="trait-validate"></div>
          <div class="circle-in-validate"></div>
        </div>
      </div>  

        
        </div>
</main>
    
    <?php require('includes/footer.php'); ?>

  </body>
</html>