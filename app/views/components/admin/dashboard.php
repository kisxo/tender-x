<div class="page-title p-4 lg:px-30 rounded-b-2xl bg-blue-600 "> 
<div class="text-3xl text-center font-semibold text-white">Admin Dashboard</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="max-w-4xl mx-auto mt-6 p-6 bg-white rounded shadow">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Platform Analytics</h2>
  <canvas id="adminChart" class="w-full max-w-full h-80"></canvas>
</div>

<script>
  const ctx = document.getElementById('adminChart').getContext('2d');
  const adminChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Users', 'Tenders', 'Open Tenders', 'Bids'],
      datasets: [{
        label: 'Total Count',
        data: [
          <?= $data["stats"]["users"] ?>,
          <?= $data["stats"]["tenders"] ?>,
          <?= $data["stats"]["open_tenders"]?>,
          <?= $data["stats"]["bids"] ?>,
        ],
        backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444'],
        borderRadius: 8
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        title: {
          display: true,
          text: 'Overall System Stats'
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            precision: 0
          }
        }
      }
    }
  });
</script>


<div class="flex-1 flex flex-col text-center">

    <!-- Dashboard Cards -->
    <main class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <a href="/admin/users" class="bg-white p-4 rounded-xl shadow">
        <p class="text-gray-600">Total Users</p>
        <h2 class="text-2xl font-bold text-blue-600"><?= $data["stats"]["users"] ?></h2>
    </a>

    <a href="/tenders/list" class="bg-white p-4 rounded-xl shadow">
        <p class="text-gray-600">Total Tenders</p>
        <h2 class="text-2xl font-bold text-green-600"><?= $data["stats"]["tenders"] ?></h2>
    </a>

    <a href="/bids/list" class="bg-white p-4 rounded-xl shadow">
        <p class="text-gray-600">Bids Placed</p>
        <h2 class="text-2xl font-bold text-purple-600"><?= $data["stats"]["bids"] ?></h2>
    </a>

    <a class="bg-white p-4 rounded-xl shadow">
        <p class="text-gray-600">Open Tenders</p>
        <h2 class="text-2xl font-bold text-yellow-600"><?= $data["stats"]["open_tenders"] ?></h2>
    </a>

    </main>

</div>