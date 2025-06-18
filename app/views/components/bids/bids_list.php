
<div class="container mx-auto px-4 py-6">
  <h1 class="text-3xl font-semibold text-gray-800 mb-6">Tender List</h1>
  <div class="bg-white shadow rounded-lg overflow-x-auto">
    <table class="min-w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-xs uppercase font-semibold text-gray-700">
        <tr>
          <th class="px-6 py-3">ID</th>
          <th class="px-6 py-3">Tender Title</th>
          <th class="px-6 py-3">User</th>
          <th class="px-6 py-3">Amount</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3">Submitted At</th>
          <th class="px-6 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 bg-white">
        <?php if (!empty($bids)): ?>
            <?php foreach ($bids as $bid): ?>
            <tr>
            <td class="px-6 py-4"><?= $bid->id ?></td>
            <td class="px-6 py-4"><?= htmlspecialchars($bid->tender_title) ?></td>
            <td class="px-6 py-4"><?= htmlspecialchars($bid->user_name) ?> </td>
            <td class="px-6 py-4">₹<?= number_format($bid->bid_amount, 2) ?></td>
            <td class="px-6 py-4">
                <?php
                if (empty($bid->tender_winner_bid))
                {
                    echo '<span class="text-yellow-600">Pending</span>';
                } elseif ($bid->id == $bid->tender_winner_bid) {
                    echo '<span class="text-green-600">Winner</span>';
                } else {
                    echo '<span class="text-red-600">Lost</span>';
                }
                ?>
            </td>
            <td class="px-6 py-4"><?= date('Y-m-d H:i', strtotime($bid->submitted_at)) ?></td>
            <td class="px-6 py-4">
                <a href="/bids/<?= $bid->id ?>" class="text-blue-600 hover:underline">Detail</a>
            </td>
            </tr>
            <?php endforeach; ?>
         <?php else: ?>
            <tr>
            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No bids found.</td>
            </tr>
        <?php endif; ?>
      </tbody>
    </table>
    <div class="flex justify-center mt-6">
        <nav class="inline-flex shadow-sm rounded-md" aria-label="Pagination">
        <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 border border-gray-300 bg-white text-sm text-gray-700 hover:bg-gray-100 rounded-l-md">Previous</a>
        <?php else: ?>
        <span class="px-4 py-2 border border-gray-300 bg-gray-100 text-sm text-gray-400 rounded-l-md">Previous</span>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="px-4 py-2 border border-gray-300 text-sm <?= $i == $page ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' ?>">
            <?= $i ?>
        </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>" class="px-4 py-2 border border-gray-300 bg-white text-sm text-gray-700 hover:bg-gray-100 rounded-r-md">Next</a>
            <?php else: ?>
            <span class="px-4 py-2 border border-gray-300 bg-gray-100 text-sm text-gray-400 rounded-r-md">Next</span>
            <?php endif; ?>
        </nav>
    </div>
  </div>
</div>
