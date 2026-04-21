<!DOCTYPE html>
<html lang="en">
<body class="text-white">
<div class="flex h-screen">
<!-- Sidebar -->
<aside class="w-64 bg-gray-900 text-white">
<div class="p-4 border-b border-gray-800">
<div class="flex items-center justify-between">
<img src="https://tailwindflex.com/images/logo.svg" alt="Logo" class="h-8 w-auto">
<span class="text-xl font-bold">Customer Dashboard</span>
</div>
</div>

<nav class="mt-5 px-2">
<!-- Main Navigation -->
<div class="space-y-4">
<!-- Dashboard -->
<a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg bg-gray-800 text-white group transition-all duration-200 hover:bg-gray-700">
<svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
</svg>
Dashboard
</a>

<!-- Analytics Dropdown -->
<div class="space-y-1">
<button class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none" aria-expanded="false" aria-controls="analytics-dropdown">
<div class="flex items-center">
<svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
</svg>
Account / Order History
</div>
<svg class="ml-2 h-5 w-5 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
</svg>
</button>
<div class="space-y-1 pl-11 hidden" id="analytics-dropdown">
<a href="#account" class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
View account details
</a>
<button id="viewOrdersBtn" class="w-full text-left group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
View Previous Orders
</button>
</div>
</div>
</div>
</nav>
</aside>

<!-- Main Content -->
<main class="flex-1 p-6 overflow-auto">
<div class="mb-8">
<h1 class="text-3xl font-semibold text-white mb-2">Welcome, <?php echo htmlspecialchars($customerName); ?></h1>
<p class="text-gray-400">Manage your account and view your order history</p>
</div>

<!-- Orders Section (Hidden by default) -->
<section id="ordersSection" class="bg-gray-800 rounded-lg p-6 hidden">
<h2 class="text-2xl font-semibold text-white mb-4">
<?php echo $isAdmin ? 'All Orders' : 'Your Orders'; ?>
</h2>

<?php if (empty($recentOrders)): ?>
<div class="text-center py-8">
<p class="text-gray-400 text-lg">No orders found.</p>
</div>
<?php else: ?>
<div class="overflow-x-auto">
<table class="w-full text-left text-gray-300">
<thead class="bg-gray-700 border-b border-gray-600">
<tr>
<th class="px-6 py-3 font-semibold">Order ID</th>
<?php if ($isAdmin): ?>
<th class="px-6 py-3 font-semibold">Customer Name</th>
<?php endif; ?>
<th class="px-6 py-3 font-semibold">Date</th>
<th class="px-6 py-3 font-semibold">Status</th>
<th class="px-6 py-3 font-semibold">Total Amount</th>
</tr>
</thead>
<tbody>
<?php foreach ($recentOrders as $order): ?>
<tr class="border-b border-gray-700 hover:bg-gray-750 transition">
<td class="px-6 py-4">#<?php echo htmlspecialchars($order['OrderID']); ?></td>
<?php if ($isAdmin): ?>
<td class="px-6 py-4"><?php echo htmlspecialchars($order['FirstName']) . ' ' . htmlspecialchars($order['LastName']); ?></td>
<?php endif; ?>
<td class="px-6 py-4"><?php echo date('M d, Y H:i', strtotime($order['OrderDateTime'])); ?></td>
<td class="px-6 py-4">
<span class="px-3 py-1 rounded-full text-sm font-medium
<?php
$status = strtolower($order['status']);
if ($status === 'completed') echo 'bg-green-900 text-green-200';
elseif ($status === 'pending') echo 'bg-yellow-900 text-yellow-200';
elseif ($status === 'cancelled') echo 'bg-red-900 text-red-200';
else echo 'bg-blue-900 text-blue-200';
?>
">
<?php echo htmlspecialchars(ucfirst($order['status'])); ?>
</span>
</td>
<td class="px-6 py-4 font-semibold">$<?php echo number_format($order['TotalAmount'], 2); ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php endif; ?>
</section>
</main>
</div>

<script>
// Dropdown functionality
document.querySelectorAll('button[aria-controls]').forEach(button => {
button.addEventListener('click', () => {
const isExpanded = button.getAttribute('aria-expanded') === 'true';
const dropdownContent = document.getElementById(button.getAttribute('aria-controls'));

button.setAttribute('aria-expanded', !isExpanded);
dropdownContent.classList.toggle('hidden');
button.querySelector('svg:last-child').classList.toggle('rotate-180');
});
});

// View Orders button functionality
document.getElementById('viewOrdersBtn').addEventListener('click', () => {
const ordersSection = document.getElementById('ordersSection');
ordersSection.classList.toggle('hidden');
});
</script>
</body>
</html>