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
