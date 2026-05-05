<div class="min-h-screen bg-slate-100 text-slate-900">
    <div class="flex min-h-screen">
        <aside class="w-72 bg-slate-950 text-white shadow-lg">
            <div class="border-b border-slate-800 px-6 py-5">
                <h1 class="text-xl font-semibold">Admin Dashboard</h1>
                <p class="text-sm text-slate-400 mt-1">Manage orders and stock</p>
            </div>

            <nav class="px-4 py-5 space-y-2">
                <button id="tabOrders" class="w-full text-left rounded-xl px-4 py-3 bg-slate-800 text-white font-medium shadow-sm hover:bg-slate-700 transition">Orders</button>
                <button id="tabStock" class="w-full text-left rounded-xl px-4 py-3 bg-slate-900 text-slate-300 hover:bg-slate-800 hover:text-white transition">Stock</button>
            </nav>

            <div class="px-6 py-5 border-t border-slate-800 text-sm text-slate-400">
                <p class="font-semibold text-slate-300">Quick actions</p>
                <ul class="mt-3 space-y-2">
                    <li><span class="block rounded-md bg-slate-900 px-3 py-2">View orders</span></li>
                    <li><span class="block rounded-md bg-slate-900 px-3 py-2">Restock inventory</span></li>
                </ul>
            </div>
        </aside>

        <main class="flex-1 p-6">
            <div class="grid gap-4 lg:grid-cols-4 mb-6">
                <div class="rounded-2xl bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">Total Customers</p>
                    <p class="mt-3 text-3xl font-semibold"><?= $totalCustomers ?></p>
                </div>
                <div class="rounded-2xl bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">Total Orders</p>
                    <p class="mt-3 text-3xl font-semibold"><?= $totalOrders ?></p>
                </div>
                <div class="rounded-2xl bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">Total Revenue</p>
                    <p class="mt-3 text-3xl font-semibold">£<?= number_format($totalRevenue, 2) ?></p>
                </div>
                <div class="rounded-2xl bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">Top Staff</p>
                    <p class="mt-3 text-2xl font-semibold"><?= htmlspecialchars($topStaffName) ?></p>
                    <p class="text-slate-500"><?= $topStaffOrders ?> orders</p>
                </div>
            </div>

            <?php if (!empty($restockMessage)): ?>
                <div class="mb-6 rounded-2xl border border-emerald-300 bg-emerald-50 px-5 py-4 text-sm text-emerald-800">
                    <?= htmlspecialchars($restockMessage) ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($restockError)): ?>
                <div class="mb-6 rounded-2xl border border-rose-300 bg-rose-50 px-5 py-4 text-sm text-rose-800">
                    <?= htmlspecialchars($restockError) ?>
                </div>
            <?php endif; ?>

            <section id="ordersPanel">
                <div class="rounded-3xl bg-white p-6 shadow-sm mb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-semibold">Recent Orders</h2>
                            <p class="mt-1 text-sm text-slate-500">Review all recent customer orders.</p>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700">Orders</span>
                    </div>
                </div>

                <div class="rounded-3xl bg-white p-6 shadow-sm">
                    <?php if (!empty($recentOrders)): ?>
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[720px] divide-y divide-slate-200 text-left text-sm text-slate-700">
                                <thead class="bg-slate-50 text-slate-900">
                                    <tr>
                                        <th class="px-4 py-3">Order ID</th>
                                        <th class="px-4 py-3">Customer</th>
                                        <th class="px-4 py-3">Items</th>
                                        <th class="px-4 py-3">Payment</th>
                                        <th class="px-4 py-3">Taken By</th>
                                        <th class="px-4 py-3">Role</th>
                                        <th class="px-4 py-3">Date</th>
                                        <th class="px-4 py-3">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200">
                                    <?php foreach ($recentOrders as $order): ?>
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-4"><?= htmlspecialchars($order['order_id']) ?></td>
                                            <td class="px-4 py-4"><?= htmlspecialchars($order['customer_name']) ?></td>
                                            <td class="px-4 py-4"><?= htmlspecialchars($order['items']) ?></td>
                                            <td class="px-4 py-4"><?= htmlspecialchars($order['payment_type']) ?></td>
                                            <td class="px-4 py-4"><?= htmlspecialchars($order['staff_name']) ?></td>
                                            <td class="px-4 py-4"><?= htmlspecialchars($order['staff_role'] ?? '—') ?></td>
                                            <td class="px-4 py-4"><?= htmlspecialchars($order['order_timestamp']) ?></td>
                                            <td class="px-4 py-4">£<?= number_format((float) $order['total_amount'], 2) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-slate-500">No recent orders available.</p>
                    <?php endif; ?>
                </div>
            </section>

            <section id="stockPanel" class="hidden">
                <div class="rounded-3xl bg-white p-6 shadow-sm mb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-semibold">Stock Management</h2>
                            <p class="mt-1 text-sm text-slate-500">Review inventory levels and restock products.</p>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700">Stock</span>
                    </div>
                </div>

                <div class="grid gap-6 xl:grid-cols-[2fr_1fr]">
                    <div class="rounded-3xl bg-white p-6 shadow-sm">
                        <?php if (!empty($stockItems)): ?>
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[640px] divide-y divide-slate-200 text-left text-sm text-slate-700">
                                    <thead class="bg-slate-50 text-slate-900">
                                        <tr>
                                            <th class="px-4 py-3">Product</th>
                                            <th class="px-4 py-3">Price</th>
                                            <th class="px-4 py-3">Stock</th>
                                            <th class="px-4 py-3">Last Restocked</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200">
                                        <?php foreach ($stockItems as $stock): ?>
                                            <tr class="hover:bg-slate-50">
                                                <td class="px-4 py-4"><?= htmlspecialchars($stock['product_name']) ?></td>
                                                <td class="px-4 py-4">£<?= number_format((float) $stock['product_price'], 2) ?></td>
                                                <td class="px-4 py-4"><?= htmlspecialchars((int)$stock['stock_quantity']) ?></td>
                                                <td class="px-4 py-4"><?= htmlspecialchars($stock['last_restock_date'] ?? 'N/A') ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-slate-500">No stock records found.</p>
                        <?php endif; ?>
                    </div>

                    <div class="rounded-3xl bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-semibold mb-4">Adjust Stock</h3>
                        <form method="POST" class="space-y-4">
                            <input type="hidden" name="restock_action" id="restock_action" value="add">

                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="restock_product_id">Product</label>
                                <select id="restock_product_id" name="restock_product_id" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-slate-500 focus:outline-none">
                                    <option value="">Select product</option>
                                    <?php foreach ($stockItems as $stock): ?>
                                        <option value="<?= (int)$stock['product_id'] ?>"><?= htmlspecialchars($stock['product_name']) ?> (current: <?= (int)$stock['stock_quantity'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="restock_action_selector">Action</label>
                                <select id="restock_action_selector" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-slate-500 focus:outline-none">
                                    <option value="add" <?= empty($restockAction) || $restockAction === 'add' ? 'selected' : '' ?>>Add stock</option>
                                    <option value="remove" <?= isset($restockAction) && $restockAction === 'remove' ? 'selected' : '' ?>>Remove stock</option>
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="restock_quantity">Quantity</label>
                                <input id="restock_quantity" name="restock_quantity" type="number" min="1" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-slate-500 focus:outline-none" placeholder="Enter quantity">
                            </div>

                            <button type="submit" class="w-full rounded-2xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800 transition">Update Stock</button>
                        </form>
                        <script>
                            document.getElementById('restock_action_selector').addEventListener('change', function () {
                                document.getElementById('restock_action').value = this.value;
                            });
                        </script>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<script>
    const ordersTab = document.getElementById('tabOrders');
    const stockTab = document.getElementById('tabStock');
    const ordersPanel = document.getElementById('ordersPanel');
    const stockPanel = document.getElementById('stockPanel');

    const activateOrders = () => {
        ordersPanel.classList.remove('hidden');
        stockPanel.classList.add('hidden');
        ordersTab.classList.add('bg-slate-800', 'text-white');
        ordersTab.classList.remove('bg-slate-900', 'text-slate-300');
        stockTab.classList.add('bg-slate-900', 'text-slate-300');
        stockTab.classList.remove('bg-slate-800', 'text-white');
    };

    const activateStock = () => {
        stockPanel.classList.remove('hidden');
        ordersPanel.classList.add('hidden');
        stockTab.classList.add('bg-slate-800', 'text-white');
        stockTab.classList.remove('bg-slate-900', 'text-slate-300');
        ordersTab.classList.add('bg-slate-900', 'text-slate-300');
        ordersTab.classList.remove('bg-slate-800', 'text-white');
    };

    ordersTab.addEventListener('click', activateOrders);
    stockTab.addEventListener('click', activateStock);
</script>