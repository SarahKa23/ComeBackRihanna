<?php require 'header.php'; ?>


<div class="max-w-md mx-auto mt-16 bg-white rounded-lg overflow-hidden md:max-w-lg border border-gray-400">
    <div class="px-4 py-2 border-b border-gray-200">
        <h2 class="font-semibold text-gray-800">Vos Tickets</h2>
    </div>
    <?php
    $ids = array_keys($_SESSION['panier']);
    if (empty($ids)) {
        $products = array();
    } else {
        $products = $DB->query('SELECT * FROM products WHERE id IN (' . implode(',', $ids) . ')');

    }
         // Afficher le message d'avertissement pour le remboursement
    echo '<p class="text-red-600 text-center my-4">Attention: Vous devez verser un acompte de 5€ avant de valider votre achat, '
    . 'ce montant sera remboursé dans les 4 jours avant l\'annulation de la commande.</p>';
     foreach ($products as $product):
        ?>

        <div class="flex flex-col divide-y divide-gray-200">

            <div class="flex items-center py-4 px-6">

                <img class="w-16 h-16 object-cover rounded" src="img/<?= $product->id; ?>.png" alt="Ticket image">
                <div class="ml-3">
                    <h3 class="text-gray-900 font-semibold">
                        <?= $product->name; ?>
                    </h3>
                    <p class="text-gray-700 mt-1">
                        <?= $product->price; ?>€
                    </p>
                    <p class="text-gray-700 mt-1">Quantité:
                        <?= $_SESSION['panier'][$product->id]; ?>
                    </p>
                </div>
                <a href="panier.php?delPanier=<?= $product->id; ?>"><button
                        class="ml-auto py-2 px-4 bg-gray-800 hover:bg-gray-700 text-white rounded-lg">
                        Supprimer les Ticket
                    </button>
                </a>

            </div>
        <?php endforeach ?>
        <div>
            <div class="flex items-center justify-between px-6 py-3 bg-gray-100">

                <h3 class="text-gray-900 font-semibold">Total:
                    <?= $panier->total() + 5; ?>€
                </h3>
                <h3 class="text-gray-900 font-semibold">Total Ticket:
                    <?= $panier->count(); ?>
                </h3>
                <button type="submit" id="paymentButton"
                    class="group relative h-10 w-48 overflow-hidden rounded-lg bg-white text-lg shadow rounded-3xl bg-beige-400 bg-opacity-50 px-10 py-2 text-black shadow-xl backdrop-blur-md justify-center">
                    <div
                        class="absolute inset-0 w-3 bg-gray-900 transition-all duration-[250ms] ease-out group-hover:w-full">
                    </div>

                    <span id="show-form" class="relative text-black group-hover:text-white">Payement</span>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<br>
<br>

<br>
<!-- component -->
<style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
</style>
<style>
    /*
module.exports = {
    plugins: [require('@tailwindcss/forms'),]
};
*/
    .form-radio {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
        display: inline-block;
        vertical-align: middle;
        background-origin: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        flex-shrink: 0;
        border-radius: 100%;
        border-width: 2px;

    }

    .form-radio:checked {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
        border-color: transparent;
        background-color: currentColor;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }

    @media not print {
        .form-radio::-ms-check {
            border-width: 1px;
            color: transparent;
            background: inherit;
            border-color: inherit;
            border-radius: inherit;
        }
    }

    .form-radio:focus {
        outline: none;
    }

    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
        background-repeat: no-repeat;
        padding-top: 0.5rem;
        padding-right: 2.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        background-position: right 0.5rem center;
        background-size: 1.5em 1.5em;
    }

    .form-select::-ms-expand {
        color: #a0aec0;
        border: none;
    }

    @media not print {
        .form-select::-ms-expand {
            display: none;
        }
    }

    @media print and (-ms-high-contrast: active),
    print and (-ms-high-contrast: none) {
        .form-select {
            padding-right: 0.75rem;
        }
    }
</style>
<div id="paymentSection" style="display: none;">
    <div class="min-w-screen min-h-screen bg-white flex items-center justify-center px-5 pb-10 pt-16">

        <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-black" style="max-width: 600px">
            <div class="w-full pt-1 pb-5">
                <div
                    class="bg-black text-[#edead3] overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                    <i class="mdi mdi-credit-card-outline text-3xl"></i>
                </div>
            </div>
            <div class="mb-10">
                <h1 class="text-center font-bold text-xl uppercase">INFORMATIONS DE PAYEMENT</h1>
            </div>
            <div class="mb-3 flex -mx-2">
                <div class="px-2">
                    <label for="type1" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                    </label>
                </div>
                <div class="px-2">
                    <label for="type2" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type2">
                        <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png"
                            class="h-8 ml-3">
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-1">Nom de la carte bancaire</label>
                <div>
                    <input
                        class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                        placeholder="John Smith" type="text" />
                </div>
            </div>
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-1">Numéro de carte bancaire</label>
                <div>
                    <input
                        class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                        placeholder="0000 0000 0000 0000" type="text" />
                </div>
            </div>
            <div class="mb-3 -mx-2 flex items-end">
                <div class="px-2 w-1/2">
                    <label class="font-bold text-sm mb-2 ml-1">Date d'éxpiration</label>
                    <div>
                        <select
                            class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                            <option value="01">01 - Janvier</option>
                            <option value="02">02 - Février</option>
                            <option value="03">03 - Mars</option>
                            <option value="04">04 - Avril</option>
                            <option value="05">05 - Mai</option>
                            <option value="06">06 - Juin</option>
                            <option value="07">07 - Juillet</option>
                            <option value="08">08 - Aout</option>
                            <option value="09">09 - Septembre</option>
                            <option value="10">10 - Octobre</option>
                            <option value="11">11 - Novembre</option>
                            <option value="12">12 - Decembre</option>
                        </select>
                    </div>
                </div>
                <div class="px-2 w-1/2">
                    <select
                        class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                    </select>
                </div>
            </div>
            <div class="mb-10">
                <label class="font-bold text-sm mb-2 ml-1">Security code</label>
                <div>
                    <input
                        class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                        placeholder="000" type="text" />
                </div>
            </div>
            <div>
                <button
                    class="block w-full max-w-xs mx-auto bg-white border-2 text-black font-bold  hover:bg-black hover:text-[#edead3]  rounded-lg px-3 py-3 font-semibold"><i
                        class="mdi mdi-lock-outline mr-1"></i> PAYEZ MAINTENANT</button>
            </div>
        </div>
    </div>

</div>


<script>
    const paymentButton = document.getElementById("paymentButton");
    const paymentSection = document.getElementById("paymentSection");

    paymentButton.addEventListener("click", () => {
        paymentSection.style.display = "block";
    });
</script>

<?php require 'footer.php'; ?>