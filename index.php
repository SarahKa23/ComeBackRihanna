<?php require 'header.php'; ?>
<?php
if (isset($_GET['login_err'])) {
  $err = htmlspecialchars($_GET['login_err']);

  switch ($err) {
    case 'password':
      ?>
      <div class="alert alert-danger">
        <strong>Erreur</strong> mot de passe incorrect
      </div>
      <?php
      break;

    case 'email':
      ?>
      <div class="alert alert-danger">
        <strong>Erreur</strong> email incorrect
      </div>
      <?php
      break;

    case 'already':
      ?>
      <div class="alert alert-danger">
        <strong>Erreur</strong> compte non existant
      </div>
      <?php
      break;

  }
}
?>
<main class="bg-[#edead3]">
  <div class="flex h-screen w-full items-center justify-center  bg-cover bg-no-repeat">
    <!-- <img src="img/concert.avif">  -->
    <div class="rounded-xl bg-white bg-opacity-30 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
      <div class="text-black">
        <div class="mb-8 flex flex-col items-center">
          <img src="img/logo-black.png" width="250" alt="" srcset="" />
          <h1 class="mb-2 text-2xl">Connectez-vous</h1>
          <span class="text-gray-500">Entrez vos identifiants</span>
        </div>
        <form action="connexion.php" method="post">
          <div class="mb-4 text-lg">
            <input
              class="rounded-3xl border-none bg-gray-300 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-gray-600 shadow-lg outline-none backdrop-blur-md"
              id="email-address" name="email" type="email" autocomplete="email" placeholder="id@mail.com" />
          </div>

          <div class="mb-4 text-lg">
            <input id="password"
              class="rounded-3xl border-none bg-gray-300 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-gray-600 shadow-lg outline-none backdrop-blur-md"
              type="password" name="password" required="required" placeholder="*********" />
          </div>
          <div class="mb-4 text-lg">
            <a href="inscription.php" class="font-medium text-indigo-600 hover:text-indigo-500">S'inscrire</a>
          </div>
      </div>

      <div class="mt-8 flex justify-center text-lg text-white">
        <button type="submit"
          class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow rounded-3xl bg-beige-400 bg-opacity-50 px-10 py-2 text-black shadow-xl backdrop-blur-md justify-center">
          <div class="absolute inset-0 w-3 bg-gray-900 transition-all duration-[250ms] ease-out group-hover:w-full">
          </div>
          <span class="relative text-black group-hover:text-white">Login!</span>
        </button>
      </div>
      </form>
    </div>
  </div>
  </div>

</main>



</body>

</html>