<div class="m-10 space-y-4">
    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center h-[400px] md:h-[600]" style="background-image: url('img/poster3.png');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <div class="mb-20 text-4xl font-semibold ">Modifier le Roadtrip</div>
                    <a href='?page=/roadtrips' class="rounded border border-1 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        Voir tout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="m-0 md:m-16 lg:m-28 space-y-8">
    <?php if ($data['message']) : ?>
                        <span class="flash-message text-[<?= ($data['color']) ?>] bg-white border border-[<?= ($data['color']) ?>] rounded-md p-1 font-semibold"> <?= ($data['message']) ?></span>
                        <?php endif ?>
        <div class="">
            <p class="font-bold text-2xl mt-20">Road Trips <i class="fa-solid fa-plane-departure"></i></p>
        </div>
        <form action="" method="post">
            <div class="grid grid-cols md:grid-cols-2 space-x-2 gap-4 ">
                <div>
                    <label for="titleRoadTrip"></label>
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="text" name="titleRoadTrip" id="titleRoadTrip" placeholder="Titre du roadtrip" value="<?= $data['roadtrip']->getTitle() ?>">
                </div>
                <div class="!ml-0 !mr-0">
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
            <button type="submit" class="mt-6 rounded border border-1 border-black bg-white px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-black transition duration-150 ease-in-out  hover:bg-[#58463E] hover:text-white" data-te-ripple-init data-te-ripple-color="light">
                Enregistrer
            </button>
        </form>
        <div>
            <p class="font-bold text-2xl mt-20">Ajouter Des checkpoints <i class="fa-solid fa-location-dot"></i></p>
        </div>
        <form action="" method="post" id="form-checkpoint">
            <div class="grid grid-cols md:grid-cols-2 space-x-4 my-4 gap-4">
                <div>
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="text" name="titleCheckpoint" id="titleCheckpoint" placeholder="Titre du checkpoint" value="<?= $data['checkpoint'] ? $data['checkpoint']->getTitle() : '' ?>">
                </div>
                <div class="!ml-0 !mr-0">
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="text" name="coordinates" id="coordinates" placeholder="Coordonnées du checkpoint" value="<?= $data['checkpoint'] ? $data['checkpoint']->getCoordinates() : '' ?>">
                </div>
            </div>
            <div class="grid grid-cols md:grid-cols-2 space-x-4 my-6 gap-4">
                <div>
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="datetime-local" name="arrival_date" id="arrival_date" placeholder="Date d'arrivée" value="<?= $data['checkpoint'] ? $data['checkpoint']->getArrivalDate() : '' ?>">
                </div>
                <div class="!ml-0 !mr-0">
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="datetime-local" name="departure_date" id="departure_date" placeholder="Date de départ" value="<?= $data['checkpoint'] ? $data['checkpoint']->getDepartureDate() : '' ?>">
                </div>
            </div>
            <div class="grid grid-cols md:grid-cols-2 space-x-4 my-6">
                <div>
                    <input class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" type="number" name="orderNumber" id="orderNumber" placeholder="Ordre du checkpoint" value="<?= $data['checkpoint'] ? $data['checkpoint']->getOrderNumber() : '' ?>" min="1">
                </div>
            </div>
            <button type="submit" class="mt-6 rounded border border-1 border-black bg-white px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-black transition duration-150 ease-in-out  hover:bg-[#58463E] hover:text-white">
                Ajouter
            </button>
        </form>
        <div>
            <p class="font-bold text-2xl mt-20">Mes Checkpoints <i class="fa-solid fa-location-dot"></i></p>
        </div>
        <div class="flex w-full text-[10px] sm:text-base">
            <div class="flex flex-col gap-4 md:p-8 py-8 px-4 bg-[#E2D7C1] border border-black rounded-lg w-full justify-between lg:items-stretch shadow-lg">
                <div class="grid grid-cols-3 m-2 ">
                    <p class="my-2 font-semibold">Chekpoints</p>
                    <p class="my-2">Coordonnées</p>
                </div>

                <?php if (isset($data['checkpoints'])) : ?>
                    <?php foreach ($data['checkpoints'] as $checkpoint) : ?>
                        <div class="grid grid-cols-3 m-2 w-full ">
                            <p class="my-2 font-semibold"><?= $checkpoint->getTitle() ?></p>
                            <p class="my-2"><?= $checkpoint->getCoordinates() ?></p>
                            <!-- <p><?= $checkpoint->getArrivalDate() ?></p>
                            <p><?= $checkpoint->getDepartureDate() ?></p> -->
                            <div class="flex md:justify-end ">
                                <button><a href="?page=/roadtrips/<?= $data['roadtrip']->getId() ?>/editer&checkpoint_id=<?= $checkpoint->getId() ?>"> <i class="fa-regular fa-pen-to-square text-2xl mr-4"></i></a></button>
                                <button><a href="?page=/roadtrips/<?= $data['roadtrip']->getId() ?>/delete_checkpoint/<?= $checkpoint->getId() ?>"> <i class="fa-solid fa-trash text-2xl"></i></a></button>
                            </div>
                        </div>
                        <hr class="h-0.5 bg-black rounded-md" />
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
