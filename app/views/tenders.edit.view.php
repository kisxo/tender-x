<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Tenderx";
    require "components/head.php";
    ?>
</head>

<body>
    <!-- Navbar -->
    <?php require "components/navbar.php"; ?>

    <main>

        <!-- Tender creation form -->
        <?php require "components/tenders/edit_form.php"; ?>


    </main>
    <!-- Footer Section -->
    <?php require_once "components/footer.php" ?>
</body>

</html>