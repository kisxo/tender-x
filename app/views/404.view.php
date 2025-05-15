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

    <main class="py-10 px-5 md:px-30">

       <?php
            show("404 Not Found");
            show("Current URL: " . $_SERVER['REQUEST_URI']);
        ?>

    </main>

    <!-- Footer Section -->
    <?php require_once "components/footer.php" ?>
</body>

</html>