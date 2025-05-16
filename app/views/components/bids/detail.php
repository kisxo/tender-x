<div class="page-title p-4 lg:px-30 rounded-b-2xl bg-blue-600 flex items-center">
    <!-- <a href="#" onclick="history.go(-1)"> -->
    <a href="/">
        <svg class="h-5 w-5 text-white" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><line x1="216" y1="128" x2="40" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><polyline points="112 56 40 128 112 200" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/></svg>
    </a>
    <div class="text-3xl text-center font-semibold text-white mx-auto">Tender Detail</div>
</div>

<div class="border border-gray-200 rounded-md shadow mx-3 p-4 mx-2 md:mx-auto my-10  max-w-4xl text-sm">

    <?php foreach ($tender as $field => $val):?>

        <?php if (in_array($field, $exclude)) continue; ?>
        <div class="flex py-2">
            <span class="font-semibold pe-3">
                <?= formatLabel($field); ?>:
            </span>
            <span class="text-gray-700">
                <?= $val ?>
            </span>
        </div>
    <?php endforeach; ?>

    <?php if ($is_creator): ?>
        <a href="/edit" class="block mt-10">
            <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm w-full py-2.5 text-center ">Edit Tender</button>
        </a>
    <?php endif; ?>

    <a href="/bids/create/<?= $tender->id ?>" class="block mt-10">
        <?php if ($deadline_over || $tender->status != "open"): ?>
            <button disabled type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm w-full py-2.5 text-center ">Bidding Closed</button>
        <?php else: ?>
            <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm w-full py-2.5 text-center ">Place a bid</button>
        <?php endif; ?>
   </a>

</div>

<?php if ($is_creator): ?>
<div class="p-4 lg:px-30">
    
</div>
<?php endif; ?>