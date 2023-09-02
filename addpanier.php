<?php
require 'header.php';
if (isset($_GET['id'])) {
  $product = $DB->query('SELECT id FROM products WHERE id=:id', array('id' => $_GET['id']));
  if (empty($product)) {
    die("Ce produit n'existe pas");
  }
  $panier->add($product[0]->id);
  die('<html>
  <head>
  <meta charset="UTF-8">
  <title>Confirmation d\'ajout au panier</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.0.0/tailwind.min.css">
</head>
<body class="bg-white text-black">
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-4xl font-bold mb-4">Confirmation d\'ajout au panier</h1>
            <p class="text-lg mb-8">Votre ticket a bien été ajouté au panier.</p>
            <a href="javascript:history.back()" class="bg-black text-white py-3 px-6 rounded-lg transition-colors duration-200 hover:bg-gray-800">Retourner sur le catalogue</a>
        </div>
    </div>
</body>
</html>');

} else {
  die("Vous n'avez pas sélectionné de ticket à ajouter au panier");
}
?>