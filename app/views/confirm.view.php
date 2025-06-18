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

        <!-- Category Selector -->
        <!-- <?php require "components/tenders/category_selector.php"; ?> -->

        <!-- Tender List -->
        <div class="max-w-xl mx-auto mt-20 bg-white p-8 rounded-lg shadow text-center">
            <h2 class="text-2xl font-bold text-red-600 mb-4"><?= $card["title"] ?></h2>

            <p class="text-gray-700 text-lg mb-6">
                <?= $card["message"] ?>
                <br>
                <strong class="text-gray-900"><?= htmlspecialchars($card["info"]) ?></strong>
            </p>

            <div class="flex justify-center gap-4">
             <!-- Confirm Delete -->
            <form action="<?= $card["action-link"] ?>" method="<?= $card["method"] ?>">
                <button type="submit"
                    class='<?= $card["action-class"] === "delete" ? "bg-red-700 hover:bg-red-700" : "bg-green-500 hover:bg-green-600" ?> text-white px-6 py-2 rounded transition'>
                    <?= $card["action"] ?>
                </button>
            </form>

            <!-- Cancel -->
            <button onclick="history.back()" 
                class="px-6 py-2 border border-gray-400 text-gray-700 rounded hover:bg-gray-100 transition">
                Cancel
            </button>
        </div>
</div>


    </main>

    <!-- Footer Section -->
    <?php require_once "components/footer.php" ?>
</body>

</html>