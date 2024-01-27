
<div class="m-10 space-y-4">
    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center h-[400px] md:h-[600]" style="background-image: url('img/poster3.png');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <div class="mb-20 text-4xl font-semibold ">Le Roadtrips d'<?= $data['seo']['title'] ?></div>
                    <a href='#' class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        Créer un Roadtrip
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<button><a href="?page=/roadtrips/<?= $data['roadtrip']->getId()?>/supprimer">Supprimer</a></button>
<button><a href="?page=/roadtrips/<?= $data['roadtrip']->getId()?>/editer">Modifier</a></button>
<div class="row">
    <div class="col-12">
        <h2><?= $data['roadtrip']->getTitle() ?></h2>
        <p>Type de voiture : <?= $data['carTypeName'] ?></p>
        <p> Checkpoints : </p>
        <?php foreach ($data['checkpoints'] as $checkpoint) : ?>
            <li><?= $checkpoint->getTitle() ?></li>
            <li><?= $checkpoint->getCoordinates() ?></li>
            <li><?= $checkpoint->getArrivalDate() ?></li>
            <li><?= $checkpoint->getDepartureDate() ?></li>
            <?php endforeach ?>
    </div>
</div>