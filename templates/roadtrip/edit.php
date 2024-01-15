<form action="" method="post">
    <div>
        <label for="titleRoadTrip">Titre du roadtrip</label>
        <input type="text" name="titleRoadTrip" id="titleRoadTrip" value="<?= $data['roadtrip']->getTitle() ?>">
    </div>
    <div>
        <label for="carType">Type de voiture</label>
        <select name="carTypeId" id="carType">
            <?php foreach ($data['carTypes'] as $carType) : ?>
                <option value="<?= $carType->getId() ?>" <?= $carType->getId() == $data['roadtrip']->carTypeId() ? 'selected' : '' ?>>
                    <?= $carType->getName() ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <div>
        <label for="titleCheckpoint">Titre du checkpoint</label>
        <input type="text" name="titleCheckpoint" id="titleCheckpoint" placeholder="Titre du checkpoint">
    </div>
    <div>
        <label for="coordinates">Coordonnées du checkpoint</label>
        <input type="text" name="coordinates" id="coordinates" placeholder="Coordonnées du checkpoint">
    </div>
    <div>
        <label for="arrivalDate">Date d'arrivée</label>
        <input type="date" name="arrivalDate" id="arrivalDate" placeholder="Date d'arrivée">
    </div>
    <div>
        <label for="departureDate">Date de départ</label>
        <input type="date" name="departureDate" id="departureDate" placeholder="Date de départ">
    </div>
    <button type="submit">Ajouter</button>
</form>
<section>
    <h2>Checkpoints</h2>
    <?php if(isset($data['checkpoints'])) : ?>
        <?php foreach ($data['checkpoints'] as $checkpoint) : ?>
            <?php var_dump($checkpoint) ?>
            <p><?= $checkpoint->getTitle() ?></p>
            <p><?= $checkpoint->getCoordinates() ?></p>
            <p><?= $checkpoint->getArrivalDate() ?></p>
            <p><?= $checkpoint->getDepartureDate() ?></p>
        <?php endforeach ?>
    <?php endif ?>
</section>
