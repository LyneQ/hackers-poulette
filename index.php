<?php require_once 'include/header.php'; ?>

<?php
    require_once './Config/config.php';
    require_once './Controller/SupportTicketController.php';

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

<?php require_once 'include/footer.php'; ?>
