<div class="flex flex-row m-10 space-x-4 items-center">
    <div class="w-1/2">
        <div class="flex flex-col w-auto max-w-lg bg-[#E2D7C1] rounded-xl items-center justify-center px-6 py-8 mx-auto">
            <div class="w-full ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        <?= ($data['seo']['title']) ?>
                    </h1>
                    <p class="text-sm font-light text-gray-500 text-center ">
                        Vous avez déjà un compte ? <a href="?path=/connexion" class="font-medium  hover:underline ">connexion</a>
                    </p>
                    <span class="text-<?= ($data['color']) ?> bg-white border-<?= ($data['color']) ?> rounded-md"> <?= ($data['message']) ?></span>
                    <form class="space-y-4 md:space-y-6" action="#" method="POST">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 "></label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5   " placeholder="Email" required="" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 "></label>
                            <input type="password" name="password" id="password" placeholder="Mot De Passe" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-white">J’accepte les conditions d’utilisations</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-white hover:bg-yellow-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border border-black">Inscription</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="w-1/2 max-w-lg rounded-xl object-cover">
        <img src="img/register.jpg" class="rounded-xl" alt="Your Image" />
    </div>
</div>