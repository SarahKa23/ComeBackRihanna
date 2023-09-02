<?php
//demarrer une session
session_start();
require_once 'header.php';
$db = new DB(); // créer une instance de la classe DB

// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}
// On récupere les données de l'utilisateur
$req = $db->db->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

?>


<main class="bg-white">

    <div class="container  ">
        <div class="col-md-12">
            <?php
            if (isset($_GET['err'])) {
                $err = htmlspecialchars($_GET['err']);
                switch ($err) {
                    case 'current_password':
                        echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                        break;

                    case 'success_password':
                        echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                        break;
                }
            }
            ?>



            <div class="p-6">
                <div class="text-center">
                    <h1 class="text-black text-4xl font-bold mb-8">Bonjour
                        <?php echo $data['nom']; ?> !
                    </h1>
                    <hr class="w-1/2 mx-auto border-2 border-black mb-8" />
                    <a href="deconnexion.php"
                        class="bg-black text-white rounded-lg px-8 py-4 font-bold text-lg mr-4 hover:bg-gray-800 transition duration-200 ease-in-out">Déconnexion</a>
                    <!-- Button trigger modal -->

                </div>
            </div>

            < <div class="bg-F8F7EE py-8 px-4">
                <div class="max-w-4xl mx-auto">
                    <h1 class="text-2xl font-bold mb-8">Mon compte</h1>

                    <!-- Section "Changer mon mot de passe" -->
                    <div class="bg-white shadow rounded-lg p-8 mb-8">
                        <h2 class="text-lg font-semibold mb-4">Changer mon mot de passe</h2>
                        <form action="layouts/change_password.php" method="POST">
                            <div class="mb-4">
                                <label for='current_password' class="block font-medium mb-2 ">Mot de passe
                                    actuel</label>
                                <input type="password" id="current_password" name="current_password"
                                    class="form-input rounded-md w-full bg-gray-200" required />
                            </div>
                            <div class="mb-4">
                                <label for='new_password' class="block font-medium mb-2">Nouveau mot de passe</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="form-input rounded-md w-full bg-gray-200" required />
                            </div>
                            <div class="mb-4">
                                <label for='new_password_retype' class="block font-medium mb-2 ">Re tapez le nouveau mot
                                    de
                                    passe</label>
                                <input type="password" id="new_password_retype" name="new_password_retype"
                                    class="form-input rounded-md w-full bg-gray-200" required />
                            </div>
                            <button type="submit"
                                class="bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-black hover:text-[#F8F7EE]">Sauvegarder</button>
                        </form>
                    </div>

                    <!-- Section "Changer mon avatar" -->
                    <div class="bg-white shadow rounded-lg p-8">
                        <h2 class="text-lg font-semibold mb-4">Changer mon avatar</h2>
                        <form action="layouts/change_avatar.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-4 ">
                                <label for="avatar" class="block font-medium mb-2 ">Images autorisées : png, jpg, jpeg,
                                    gif
                                    - max
                                    20Mo</label>
                                <input type="file" name="avatar_file" class="form-input rounded-md w-full "
                                    accept="image/png,image/jpeg,image/gif" required />
                            </div>
                            <button type="submit"
                                class="bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-black hover:text-[F8F7EE]">Modifier</button>
                        </form>
                    </div>

                </div>
        </div>
</main>

<?php
require_once 'footer.php';
?>