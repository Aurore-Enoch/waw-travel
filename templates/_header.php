<nav class="bg-[#E2D7C1] border border-b-black">
  <div class=" max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="?page=/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="img/logo-waw-travel.png" class="h-10" alt="waw-travel" />
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
      <span class="sr-only">menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 items-center">
        <li>
          <a href="?page=/" class="block py-2 px-3 " aria-current="page">Accueil</a>
        </li>
        <?php if (isset($_SESSION['user'])) : ?>
                <li><a href="?page=/roadtrips" class="block py-2 px-3 text-gray-900 rounded p-2">RoadTrips</a></li>
                <li><a href="?page=/profil" class="block py-2 px-3 text-gray-900 rounded p-2 ">Profil</a></li>
                <li><a href="?page=/deconnexion" class="block py-2 px-3 text-gray-900 bg-white border border-gray-900 rounded-lg hover:bg-[#58463E] hover:text-white p-2">Déconnexion</a></li>
            <?php else : ?>
              <li><a href="?page=/connexion" class="block py-2 px-3 text-gray-900 bg-white border border-gray-900 rounded-lg hover:bg-[#58463E] hover:text-white p-2">Connexion</a></li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>