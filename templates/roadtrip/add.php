<form action="" method="post">
    <div>
        <label for="titleRoadTrip">Titre du roadtrip</label>
        <input type="text" name="titleRoadTrip" id="titleRoadTrip" placeholder="Titre du roadtrip">
    </div>
    <div>
        <label for="carType">Type de voiture</label>
        <select name="carType" id="carType">
            <?php foreach ($data['carTypes'] as $carType) : ?>
                <option value="<?= $carType->getId() ?>"><?= $carType->getName() ?></option>
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
