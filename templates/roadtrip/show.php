<!-- supprimer le roadtrip -->
<button><a href="?path=/roadtrips/<?= $data['roadtrip']->getId()?>/supprimer">Supprimer</a></button>
<h1><?= $data['seo']['title'] ?></h1>
<div class="row">
    <div class="col-12">
        <h2><?= $data['roadtrip']->getTitle() ?></h2>
        <p>Type de voiture : <?= $data['carTypeName'] ?></p>
        <p> Checkpoints : </p>
        <?php foreach ($data['checkpoints'] as $checkpoint) : ?>
            <?php var_dump($checkpoint) ?>
            <li><?= $checkpoint->getTitle() ?></li>
            <li><?= $checkpoint->getCoordinates() ?></li>
            <li><?= $checkpoint->getArrivalDate() ?></li>
            <li><?= $checkpoint->getDepartureDate() ?></li>
        <?php endforeach ?>
    </div>
</div>