<div class="m-10 space-y-4">
    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center h-[400px] md:h-[600]" style="background-image: url('img/poster3.png');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <div class="mb-20 text-4xl font-semibold ">Le Roadtrips d'<?= $data['seo']['title'] ?></div>
                    <a href='?page=/roadtrips/ajouter' class="rounded border border-1 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-[#58463E] hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        Créer un Roadtrip
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="md:m-16 lg:m-28 space-y-8 py-12">
        <div class="flex justify-end ">
            <a href="?page=/roadtrips/<?= $data['roadtrip']->getId() ?>/editer">
                <i class="fa-regular fa-pen-to-square text-2xl mr-4"></i>
            </a>
            <a href="?page=/roadtrips/<?= $data['roadtrip']->getId() ?>/supprimer">
                <i class="fa-solid fa-trash text-2xl"></i>
            </a>
        </div>

        <div class="flex w-full">
            <div class="flex flex-col p-8 bg-[#E2D7C1] border border-black rounded-lg w-full justify-between items-center lg:items-stretch shadow-lg">

                <div>
                    <div class="mb-4">
                        <p class="font-bold text-2xl">Road Trips <i class="fa-solid fa-plane-departure"></i></p>
                    </div>

                    <div class="grid grid-cols md:grid-cols-2">
                        <p class="my-2"><i class="fa-solid fa-road"></i>
                            <span class="font-semibold"> Titre : </span> <?= $data['roadtrip']->getTitle() ?>
                        </p>
                        <p class="my-2"><i class="fa-solid fa-car"></i><span class="font-semibold"> Type of Vehicule : </span><?= $data['carTypeName'] ?>
                        </p>
                    </div>
                    <div class="grid grid-cols md:grid-cols-2">
                        <p class="my-2"><i class="fa-solid fa-location-dot"></i><span class="font-semibold"> Checkpoint de départ : </span> <?= $data['roadtrip']->getFirstCheckpoint()->getTitle() ?></p>
                        <p class="my-2"><i class="fa-solid fa-location-dot"></i><span class="font-semibold"> Checkpoint d'Arrive : </span> <?= $data['roadtrip']->getLastCheckpoint()->getTitle() ?></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex w-full">
            <div class="flex flex-col p-8 bg-[#E2D7C1] border border-black rounded-lg w-full justify-between items-center lg:items-stretch shadow-lg gap-4">
                <div class="mb-4">
                    <p class="font-bold text-2xl">Checkpoints <i class="fa-solid fa-location-dot"></i></p>
                </div>
                <?php foreach ($data['checkpoints'] as $checkpoint) : ?>
                    <div>
                        <div class="grid grid-cols-4 text-[10px] sm:text-base">
                            <p class="my-2 font-semibold"><?= $checkpoint->getTitle() ?></p>
                            <p class="my-2"><?= $checkpoint->getCoordinates() ?></p>
                            <p class="my-2"><?= $checkpoint->getArrivalDate() ?></p>
                            <p class="my-2"><?= $checkpoint->getDepartureDate() ?></p>

                        </div>
                        <hr class="h-0.5 bg-black rounded-md" />
                    </div>

                <?php endforeach ?>
            </div>
        </div>

    </div>
</div>