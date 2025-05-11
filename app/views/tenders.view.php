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

    <!-- Category Selector -->
    <?php require "components/tenders/category_selector.php"; ?>

    <!-- Tender List -->
    <?php require "components/tenders/tender_list.php"; ?>

    <!-- Footer Section -->
    <?php require_once "components/footer.php" ?>
</body>

</html>