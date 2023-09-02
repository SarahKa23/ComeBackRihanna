<?php
require 'header.php';


?>



<?php
if (isset($_GET['reg_err'])) {
  $err = htmlspecialchars($_GET['reg_err']);

  switch ($err) {
    case 'succes':
      ?>
      <div class="alert alert-success">
        <strong>Succès</strong> inscription reussie !
      </div>
      <?php
      break;

    case 'password':
      ?>
      <div class="alert alert-danger">
        <strong>Erreur</strong> mot de passe different
      </div>
      <?php
      break;

    case 'email':
      ?>
      <div class="alert alert-danger">
        <strong>Erreur</strong> email non valide
      </div>
      <?php
      break;

    case 'email_length':
      ?>
      <div class="alert alert-danger">
        <strong>Erreur</strong> email trop long
      </div>
      <?php
      break;


    case 'nom_length':
      ?>
      <div class="alert alert-danger">
        <strong>Erreur</strong> nom trop long
      </div>
      <?php
      break;

    case 'prenom_length':
      ?>
      <div class="alert alert-danger">
        <strong>Erreur</strong> prenom trop long
      </div>
      <?php


    case 'already':
      ?>
      <div class="alert alert-danger">
        <strong>Erreur</strong> compte deja existant
      </div>
    <?php

  }
}
?>
<main class="h-screen overflow-hidden flex items-center justify-center bg-[#edead3]">

  <div class="flex h-screen w-full h-full items-center justify-center  bg-cover bg-no-repeat ">

    <div class="rounded-xl bg-white bg-opacity-90 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
      <div class="text-black">
        <div class="mb-8 flex flex-col items-center">
          <img src="img/logo-black.png" width="250" alt="" srcset="" />


          <h1 class="mb-2 text-2xl">Inscrivez-vous</h1>
          <span class="text-gray-500">Entrez vos informations</span>
        </div>
        <form action="inscription_traitement.php" method="post">

          <div class="mb-4 text-lg">
            <input
              class="rounded-3xl border-none bg-gray-300 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-gray-600 shadow-lg outline-none backdrop-blur-md"
              type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
          </div>

          <div class="mb-4 text-lg">
            <input
              class="rounded-3xl border-none bg-gray-300 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-gray-600 shadow-lg outline-none backdrop-blur-md"
              type="text" name="prenom" class="form-control" placeholder="Prenom" required="required"
              autocomplete="off">
          </div>


          <div class="mb-4 text-lg">
            <input
              class="rounded-3xl border-none bg-gray-300 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-gray-600 shadow-lg outline-none backdrop-blur-md"
              type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
          </div>

          <div class="mb-4 text-lg">
            <input
              class="rounded-3xl border-none bg-gray-300 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-gray-600 shadow-lg outline-none backdrop-blur-md"
              type="password" name="password" class="form-control" placeholder="mot de passe" required="required"
              autocomplete="on">
          </div>

          <div class="mb-4 text-lg">
            <input
              class="rounded-3xl border-none bg-gray-300 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-gray-600 shadow-lg outline-none backdrop-blur-md"
              type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe"
              required="required" autocomplete="off">
          </div>
          <div class="mb-4 text-lg">
            <a href="index.php" class="font-medium text-indigo-600 hover:text-indigo-500">Se connecter</a>
          </div>

          <div class="mt-8 flex justify-center text-lg text-white">
            <button type="submit"
              class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow rounded-3xl bg-beige-400 bg-opacity-50 px-10 py-2 text-black shadow-xl backdrop-blur-md justify-center">
              <div class="absolute inset-0 w-3 bg-gray-900 transition-all duration-[250ms] ease-out group-hover:w-full">
              </div>

              <span class="relative text-black group-hover:text-white">S'inscrire!</span>
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

</main>
<?php
require 'footer.php';


?>