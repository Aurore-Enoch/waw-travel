<!-- <div class="container">
    <h1><?= htmlspecialchars($data['seo']['title']) ?></h1>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email">Adresse email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
        </div>
        <button type="submit">Se connecter</button>
    </form>
</div> -->


<div class="flex flex-row m-10 space-x-4 items-center">
    <div class="w-1/2">
            <div class="flex flex-col w-auto max-w-lg bg-[#E2D7C1] rounded-xl items-center justify-center px-6 py-8 mx-auto">
                <div class="w-full">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900 md:text-2xl ">
                            Connexion
                        </h1>
                        <p class="text-sm text-center font-light text-gray-500 ">
                                Vous n'avez pas encore de compte? <a href="?path=/inscription" class="font-medium  hover:underline ">S'inscrire</a>
                            </p>
                        <form class="space-y-4 md:space-y-6" action="#" method="POST">
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 "></label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5   " placeholder="Email" required="" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 "></label>
                                <input type="password" name="password" id="password" placeholder="Mot De Passe" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
                            </div>
                            <p class="flex justify-end text-sm font-light text-gray-500 hover:underline">
                               Mot De Passe Oublié ?
                            </p>
                            <button type="submit" class="w-full bg-white hover:bg-yellow-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border border-black">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <div class="w-full md:w-1/2 max-w-lg rounded-xl object-cover">
        <img src="img/login.jpg" class="rounded-xl" alt="Your Image" />
    </div>
</div>