<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="icon" href="img/logo-waw-travel.png"/>
    <title>
		<?php if (isset($data['seo']['title'])) echo $data['seo']['title'] . ' - '; ?>
		Waw Travel
	</title>
    <?php if (isset($data['seo']['description'])) { ?>
		<meta name="description" content="<?= $data['seo']['description'] ?>">
	<?php } ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FEF3ED]">
    <?php include '_header.php'; ?>
    <main>
        <?php require $templatePath ?>
    </main>
    <?php include '_footer.php'; ?>
</body>
</html>