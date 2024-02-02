<div class="m-10 space-y-4">
    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center h-[400px] md:h-[600]" style="background-image: url('img/poster3.png');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <div class="mb-20 text-4xl font-semibold ">Ajouter Un Roadtrips</div>
                    <a href='?page=/roadtrips' class="rounded border border-1 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        Voir Tout.
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="m-0 md:m-16 lg:m-28">
        <?php if ($data['message']) : ?>
            <span class="flash-message text-[<?= ($data['color']) ?>] bg-white border border-[<?= ($data['color']) ?>] rounded-md p-1 font-semibold"> <?= ($data['message']) ?></span>
        <?php endif ?>
        <form action="" method="post">
            <p class="font-bold text-2xl mb-4 mt-20">Road Trips <i class="fa-solid fa-plane-departure"></i></p>
            <div class="grid grid-cols md:grid-cols-2 gap-6 ">
                <div>
                    <input class="w-full p-2 bg-[#E2D7C1] placeholder-[#58463E] border border-black rounded-lg" type="text" name="titleRoadTrip" id="titleRoadTrip" placeholder="Titre du roadtrip">
                </div>
                <div class="!ml-0 !mr-0">
                    <label for="carType"></label>
                    <select class="w-full p-2 bg-[#E2D7C1] text-[#58463E] border border-black rounded-lg" name="carTypeId" id="carType">
                        <?php foreach ($data['carTypes'] as $carType) : ?>
                            <option value="<?= $carType->getId() ?>"><?= $carType->getName() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>


            <div>
                <div>
                    <p class="font-bold text-2xl mt-20">Checkpoint de départ <i class="fa-solid fa-plane-departure"></i></p>
                </div>

                <div class="grid grid-cols md:grid-cols-2 gap-6 my-4">
                    <div>
                        <label for="titleDepartureCheckpoint"></label>
                        <input class="w-full p-2 bg-[#E2D7C1] placeholder-[#58463E] border border-black rounded-lg" type="text" name="titleDepartureCheckpoint" id="titleDepartureCheckpoint" placeholder="Titre du checkpoint">
                    </div>
                    <div>
                        <label for="departureCoordinates"></label>
                        <input class="w-full p-2 bg-[#E2D7C1] placeholder-[#58463E] border border-black rounded-lg" type="text" name="departureCoordinates" id="departureCoordinates" placeholder="Coordonnées du checkpoint">
                    </div>
                </div>
                <div class="grid grid-cols md:grid-cols-2 gap-6 my-4 ">
                    <div>
                        <label for="departure_date_checkpoint_1"></label>
                        <input class="w-full p-2 bg-[#E2D7C1] placeholder-[#58463E] border border-black rounded-lg" type="datetime-local" name="departure_date_checkpoint_1" id="departure_date_checkpoint_1" placeholder="Date de départ">
                    </div>
                    <div>
                        <label for="arrival_date_checkpoint_1"></label>
                        <input class="w-full p-2 bg-[#E2D7C1] placeholder-[#58463E] border border-black rounded-lg" type="datetime-local" name="arrival_date_checkpoint_1" id="arrival_date_checkpoint_1" placeholder="Date d'arrivée">
                    </div>
                </div>
            </div>

            <div>

                <div>
                    <p class="font-bold text-2xl mt-20">Checkpoint d'arrivée <i class="fa-solid fa-location-dot"></i></p>
                </div>
                <div class="grid grid-cols md:grid-cols-2  gap-6 my-4">
                    <div>
                        <label for="titleArrivalCheckpoint"></label>
                        <input class="w-full p-2 bg-[#E2D7C1] placeholder-[#58463E] border border-black rounded-lg" type="text" name="titleArrivalCheckpoint" id="titleArrivalCheckpoint" placeholder="Titre du checkpoint">
                    </div>
                    <div>
                        <label for="arrivalCoordinates"></label>
                        <input class="w-full p-2 bg-[#E2D7C1] placeholder-[#58463E] border border-black rounded-lg" type="text" name="arrivalCoordinates" id="arrivalCoordinates" placeholder="Coordonnées du checkpoint">
                    </div>
                </div>
                <div class="grid grid-cols md:grid-cols-2  gap-6 my-4">
                    <div>
                        <label for="departure_date_checkpoint_2"></label>
                        <input class="w-full p-2 bg-[#E2D7C1] placeholder-[#58463E] border border-black rounded-lg" type="datetime-local" name="departure_date_checkpoint_2" id="departure_date_checkpoint_2" placeholder="Date de départ">
                    </div>
                    <div>
                        <label for="arrival_date_checkpoint_2"></label>
                        <input class="w-full p-2 bg-[#E2D7C1] placeholder-[#58463E] border border-black rounded-lg" type="datetime-local" name="arrival_date_checkpoint_2" id="arrival_date_checkpoint_2" placeholder="Date d'arrivée">
                    </div>
                </div>

            </div>
            <button class="mt-6 rounded border border-1 border-black bg-white px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-black transition duration-150 ease-in-out  hover:bg-[#58463E] hover:text-white">
                Ajouter
            </button>
        </form>

    </div>



</div>