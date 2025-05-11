<?php
// Get current URL without category parameter
$parsed_url = parse_url($_SERVER['REQUEST_URI']);
parse_str($_SERVER['QUERY_STRING'] ?? '', $query_params);
unset($query_params['category']); // remove old category if exists

$current_path = $parsed_url['path'];
$base_query = http_build_query($query_params);

// Define categories
array_unshift($categories, ['name' => 'All Category', 'id' => '']);

// Get current category from query string
$current_category = $_GET['category'] ?? '';
?>

<div class="p-4 lg:px-30">
    <div class="mb-4">
        <span class="text-md font-semibold">Browse by Category</span>
    </div>

    <div class="category-tab flex gap-4 overflow-scroll mb-4">
        <?php foreach ($categories as $category): 
            $isActive = strtolower($current_category) === strtolower($category['id']);
            ?>
            <a href="/tenders?category=<?= urlencode($category['id']) ?>"
               class="block py-2 px-4 rounded-2xl text-sm flex text-nowrap font-normal
                      <?= $isActive ? 'bg-blue-500 text-white' : 'bg-slate-100 text-gray-600' ?>">
                <?= $category['name'] ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

