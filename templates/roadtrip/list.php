
<div class="m-10 space-y-4">
<?php if ($data['message']) : ?>
                        <span class="flash-message text-[<?= ($data['color']) ?>] bg-white border border-[<?= ($data['color']) ?>] rounded-md p-1 font-semibold"> <?= ($data['message']) ?></span>
<?php endif ?>
    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center h-[400px] md:h-[600px]" style="background-image: url('img/poster3.png');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <div class="mb-20 text-4xl font-semibold ">RoadTrips</div>
                    <a href='?page=/roadtrips' class="rounded border border-1 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        Voir Tout.
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="m-0 md:m-16 lg:m-28 space-y-8">
        <div class="flex justify-end">
            <a href="?page=/roadtrips/ajouter">
                <button class="mt-6 rounded border border-1 border-black bg-white px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-black transition duration-150 ease-in-out  hover:bg-[#58463E] hover:text-white" data-te-ripple-init data-te-ripple-color="light">
                    nouveau
                </button>
            </a>
        </div>
        <?php foreach ($data['roadtrips'] as $roadtrip) : ?>
            <div class="flex w-full">
                <div class="flex flex-col p-8 bg-[#E2D7C1] border border-black rounded-lg w-full justify-between items-center lg:items-stretch shadow-lg">
                    <a href="?page=/roadtrips/<?= $roadtrip->getId() ?>">
                        <div class="grid grid-cols md:grid-cols-2">
                            <p class="my-2"><i class="fa-solid fa-road"></i>
                                <span class="font-semibold"> Titre : </span> <?= $roadtrip->getTitle() ?>
                            </p>
                            <p class="my-2"><i class="fa-solid fa-car"></i><span class="font-semibold"> Type of Vehicule : </span><?= $roadtrip->getCarType()->getName() ?></p>
                        </div>
                        <div class="grid grid-cols md:grid-cols-2">
                            <p class="my-2"><i class="fa-solid fa-location-dot"></i><span class="font-semibold"> Checkpoint de départ : </span><?= $roadtrip->getFirstCheckpoint()->getTitle() ?> </p>
                            <p class="my-2"><i class="fa-solid fa-location-dot"></i><span class="font-semibold"> Checkpoint d'Arrive : </span><?= $roadtrip->getLastCheckpoint()->getTitle() ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div />