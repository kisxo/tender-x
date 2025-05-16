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

                <!-- Bids detail -->
        <?php require "components/bids/detail.php"; ?>
    </main>

    <!-- Footer Section -->
    <?php require_once "components/footer.php" ?>
</body>

</html>