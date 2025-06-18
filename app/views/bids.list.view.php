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

        <!-- Tender List -->
        <?php require "components/bids/bids_list.php"; ?>

    </main>

    <!-- Footer Section -->
    <?php require_once "components/footer.php" ?>
</body>

</html>