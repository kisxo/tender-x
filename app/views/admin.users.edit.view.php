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
        <!-- Admin Dashbaord -->
        <?php require "components/admin/users/users_edit.php"; ?>
    </main>
</body>

</html>