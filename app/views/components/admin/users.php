<div class="page-title p-4 lg:px-30 rounded-b-2xl bg-blue-600 "> 
<div class="text-3xl text-center font-semibold text-white">Admin Users</div>
</div>

 <div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">User List</h1>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
      <table class="min-w-full text-sm text-left text-gray-600">
        <thead class="bg-gray-100 text-xs uppercase font-semibold text-gray-700">
          <tr>
            <th class="px-6 py-3">ID</th>
            <th class="px-6 py-3">Name</th>
            <th class="px-6 py-3">Email</th>
            <th class="px-6 py-3">Role</th>
            <th class="px-6 py-3">Status</th>
            <th class="px-6 py-3">Created At</th>
            <th class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
          <?php
           foreach ($users as $user):
          ?>
          <tr>
            <td class="px-6 py-4"><?= $user->id ?></td>
            <td class="px-6 py-4"><?= $user->name ?></td>
            <td class="px-6 py-4"><?= $user->email ?></td>
            <td class="px-6 py-4"><?= $user->role ?></td>
            <td class="px-6 py-4 <?= $user->status === 'active' ? 'text-green-500' : 'text-red-500' ?>"><?= $user->status ?></td>
            <td class="px-6 py-4"><?= date('Y-m-d', strtotime($user->created_at)) ?></td>
            <td class="px-6 py-4">
              <a href="/admin/users/edit/<?= $user->id ?>" class="text-blue-600 hover:underline">Edit</a>
              <a href="/admin/users/delete/<?= $user->id ?>" class="text-red-600 hover:underline ml-4">Delete</a>
            </td>
          </tr>

          <?php endforeach; ?>
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