<?php
require '_header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <title>landing page du concert de Rihanna</title>
    <script src="https://kit.fontawesome.com/b9fcb22f66.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dist/style.css">
    <script src="https://cdn.tailwindcss.com/3.1.4"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>





</head>

<body>
    <!-- component -->
    <!-- component -->

    <body>
        <nav class=" relative px-4 py-4 flex justify-between items-center bg-black ">
            <a class=" text-3xl font-bold leading-none" href="product.php">
                <img class="h-20" src="img/logo.png" alt="logo">
            </a>
            <div class="lg:hidden">
                <button class="navbar-burger flex items-center text-white-600 p-3">
                    <svg class="block h-4 w-4 fill-current bg-white" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>Mobile menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>


            <?php if (!isset($_SESSION["user"])): ?>
                <ul
                    class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">

                    <li><a class="text-xl text-white font-bold hover:text-[#edead3]" href="product.php">Billeterie</a></li>
                    <li class="text-white-300">

                </ul>
                <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-[#edead3] text-sm text-gray-900 font-bold  rounded-xl transition duratio
               n-200" href="inscription.php">S'inscrire</a>
                <a class="hidden lg:inline-block py-2 px-6 bg-gray-50 hover:bg-[#edead3] text-sm text-gray-900 font-bold  rounded-xl transition duratio
               n-200" href="index.php">Se connecter</a>
            <?php else: ?>
                <ul
                    class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
                    <li><a class="text-xl text-white font-bold hover:text-[#edead3]" href="product.php">Billeterie</a></li>
                    <li class="text-white-300">

                    <li><a class="text-sm text-white hover:text-gray-500" href="panier.php">Panier</a></li>
                    <li class="text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="c
u                       rrentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" s t roke-width="2"
                                d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </li>

                </ul>
                <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 hover:text-gray-500 text-sm text-gray-900 font-bold  rounded-xl transition duratio
               n-200" href="deconnexion.php">Se déconnecter</a>

            <?php endif; ?>


        </nav>
        <div class="navbar-menu relative z-50 hidden">
            <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>

            <nav
                class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                <div class="flex items-center mb-8">
                    <a class="mr-auto text-3xl font-bold leading-none" href="#">
                        <img class="h-20" src="img/logo-black.png" alt="logo">

                    </a>
                    <button class="navbar-close">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover
:                           text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round
" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul>

                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text
                               -blue-600 rounded" href="product.php">Billeterie</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-auto">
                    <div class="pt-6">
                        <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-[#edead3] text-sm text-gray-900 font-bold  rounded-xl "
                            href="#">S'inscrire</a>
                        <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center bg-gray-50 hover:bg-[#edead3] text-sm text-gray-900 font-bold  rounded-xl"
                            href="#">S'enregistrer</a>
                    </div>
                    <p class="my-4 text-xs text-center text-gray-400">
                        <span>Copyright © 2023</span>
                    </p>
                </div>
            </nav>
        </div>
        </div>






        <script>
            // Burger menus
            document.addEventListener('DOMContentLoaded', function () {
                // open
                const burger = document.querySelectorAll('.navbar-burger');
                const menu = document.querySelectorAll('.navbar-menu');

                if (burger.length && menu.length) {
                    for (var i = 0; i < burger.length; i++) {
                        burger[i].addEventListener('click', function () {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }

                // close
                const close = document.querySelectorAll('.navbar-close');
                const backdrop = document.querySelectorAll('.navbar-backdrop');

                if (close.length) {
                    for (var i = 0; i < close.length; i++) {
                        close[i].addEventListener('click', function () {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }

                if (backdrop.length) {
                    for (var i = 0; i < backdrop.length; i++) {
                        backdrop[i].addEventListener('click', function () {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }
            });

        </script>