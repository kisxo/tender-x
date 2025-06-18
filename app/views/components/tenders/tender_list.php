<!-- show success message with design-->


<div class="container mx-auto px-4 py-6">
  <h1 class="text-3xl font-semibold text-gray-800 mb-6">Tender List</h1>

  <div class="bg-white shadow rounded-lg overflow-x-auto">
    <table class="min-w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-xs uppercase font-semibold text-gray-700">
        <tr>
          <th class="px-6 py-3">ID</th>
          <th class="px-6 py-3">Title</th>
          <th class="px-6 py-3">Budget</th>
          <th class="px-6 py-3">Deadline</th>
          <th class="px-6 py-3">Location</th>
          <th class="px-6 py-3">Status</th>
          <!-- <th class="px-6 py-3">Posted By</th> -->
          <th class="px-6 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 bg-white" >
        <?php if (!empty($tenders)): ?>
            <?php foreach ($tenders as $tender): ?>
                <tr>
                <td class="px-6 py-4"><?= $tender->id ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($tender->title) ?></td>
                <td class="px-6 py-4">₹<?= number_format($tender->budget, 2) ?></td>
                <td class="px-6 py-4"><?= $tender->deadline ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($tender->location) ?></td>
                <td class="px-6 py-4">
                    <span class="<?= $tender->status === 'open' ? 'text-green-600' : ($tender->status === 'closed' ? 'text-yellow-600' : 'text-blue-600') ?>">
                    <?= ucfirst($tender->status) ?>
                    </span>
                </td>
                <!-- <td class="px-6 py-4"><?= $tender->posted_by ?></td> -->
                <td class="px-6 py-4">
                    <a href="/tenders/edit/<?= $tender->id ?>" class="text-blue-600 hover:underline">Edit</a>
                    <a href="/tenders/delete/<?= $tender->id ?>" class="text-red-600 hover:underline ml-4">Delete</a>
                </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No tenders found.</td>
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
