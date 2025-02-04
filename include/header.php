<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./View/assets/css/main.css">
    <title>Hackers Poulette</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<header>
    <?php
        require_once './utils/Page.php';
        require_once './utils/Route.php';
    ?>
    <nav>
        <ul>
            <?php foreach (Page::cases() as $page) : ?>
                <li><a href=<?php echo $_PAGE.$page->value ?>><?php echo $page->value ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
