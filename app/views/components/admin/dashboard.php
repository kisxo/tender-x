<div class="page-title p-4 lg:px-30 rounded-b-2xl bg-blue-600 "> 
<div class="text-3xl text-center font-semibold text-white">Admin Dashboard</div>
</div>

<div class="flex-1 flex flex-col text-center">

    <!-- Dashboard Cards -->
    <main class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-gray-600">Total Users</p>
        <h2 class="text-2xl font-bold text-blue-600"><?= $users->total_users ?></h2>
    </div>
    
    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-gray-600">Total Tenders</p>
        <h2 class="text-2xl font-bold text-green-600"><?= $tenders->total_tenders ?></h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-gray-600">Bids Placed</p>
        <h2 class="text-2xl font-bold text-purple-600"><?= $bids->total_bids ?></h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-gray-600">Open Tenders</p>
        <h2 class="text-2xl font-bold text-yellow-600"><?= $openTenders->total_open_tenders ?></h2>
    </div>

    </main>

</div>