    <?php require('includes/head.php');?>
    <link href="asset/css/contact.css" rel="stylesheet">
    <title>SOS CONSOLES</title>
</head>
  <body>
  <?php require('includes/nav-bar.php'); ?> 
    <section class="padding-top">

        <h2 id="send-note" class="text-center title-page display-4 my-5 playfair">Laissez un message</h2>

        

        <div id="block-formulaire" class="mb-5">
            <form id="formulaire" class="playfair" method="post" action="actions/send-note.php">

            <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.  '</p>';} ?>

                <div class="d-flex justify-content-evenly">
                    <div class="mb-3 px-3 text-center w-100">
                        <label for="Name" class="form-label">
                          Nom : 

                        </label>
                        <input type="text" class="form-control form-style" id="Name" name="Name" placeholder="Votre nom" aria-describedby="NameHelp">
                    </div>
                    <div class="mb-3 px-3 text-center w-100">
                        <label for="FirstName" class="form-label">
                          Prénom <span class="text-danger font-weight-bold">*</span>
                        </label>
                        <input type="text" class="form-control form-style" id="FirstName" name="FirstName" placeholder="Votre prénom" aria-describedby="firstNameHelp">
                    </div>
                </div>
                <div class="d-flex justify-content-evenly">
                    <div class="mb-3 px-3 text-center w-100">
                        <label for="exampleInputEmail" class="form-label">
                          Adresse email <span class="text-danger font-weight-bold">*</span></label>
                        <input type="email" class="form-control form-style" id="email" name="Email" placeholder="Votre email" aria-describedby="emailHelp">
                      </div>
                    <div class="mb-3 px-3 text-center w-100">
                        <label for="PhoneNumber" class="form-label">Numéro de téléphone</label>
                        <input type="text" class="form-control form-style" id="PhoneNumber" name="Telephone" placeholder="Numéro de téléphone" aria-describedby="PhoneNumberHelp">
                    </div>
                </div>
                <div class="mb-3 px-3 text-center w-100">
                    <label for="exampleInputEmail1" class="form-label">
                      Titre du message <span class="text-danger font-weight-bold">*</span></label></label>
                    <input type="text" class="form-control form-style" id="Object" placeholder="Objet du message" aria-describedby="emailHelp" name="object" required>
                </div>
                <div class="form-floating mb-3 px-3">
                    <textarea class="form-control form-style" placeholder="Leave a comment here" id="message" name="Message" style="height: 100px"></textarea>
                    <label class="comments-label" for="floatingTextarea2">Message <span class="text-danger font-weight-bold">*</span></label></label>
                  </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-search btn-outline-success mb-3">Envoyer</button>
                </div>
              </form>
              
              <p class="text-danger mr-3">Champs obligatoire *</p>
        </div>
    </section>
    
    <?php require('includes/footer.php'); ?>

  </body>
</html>