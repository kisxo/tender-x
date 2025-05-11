<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4 sm:px-10 lg:px-30">
    <?php foreach ($tenders as $tender): ?>
        <div class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-800 leading-snug line-clamp-2 mb-4">
                    <?= htmlspecialchars($tender['title']) ?>
                </h2>

                <div class="flex items-center text-sm text-gray-500 mb-2">
                    <svg class="h-4 w-4 mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 256 256"><circle cx="128" cy="128" r="40" stroke="currentColor" stroke-width="24"/></svg>
                    <?= htmlspecialchars($tender['category']) ?>
                </div>

                <div class="flex items-center text-sm text-gray-500 mb-2">
                    <svg class="h-4 w-4 mr-2 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 256 256"><circle cx="128" cy="104" r="32" stroke="currentColor" stroke-width="24"/><path d="M208,104c0,72-80,128-80,128S48,176,48,104a80,80,0,0,1,160,0Z" stroke="currentColor" stroke-width="24"/></svg>
                    <?= htmlspecialchars($tender['location']) ?>
                </div>

                <div class="flex items-center text-sm text-gray-500 mb-5">
                    <svg class="h-4 w-4 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 256 256"><circle cx="128" cy="128" r="96" stroke="currentColor" stroke-width="24"/><polyline points="128 72 128 128 184 128" stroke="currentColor" stroke-width="24"/></svg>
                    Deadline: <?= date("F j, Y", strtotime($tender['deadline'])) ?>
                </div>

                <a href="/tenders/<?= urlencode($tender['id']) ?>"
                   class="inline-block w-full text-center text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md transition duration-200">
                    View Details
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

