<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css" />
    <link rel="icon" href="img/logo-waw-travel.png" />
    <title>
        <?php if (isset($data['seo']['title']))
            echo $data['seo']['title'] . ' - '; ?>
        Waw Travel
    </title>
    <?php if (isset($data['seo']['description'])) { ?>
        <meta name="description" content="<?= $data['seo']['description'] ?>">
    <?php } ?>
</head>

<body>
    <?php include '_header.php'; ?>
    <div id="flash-container"></div>
    <main>
        <?php require $templatePath ?>
    </main>
    <?php include '_footer.php'; ?>

    <script>
        const flashContainer = document.getElementById('flash-container');
        const flashMessages = <?= json_encode($_SESSION['flash'] ?? []) ?>;
        flashMessages.forEach(flash => {
            const flashContainer = document.getElementById('flash-container');
            const flashItem = document.createElement('div');
            flashItem.classList.add('flash-item');
            flashItem.classList.add(flash.type);
            flashItem.innerText = flash.message;
            flashContainer.appendChild(flashItem);

            // Trigger fade-in
            setTimeout(() => {
                flashItem.style.opacity = 1;
            }, 10); // A short delay to ensure the item is in the DOM

            setTimeout(() => {
                flashItem.remove();
            }, 4000);
        });
    </script>

</body>

</html>
<!-- delete the flash message from the session -->
<?php unset($_SESSION['flash']); ?>