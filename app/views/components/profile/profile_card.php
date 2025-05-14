<div class="page-title p-4 lg:px-30 rounded-b-2xl bg-blue-600 "> 
<div class="text-3xl text-center font-semibold text-white">User Profile</div>
</div>


<div class="p-4 lg:px-30 rounded-b-2xl shadow-lg mh-full">

    <div class="flex items-center gap-6 mb-6">
        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center text-2xl font-bold text-blue-600">
            <?= strtoupper(substr($user->name, 0, 1)) ?>
        </div>
        <div>
            <h2 class="text-2xl font-semibold text-gray-900">Name: <?= htmlspecialchars($user->name) ?></h2>
            <p class="text-sm text-gray-500">Email: <?= htmlspecialchars($user->email) ?></p>
        </div>
    </div>

    <hr class="mb-6">

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm">
        <div>
            <label class="text-gray-700 mb-1 font-bold">Role: </label>
            <span class="inline-block px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-medium">
                <?= htmlspecialchars(ucfirst($user->role)) ?>
            </span>
        </div>

        <div>
            <label class=" text-gray-700 mb-1 font-bold">Status: </label>
            <span class="inline-block px-3 py-1 rounded-full text-xs font-medium
                <?= $user->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                <?= htmlspecialchars(ucfirst($user->status)) ?>
            </span>
        </div>

        <div>
            <label class="text-gray-700 mb-1 font-bold">Joined On: </label>
            <span class="text-gray-700"><?= date("F j, Y", strtotime($user->created_at)) ?></span>
        </div>
    </div>

    <!-- <div class="mt-8 text-right">
        <a href="/edit-profile.php" class="text-sm font-medium text-blue-600 hover:underline">
            ✏️ Edit Profile
        </a>
    </div> -->
</div>