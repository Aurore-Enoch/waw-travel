<span class="text-[<?= ($data['color']) ?>] bg-white border-[<?= ($data['color']) ?>] rounded-md"> <?= ($data['message']) ?></span><form action="" method="post">
    <div>
        <label for="titleRoadTrip">Titre du roadtrip</label>
        <input type="text" name="titleRoadTrip" id="titleRoadTrip" value="<?= $data['roadtrip']->getTitle() ?>">
    </div>
    <div>
        <label for="carType">Type de voiture</label>
        <select name="carTypeId" id="carType">
            <?php foreach ($data['carTypes'] as $carType) : ?>
                <option value="<?= $carType->getId() ?>" <?= $carType->getId() == $data['roadtrip']->getCarType()->getId() ? 'selected' : '' ?>>
                    <?= $carType->getName() ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit">Modifier</button>
</form>
<form action="" method="post">
    <div>
        <label for="titleCheckpoint">Titre du checkpoint</label>
        <input type="text" name="titleCheckpoint" id="titleCheckpoint" placeholder="Titre du checkpoint" value="<?= $data['checkpoint'] ? $data['checkpoint']->getTitle() : '' ?>">
    </div>
    <div>
        <label for="coordinates">Coordonnées du checkpoint</label>
        <input type="text" name="coordinates" id="coordinates" placeholder="Coordonnées du checkpoint" value="<?= $data['checkpoint'] ? $data['checkpoint']->getCoordinates() : '' ?>">
    </div>
    <div>
        <label for="arrival_date">Date d'arrivée</label>
        <input type="datetime-local" name="arrival_date" id="arrival_date" placeholder="Date d'arrivée" value="<?= $data['checkpoint'] ? $data['checkpoint']->getArrivalDate() : '' ?>">
    </div>
    <div>
        <label for="departure_date">Date de départ</label>
        <input type="datetime-local" name="departure_date" id="departure_date" placeholder="Date de départ" value="<?= $data['checkpoint'] ? $data['checkpoint']->getDepartureDate() : '' ?>">
    </div>
    <button type="submit">Ajouter</button>
</form>
<section>
    <h2>Checkpoints</h2>
    <?php if(isset($data['checkpoints'])) : ?>
        <?php foreach ($data['checkpoints'] as $checkpoint) : ?>
            <p><?= $checkpoint->getTitle() ?></p>
            <p><?= $checkpoint->getCoordinates() ?></p>
            <p><?= $checkpoint->getArrivalDate() ?></p>
            <p><?= $checkpoint->getDepartureDate() ?></p>
            <button><a href="?path=/roadtrips/<?= $data['roadtrip']->getId()?>/editer&checkpoint_id=<?= $checkpoint->getId() ?>">Modifier</a></button>      
            <button><a href="?path=/roadtrips/<?= $data['roadtrip']->getId()?>/delete_checkpoint/<?= $checkpoint->getId() ?>">Supprimer</a></button>
            <?php endforeach ?>
    <?php endif ?>
</section>
