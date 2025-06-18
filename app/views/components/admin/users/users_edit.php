<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-lg shadow">
  <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Edit User</h2>

  <form action="/admin/users_edit/<?= $user->id ?>" method="POST" class="space-y-6">
    <!-- Name -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="name">Name</label>
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($user->name) ?>" 
             class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>

    <!-- Email -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
      <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->email) ?>" 
             class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>

    <!-- Role -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="role">Role</label>
      <select id="role" name="role" 
              class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="user" <?= $user->role === 'user' ? 'selected' : '' ?>>User</option>
        <option value="admin" <?= $user->role === 'admin' ? 'selected' : '' ?>>Admin</option>
      </select>
    </div>

    <!-- Status -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="status">Status</label>
      <select id="status" name="status" 
              class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="active" <?= $user->status === 'active' ? 'selected' : '' ?>>Active</option>
        <option value="inactive" <?= $user->status === 'inactive' ? 'selected' : '' ?>>Inactive</option>
      </select>
    </div>

    <!-- Password -->
    <div>
      <label class="block text-gray-700 font-medium mb-2" for="password">New Password</label>
      <input type="password" id="password" name="password" placeholder="Leave blank to keep existing"
             class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Submit -->
    <div class="text-center">
      <button type="submit" 
              class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
        Update User
      </button>
    </div>
  </form>
</div>
