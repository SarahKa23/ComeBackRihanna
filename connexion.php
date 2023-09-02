<?php

session_start();
require_once 'database.php';
$db = new DB(); // créer une instance de la classe DB

if (isset($_POST['email']) && isset($_POST['password'])) {
   $email = htmlspecialchars($_POST['email']);
   $password = htmlspecialchars($_POST['password']);

   // On verifie si l'utilisateur est inscrit dans la table utilisateurs
   $check = $db->db->prepare('SELECT nom, prenom, email, password, token FROM utilisateurs WHERE email = ?');
   $check->execute(array($email));
   $data = $check->fetch();
   $row = $check->rowCount();

   // Si > à 0 alors l'utilisateur existe
   if ($row > 0) {

      // on verifie si l'email est au bon format
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
         // Si le mot de passe est le bon
         if (password_verify($password, $data['password'])) {
            // On créer la session et on redirige sur landing.php
            $_SESSION['user'] = $data['token'];
            header('Location: landing.php');
            die();

         } else {
            header('Location:index.php?login_err=password');
            die();
         }
      } else {
         header('Location:index.php?login_err=email');
         die();
      }
   } else {
      header('Location:index.php?login_err=already');
      die();
   }
} else {
   header('Location:index.php');
   die();
} // si le formulaire est envoyé sans aucune données
?>