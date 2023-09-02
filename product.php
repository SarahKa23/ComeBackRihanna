<?php
require 'header.php';
?>
<main class="bg-[#edead3]">
    <section class=" hero h-screen flex flex-col justify-center items-center">
        <h1 class="text-4xl md:text-6xl font-bold text-center mb-10">
            Achetez vos billets dès maintenant
        </h1>
        <button id="play-audio-button"
            class="py-3 px-6 bg-white text-black font-bold text-lg rounded-lg shadow-lg hover:bg-[#000000] hover:text-[#edead3]"
            onclick="window.location.href='#motion';">COMEBACK RIHANNA - STADE FRANCE</button>





    </section>
    </div>
    <div id="motion" class="flex flex-col justify-center items-center h-screen">
        <video id="my-video" autoplay loop class="w-full object-cover">
            <source src="img/Rihanna_motion.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Products section -->
    <section id="products" class="py-10">
        <div class="container mx-auto flex justify-center">
            <button id="play-audio-button"
                class="py-3 px-6 bg-white text-black font-bold text-lg rounded-lg shadow-lg hover:bg-[#000000] hover:text-[#edead3]"
                onclick="window.location.href='#products';">BILLETTERIE</button>
        </div>
    </section>

    <?php $products = $DB->query('SELECT * FROM products') ?>
    <?php foreach ($products as $product): ?>
        <section class="container mx-auto p-10 md:p-20 antialiased">
            <article
                class="flex flex-wrap md:flex-nowrap shadow-lg mx-auto max-w-3xl group cursor-pointer transform duration-500 hover:-translate-y-1">
                <img class="w-full max-h-[400px] object-cover md:w-52" src="img/<?= $product->id ?>.png"
                    alt="ticket billet">
                <div class="">
                    <div class="p-5 pb-10">
                        <h1 class="text-2xl font-semibold text-gray-800 mt-4">
                            <?= $product->name; ?>
                        </h1>
                        <p class="text-xl text-gray-700 mt-2 leading-relaxed">
                            Concert de Rihanna à Paris au Stade de France. Il faut cependant trouver un peu plus de
                            texte pour remplir cette section pour avoir du contenu.
                        </p>
                        <span class="text-2xl font-bold text-black">Prix :
                            <?= $product->price; ?>€
                        </span>
                    </div>
                    <div class="bg-black p-5">
                        <div class="sm:flex sm:justify-between">
                            <div>
                                <div class="text-lg text-gray-700">
                                    <span class="text-white font-bold">Rihanna Ticket</span>
                                </div>
                                <div class="flex items-center"></div>
                                <div class="flex justify-between">
                                    <input type="number"
                                        class="bg-[#F7F8FD] w-12 text-center focus:outline-none focus:border-[#F7F8FD] focus:ring-1 focus:ring-[#F7F8FD]"
                                        value="1" min="1">
                                </div>
                            </div>
                            <a href="addpanier?id=<?= $product->id; ?>">
                                <button
                                    class="mt-3 sm:mt-0 py-2 px-5 md:py-3 md:px-6 bg-white text-black font-bold text-lg rounded-lg shadow-lg  hover:bg-black hover:text-[#edead3]  hover:border-2  font-bold text-white md:text-lg rounded-lg shadow-md transition-colors duration-300">
                                    Réserver un ticket
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    <?php endforeach ?>
    </div>
    </section>
</main>


<script>
    const myVideo = document.querySelector('#my-video');
    const playAudioButton = document.querySelector('#play-audio-button');
    const windowHeight = window.innerHeight;

    function resizeVideo() {
        const videoHeight = myVideo.offsetHeight;
        if (videoHeight > windowHeight) {
            myVideo.style.height = windowHeight + 'px';
        } else {
            myVideo.style.height = 'auto';
        }
    }

    function playAudio() {
        myVideo.muted = false;
        myVideo.play();

    }

    window.addEventListener('resize', resizeVideo);
    resizeVideo();

    playAudioButton.addEventListener('click', playAudio);
</script>
<?php require 'footer.php'; ?>