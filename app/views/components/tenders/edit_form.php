<div class="max-w-4xl mx-auto m-10 bg-white p-8 rounded-lg shadow">
  <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Edit Tender</h2>

  <form action="/tenders/edit/<?= $tender->id ?>" method="POST" class="space-y-6">

    <!-- Title -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="title">Title</label>
      <input type="text" id="title" name="title" value="<?= htmlspecialchars($tender->title) ?>" 
             class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500" required>
    </div>

    <!-- Description -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="description">Description</label>
      <textarea id="description" name="description" rows="4"
                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500"
                required><?= htmlspecialchars($tender->description) ?></textarea>
    </div>

    <!-- Budget -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="budget">Budget (₹)</label>
      <input type="number" id="budget" name="budget" step="0.01" value="<?= $tender->budget ?>"
             class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500" required>
    </div>

    <!-- Deadline -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="deadline">Deadline</label>
      <input type="date" id="deadline" name="deadline" value="<?= $tender->deadline ?>"
             class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500" required>
    </div>

    <!-- Location -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="location">Location</label>
      <input type="text" id="location" name="location" value="<?= htmlspecialchars($tender->location) ?>"
             class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500" required>
    </div>

    <!-- Category -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="category_id">Category</label>
      <select id="category_id" name="category_id"
              class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500" required>
        <?php foreach ($categories as $category): ?>
          <option value="<?= $category->id ?>"<?= $tender->category_id == $category->id ? ' selected' : '' ?>>
            <?= htmlspecialchars($category->name) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Status -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="status">Status</label>
      <select id="status" name="status"
              class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500">
        <option value="open" <?= $tender->status === 'open' ? 'selected' : '' ?>>Open</option>
        <option value="closed" <?= $tender->status === 'closed' ? 'selected' : '' ?>>Closed</option>
      </select>
    </div>

    <!-- Submit -->
    <div class="text-center">
      <button type="submit"
              class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
        Update Tender
      </button>
    </div>

  </form>
</div>
