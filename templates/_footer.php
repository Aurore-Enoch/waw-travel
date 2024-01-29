<footer class="text-center bg-[#CBBB9F] p-8 border border-t-black">
    <div class="flex flex-row items-center justify-center space-x-16">
        <p> <a href="?page=/" class="block py-2 px-3 " aria-current="page">Accueil</a></p>
        <img src="img/logo-waw-travel.png" class="h-20" alt="Logo" />
        <p>
            <a href="<?php echo isset($_SESSION['user']) ? '?page=/roadtrips' : '?page=/connexion'; ?>">RoadTrips</a>
        </p>

    </div>
    <hr class="m-10 bg-[#58463E]  h-1 rounded-xl" />
    <div class="flex justify-center items-center">
        <p>© WAW Travel, 2023. Tout droits réservés - Mentions légales</p>
    </div>
</footer>