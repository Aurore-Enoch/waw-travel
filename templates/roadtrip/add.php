


<div class="m-10 space-y-4">
    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center h-[400px] md:h-[600]" style="background-image: url('img/poster3.png');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <div class="mb-20 text-4xl font-semibold ">Ajouter Un Roadtrips</div>
                    <a href='#' class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        Voir Tout.
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="m-0 md:m-16 lg:m-28 space-y-8">
        <div class="flex justify-end">
            <a href="#">
                <button type="submit" class="mt-6 rounded border-2 border-black bg-white px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-black transition duration-150 ease-in-out  hover:bg-yellow-700 hover:text-white " data-te-ripple-init data-te-ripple-color="light">
                    Enregistrer
                </button>
            </a>
        </div>
    </div>



<form action="" method="post">
    <div>
        <label for="titleRoadTrip">Titre du roadtrip</label>
        <input type="text" name="titleRoadTrip" id="titleRoadTrip" placeholder="Titre du roadtrip">
    </div>
    <div>
        <label for="carType">Type de voiture</label>
        <select name="carTypeId" id="carType">
            <?php foreach ($data['carTypes'] as $carType) : ?>
                <option value="<?= $carType->getId() ?>"><?= $carType->getName() ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit">Ajouter</button>
</form>
</div>