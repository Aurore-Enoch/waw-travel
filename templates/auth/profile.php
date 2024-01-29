<div class="flex flex-col md:flex-row m-10 space-x-0 space-y-6 md:space-x-4 md:space-y-0 items-center">
    <div class="w-full md:w-1/2 ">
            <div class="flex flex-col w-auto max-w-lg bg-[#E2D7C1] rounded-xl items-center justify-center px-6 py-8 mx-auto">
                <div class="w-full">
                    <div class="p-6 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold text-center leading-tight tracking-tight text-black md:text-2xl p-2">
                        <?= htmlspecialchars($data['seo']['title']) ?>
                        </h1>
                        <?php if ($data['message']) : ?>
                        <span class="flash-message text-[<?= ($data['color']) ?>] bg-white border border-[<?= ($data['color']) ?>] rounded-md p-1 font-semibold"> <?= ($data['message']) ?></span>
                        <?php endif ?>
                        <form class="space-y-4 md:space-y-6" action="#" method="POST">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Nouveau email</label>
                            <input type="email" name="email" id="email" value="<?= ($data['email']); ?>" class="bg-gray-50 border border-black text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                        </div>
                        <div>
                            <label for="newPassword" class="block mb-2 text-sm font-medium text-gray-900 ">Nouveau mot de passe</label>
                            <input type="password" name="newPassword" id="newPassword" class="bg-gray-50 border border-black text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                        </div>
                            <button type="submit" class="w-full text-black bg-white border border-black hover:bg-[#58463E] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <div class="w-full md:w-1/2 max-w-lg rounded-xl object-cover">
        <img src="img/profilePage.jpg" class="rounded-xl" alt="Your Image" />
    </div>
</div>