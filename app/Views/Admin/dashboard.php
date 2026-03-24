<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-sm text-gray-500 mb-2">Total Customers</h2>
            <p class="text-2xl font-bold"><?= $totalCustomers ?></p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-sm text-gray-500 mb-2">Total Orders</h2>
            <p class="text-2xl font-bold"><?= $totalOrders ?></p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-sm text-gray-500 mb-2">Total Revenue</h2>
            <p class="text-2xl font-bold">£<?= number_format($totalRevenue, 2) ?></p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-sm text-gray-500 mb-2">Top Staff Member</h2>
            <p class="text-xl font-bold"><?= htmlspecialchars($topStaffName) ?></p>
            <p class="text-sm text-gray-600"><?= $topStaffOrders ?> orders</p>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>
        <?php if (!empty($recentOrders)): ?>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-3">Order ID</th>
                            <th class="text-left p-3">Customer</th>
                            <th class="text-left p-3">Taken By</th>
                            <th class="text-left p-3">Date</th>
                            <th class="text-left p-3">Payment</th>
                            <th class="text-left p-3">Status</th>
                            <th class="text-left p-3">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentOrders as $order): ?>
                            <tr class="border-b">
                                <td class="p-3"><?= htmlspecialchars($order['order_id']) ?></td>
                                <td class="p-3">
                                    <?= htmlspecialchars($order['customer_first_name'] . ' ' . $order['customer_last_name']) ?>
                                </td>
                                <td class="p-3">
                                    <?= htmlspecialchars($order['staff_first_name'] . ' ' . $order['staff_last_name']) ?>
                                </td>
                                <td class="p-3"><?= htmlspecialchars($order['ordered_at']) ?></td>
                                <td class="p-3"><?= htmlspecialchars(ucfirst($order['payment_method'])) ?></td>
                                <td class="p-3"><?= htmlspecialchars(ucfirst($order['status'])) ?></td>
                                <td class="p-3">£<?= number_format((float) $order['total_gbp'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No recent orders found.</p>
        <?php endif; ?>
    </div>
</div>