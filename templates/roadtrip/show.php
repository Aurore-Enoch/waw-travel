<button><a href="?path=/roadtrips/<?= $data['roadtrip']->getId()?>/supprimer">Supprimer</a></button>
<button><a href="?path=/roadtrips/<?= $data['roadtrip']->getId()?>/editer">Modifier</a></button>


<h1><?= $data['seo']['title'] ?></h1>
<div class="row">
    <div class="col-12">
        <h2><?= $data['security']->escape($data['roadtrip']->getTitle(), true) ?></h2>
        <p>Type de voiture : <?= $data['carTypeName'] ?></p>
        <p> Checkpoints : </p>
        <?php foreach ($data['checkpoints'] as $checkpoint) : ?>
            <li><?= $data['security']->escape($checkpoint->getTitle(), true) ?></li>
            <li><?= $data['security']->escape($checkpoint->getCoordinates()) ?></li>
            <li><?= $data['security']->escape($checkpoint->getArrivalDate()) ?></li>
            <li><?= $data['security']->escape($checkpoint->getDepartureDate()) ?></li>
            <?php endforeach ?>
    </div>
</div>