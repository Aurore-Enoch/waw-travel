<span class="text-[<?= ($data['color']) ?>] bg-white border-[<?= ($data['color']) ?>] rounded-md"> <?= ($data['message']) ?></span><form action="" method="post">
    <div class="m-10 space-y-4">
    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center h-[400px] md:h-[600]" style="background-image: url('img/poster3.png');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <div class="mb-20 text-4xl font-semibold ">Modifier le Roadtrip</div>
                    <a href='#' class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        Voir tout
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="m-0 md:m-16 lg:m-28 space-y-8">
        <div class="">
            <p class="font-bold text-2xl mt-20">Road Trips <i class="fa-solid fa-plane-departure"></i></p>
        </div>
        <form action="" method="post">
            <div class="grid grid-cols md:grid-cols-2 space-x-2 ">
                <div>
                    <label for="titleRoadTrip"></label>
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="text" name="titleRoadTrip" id="titleRoadTrip" placeholder="Titre du roadtrip" value="<?= $data['roadtrip']->getTitle() ?>">
                </div>
                <div>
                    <label for="carType"></label>
                    <select class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" name="carTypeId" id="carType">
                        <?php foreach ($data['carTypes'] as $carType) : ?>
                            <option value="<?= $carType->getId() ?>" <?= $carType->getId() == $data['roadtrip']->getCarType()->getId() ? 'selected' : '' ?>>
                                <?= $carType->getName() ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="mt-6 rounded border-2 border-black bg-white px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-black transition duration-150 ease-in-out  hover:bg-yellow-700 hover:text-white" data-te-ripple-init data-te-ripple-color="light">
                Enregistrer
            </button>
        </form>



        <div>
            <p class="font-bold text-2xl mt-20">Ajouter Des checkpoints <i class="fa-solid fa-location-dot"></i></p>
        </div>
        <form action="" method="post">
            <div class="grid grid-cols md:grid-cols-2 space-x-4 my-4">
                <div>
                    <label for="titleCheckpoint"></label>
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="text" name="titleCheckpoint" id="titleCheckpoint" placeholder="Titre du checkpoint" value="<?= $data['checkpoint'] ? $data['checkpoint']->getTitle() : '' ?>">
                </div>
                <div>
                    <label for="coordinates"></label>
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="text" name="coordinates" id="coordinates" placeholder="Coordonnées du checkpoint" value="<?= $data['checkpoint'] ? $data['checkpoint']->getCoordinates() : '' ?>">
                </div>
            </div>

            <div class="grid grid-cols md:grid-cols-2 space-x-4 my-6">
                <div>
                    <label for="arrival_date"></label>
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="datetime-local" name="arrival_date" id="arrival_date" placeholder="Date d'arrivée" value="<?= $data['checkpoint'] ? $data['checkpoint']->getArrivalDate() : '' ?>">
                </div>
                <div>
                    <label for="departure_date"></label>
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="datetime-local" name="departure_date" id="departure_date" placeholder="Date de départ" value="<?= $data['checkpoint'] ? $data['checkpoint']->getDepartureDate() : '' ?>">
                </div>
            </div>

            <button type="submit" class="mt-6 rounded border-2 border-black bg-white px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-black transition duration-150 ease-in-out  hover:bg-yellow-700 hover:text-white" data-te-ripple-init data-te-ripple-color="light">
                Ajouter
            </button>
        </form>



        <div>
            <p class="font-bold text-2xl mt-20">Mes Checkpoints <i class="fa-solid fa-location-dot"></i></p>
        </div>

        <div class="flex w-full">
            <div class="flex flex-col p-8 bg-[#E2D7C1] border border-black rounded-lg w-full justify-between items-center lg:items-stretch shadow-lg">




                <div class="grid grid-cols md:grid-cols-3 m-2">
                    <p class="my-2 font-semibold">Chekpoints</p>
                    <p class="my-2">Coordonnées</p>
                </div>
                <div class="grid grid-cols md:grid-cols-3 m-2 ">
                    <p class="my-2 font-semibold">chekpoint1</p>
                    <p class="my-2">37.7749° N, 122.4194° W</p>
                    <div class="flex justify-end">
                        <a href="?path=/roadtrips/<?= $data['roadtrip']->getId() ?>/editer">
                            <i class="fa-regular fa-pen-to-square text-2xl mr-4"></i>
                        </a>
                        <a href="?path=/roadtrips/<?= $data['roadtrip']->getId() ?>/supprimer">
                            <i class="fa-solid fa-trash text-2xl"></i>
                        </a>
                    </div>
                </div>
                <hr class="h-[2] bg-black rounded-md " />

                <div class="grid grid-cols md:grid-cols-3 m-2">
                    <p class="my-2 font-semibold">chekpoint2</p>
                    <p class="my-2">37.7749° N, 122.4194° W</p>
                    <div class="flex justify-end ">
                        <a href="?path=/roadtrips/<?= $data['roadtrip']->getId() ?>/editer">
                            <i class="fa-regular fa-pen-to-square text-2xl mr-4"></i>
                        </a>
                        <a href="?path=/roadtrips/<?= $data['roadtrip']->getId() ?>/supprimer">
                            <i class="fa-solid fa-trash text-2xl"></i>
                        </a>
                    </div>
                </div>
                <hr class="h-[2] bg-black rounded-md " />
                <!-- les chekpoints sont pas fonctionnel a integré plutard -->
                <?php if (isset($data['checkpoints'])) : ?>
                    <?php foreach ($data['checkpoints'] as $checkpoint) : ?>
                        <p><?= $checkpoint->getTitle() ?></p>
                        <p><?= $checkpoint->getCoordinates() ?></p>
                        <p><?= $checkpoint->getArrivalDate() ?></p>
                        <p><?= $checkpoint->getDepartureDate() ?></p>
                        <button><a href="?path=/roadtrips/<?= $data['roadtrip']->getId() ?>/editer&checkpoint_id=<?= $checkpoint->getId() ?>">Modifier</a></button>
                        <button><a href="?path=/roadtrips/<?= $data['roadtrip']->getId() ?>/delete_checkpoint/<?= $checkpoint->getId() ?>">Supprimer</a></button>
                    <?php endforeach ?>
                <?php endif ?>

            </div>
        </div>

    </div>

</div>