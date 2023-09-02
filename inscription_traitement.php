<?php
require_once 'database.php';
$db = new DB(); // créer une instance de la classe DB

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])) {
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password_retype = htmlspecialchars($_POST['password_retype']);

  // on verifie si l'utilisateur existe 
  $check = $db->db->prepare('SELECT nom, prenom, email, password FROM utilisateurs WHERE email = ?');
  $check->execute(array($email));
  $data = $check->fetch();
  $row = $check->rowCount();

  // on transforme toute les lettres majuscule en minuscule
  $email = strtolower($email);

  // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
  if ($row == 0) {
    //on verifie que les longueurs <=100
    if (strlen($nom) <= 100) {
      if (strlen($prenom) <= 100) {
        if (strlen($email) <= 100) {
          //on verifie si l'adresse email est la bonne
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($password === $password_retype) {

              // On hash le mot de passe avec Bcrypt, via un coût de 12
              $cost = ['cost' => 12];
              $password = password_hash($password, PASSWORD_BCRYPT, $cost);



              $insert = $db->db->prepare('INSERT INTO utilisateurs(nom, prenom, email, password, token) VALUES(:nom, :prenom, :email, :password, :token)');
              $insert->execute(
                array(
                  'nom' => $nom,
                  'prenom' => $prenom,
                  'email' => $email,
                  'password' => $password,
                  'token' => bin2hex(openssl_random_pseudo_bytes(64))

                )
              );

              //on redirige vers un message de succes
              header('Location:inscription.php?reg_err=succes');
              die();
            } else {
              header('Location: inscription.php?reg_err=password');
              die();
            }

          } else {
            header('Location: inscription.php?reg_err=email');
            die();
          }

        } else {
          header('Location: inscription.php?reg_err=email_length');
          die();
        }

      } else {
        header('Location: inscription.php?reg_err=prenom_length');
        die();
      }

    } else {
      header('Location: inscription.php?reg_err=nom_length');
      die();
    }

  } else {
    header('Location: inscription.php?reg_err=already');
    die();
  }

}