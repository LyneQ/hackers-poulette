<?php require 'include/header.php'; ?>

<?php
    use Controller\DatabaseController;
    // import all necessary elements
    require 'Controller/DatabaseController.php';
    require_once 'Route.php';

    // setup usefull variable
    $db = new DatabaseController();
    $page = $_GET['page'] ?? Page::Home->value;
?>

<main>
    <?php
        require match ($page) {
            Page::Home->value => Route::Home->value,
            default => Route::NotFound->value,
        };
    ?>
</main>

<?php require 'include/footer.php'; ?>
