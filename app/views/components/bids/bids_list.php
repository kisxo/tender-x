<?php if (!empty($bids)):?>
    <div class=" text-lg font-bold p-5 lg:px-30">
            Bid History
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4 sm:px-10 lg:px-30">

        <?php foreach ($bids as $bid): ?>
            <div class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-800 leading-snug line-clamp-2 mb-4">
                        <?= htmlspecialchars($bid->title) ?>
                    </h2>

                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <svg class="h-4 w-4 mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 256 256"><circle cx="128" cy="128" r="40" stroke="currentColor" stroke-width="24"/></svg>
                        <?= htmlspecialchars($bid->bid_amount) ?>
                    </div>

                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <!-- <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 256 256"><circle cx="128" cy="104" r="32" stroke="currentColor" stroke-width="24"/><path d="M208,104c0,72-80,128-80,128S48,176,48,104a80,80,0,0,1,160,0Z" stroke="currentColor" stroke-width="24"/></svg> -->
                        <?php if ($bid->status === "open"): ?>
                            <svg class="h-4 w-4 mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><path d="M128,128,67.2,82.4A8,8,0,0,1,64,76V40a8,8,0,0,1,8-8H184a8,8,0,0,1,8,8V75.64A8,8,0,0,1,188.82,82L128,128h0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><path d="M128,128,67.2,173.6A8,8,0,0,0,64,180v36a8,8,0,0,0,8,8H184a8,8,0,0,0,8-8V180.36a8,8,0,0,0-3.18-6.38L128,128h0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="128" y1="168" x2="128" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="74.67" y1="88" x2="180.92" y2="88" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                            Pending
                        <?php elseif ($bid->winner_bid === $bid->bid_id): ?>
                            <svg class="h-4 w-4 mr-2 text-green-500"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline points="88 136 112 160 168 104" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><circle cx="128" cy="128" r="96" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                            Won
                        <?php else: ?>
                            <svg class="h-4 w-4 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><line x1="160" y1="96" x2="96" y2="160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="96" y1="96" x2="160" y2="160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><circle cx="128" cy="128" r="96" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                            Closed
                        <?php endif; ?>
                    </div>

                    <div class="flex items-center text-sm text-gray-500 mb-5">
                        <svg class="h-4 w-4 mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 256 256"><circle cx="128" cy="128" r="96" stroke="currentColor" stroke-width="24"/><polyline points="128 72 128 128 184 128" stroke="currentColor" stroke-width="24"/></svg>
                        Sumitted at: <?= date("F j, Y", strtotime($bid->created_at)) ?>
                    </div>

                    <a href="/bids/<?= urlencode($bid->bid_id) ?>"
                    class="inline-block w-full text-center text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md transition duration-200">
                        View Details
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>  
    <div class=" text-lg font-bold p-5 lg:px-30">
        Bid History Empty
    </div>
    <div class="font-bold p-5 lg:px-30">
        <a href="/tenders" class="inline-block w-full text-center text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md transition duration-200">
            Browse Tenders
        </a>
    </div>
<?php endif; ?>
