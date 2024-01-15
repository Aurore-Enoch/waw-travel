<h1><?= $data['seo']['title'] ?></h1>
<div class="row">
    <div class="col-12">
        <h2><?= $data['roadtrip']->getTitle() ?></h2>
        <p>Type de voiture : <?= $data['carTypeName'] ?></p>
        <p> Checkpoints : </p>
        <?php foreach ($data['checkpoints'] as $checkpoint) : ?>
            <li><?= $checkpoint->getTitle() ?></li>
        <?php endforeach ?>
    </div>
</div>