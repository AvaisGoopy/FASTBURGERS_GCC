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
<button id="viewAccountBtn" class="w-full text-left group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
View account details
</button>
<button id="viewOrdersBtn" class="w-full text-left group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
View Previous Orders
</button>
</div>
</div>

<!-- Place Order Dropdown -->
<div class="space-y-1">
<button class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none" aria-expanded="false" aria-controls="place-order-dropdown">
<div class="flex items-center">
<svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
</svg>
Place Order
</div>
<svg class="ml-2 h-5 w-5 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
</svg>
</button>
<div class="space-y-1 pl-11 hidden" id="place-order-dropdown">
<button id="placeOrderBtn" class="w-full text-left group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
New Order
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

<section id="accountSection" class="bg-gray-800 rounded-lg p-6 mb-6 hidden">
<h2 class="text-2xl font-semibold text-white mb-4">Account Details</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="bg-gray-700 rounded-lg p-4">
<p class="text-gray-300 text-sm font-semibold mb-2">Name</p>
<p class="text-white"><?php echo htmlspecialchars($customerName); ?></p>
</div>
<div class="bg-gray-700 rounded-lg p-4">
<p class="text-gray-300 text-sm font-semibold mb-2">Email</p>
<p class="text-white"><?php echo htmlspecialchars($customerEmail ?: 'Not available'); ?></p>
</div>
</div>
</section>

<!-- Orders Section -->
<section id="ordersSection" class="bg-gray-800 rounded-lg p-6">
<h2 class="text-2xl font-semibold text-white mb-4">
<?php echo $isAdmin ? 'All Orders' : 'Your Orders'; ?>
</h2>

<?php if (empty($recentOrders)): ?>
<div class="text-center py-8">
<p class="text-gray-400 text-lg">No orders found.</p>
</div>
<?php else: ?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
<?php foreach ($recentOrders as $order): ?>
<div class="bg-gray-700 rounded-lg p-4 hover:bg-gray-600 transition">
<h3 class="text-lg font-semibold text-white mb-2">Order #<?php echo htmlspecialchars($order['order_id']); ?></h3>
<p class="text-gray-300 mb-2">Date: <?php echo date('M d, Y H:i', strtotime($order['order_timestamp'])); ?></p>
<p class="text-gray-300 mb-2">Location: <?php echo htmlspecialchars($order['outlet_location'] ?? 'N/A'); ?></p>
<p class="text-gray-300 mb-2">Payment: <?php echo htmlspecialchars($order['payment_type'] ?? 'N/A'); ?></p>
<div class="mb-4">
<h4 class="text-sm font-semibold text-gray-200 mb-1">Items:</h4>
<ul class="text-gray-300 text-sm">
<?php foreach ($order['items'] as $item): ?>
<li><?php echo htmlspecialchars($item['quantity']); ?> x <?php echo htmlspecialchars($item['product_name']); ?> - £<?php echo number_format($item['product_price'] * $item['quantity'], 2); ?></li>
<?php endforeach; ?>
</ul>
</div>
<div class="flex space-x-2">
<form method="POST" action="/delete-order" style="display:inline;">
<input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
<button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition" onclick="return confirm('Are you sure you want to delete this order?')">
Delete
</button>
</form>
<form method="POST" action="/change-order" style="display:inline;">
<input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
<button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
Change
</button>
</form>
</div>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>
</section>

<!-- Place Order Section -->
<section id="placeOrderSection" class="bg-gray-800 rounded-lg p-6 hidden">
<h2 class="text-2xl font-semibold text-white mb-4">Place New Order</h2>

<form id="orderForm" method="POST" action="/place-order">
<div class="mb-4">
<label for="menuType" class="block text-sm font-medium text-gray-300 mb-2">Menu Type</label>
<select id="menuType" name="menu_type" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
<option value="regular">Regular Menu</option>
<option value="saver">Saver Menu</option>
</select>
</div>

<div id="saverMenuSection" class="mb-4 hidden">
<label for="saverMenuSelect" class="block text-sm font-medium text-gray-300 mb-2">Select Saver Menu</label>
<select id="saverMenuSelect" name="saver_menu_id" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
<option value="">Select Saver Menu</option>
<?php foreach ($saverMenus as $menu): ?>
<option value="<?php echo htmlspecialchars($menu['savers_menu_id']); ?>" data-price="<?php echo htmlspecialchars(number_format($menu['menu_price'], 2)); ?>"><?php echo htmlspecialchars($menu['menu_type'] . ' - ' . $menu['menu_section'] . ' - £' . number_format($menu['menu_price'], 2)); ?></option>
<?php endforeach; ?>
</select>
</div>

<div id="saverQuantitySection" class="mb-4 hidden">
<label for="saverQuantity" class="block text-sm font-medium text-gray-300 mb-2">Quantity</label>
<input id="saverQuantity" name="saver_quantity" type="number" min="1" value="1" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
</div>

<div class="mb-4">
<label for="outletSelect" class="block text-sm font-medium text-gray-300 mb-2">Order Location</label>
<select id="outletSelect" name="outlet_id" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
<option value="">Select location</option>
<?php foreach ($outlets as $outlet): ?>
<option value="<?php echo htmlspecialchars($outlet['outlet_id']); ?>"><?php echo htmlspecialchars($outlet['outlet_location']); ?></option>
<?php endforeach; ?>
</select>
</div>

<div class="mb-4">
<label for="paymentType" class="block text-sm font-medium text-gray-300 mb-2">Payment Type</label>
<select id="paymentType" name="payment_type" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
<option value="">Select Payment Type</option>
<option value="CARD">Card</option>
<option value="CASH">Cash</option>
</select>
</div>

<div id="regularItemsSection" class="mb-4">
<h3 class="text-lg font-semibold text-white mb-2">Select Items</h3>
<div id="orderItems" class="space-y-2">
<!-- Order items will be added here dynamically -->
</div>
<button type="button" id="addItemBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">Add Item</button>
</div>

<div class="mb-4">
<h3 class="text-lg font-semibold text-white mb-2">Order Summary</h3>
<div id="orderSummary" class="bg-gray-700 p-4 rounded">
<p class="text-gray-300">Location: <span id="selectedLocation">Not selected</span></p>
<p class="text-gray-300">Total Items: <span id="totalItems">0</span></p>
<p class="text-gray-300">Subtotal: <span id="subtotalText">£0.00</span></p>
<p class="text-gray-300">Discount: <span id="discountText">0%</span></p>
<p class="text-gray-300 font-semibold">Total: <span id="totalPriceText">£0.00</span></p>
</div>
</div>

<button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded transition">Place Order</button>
</form>
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

// View Account Details button functionality
const accountToggleBtn = document.getElementById('viewAccountBtn');
const accountSection = document.getElementById('accountSection');
accountToggleBtn.addEventListener('click', (event) => {
event.preventDefault();
accountSection.classList.toggle('hidden');
});

// View Orders button functionality
document.getElementById('viewOrdersBtn').addEventListener('click', () => {
const ordersSection = document.getElementById('ordersSection');
ordersSection.classList.toggle('hidden');
});

// Place Order button functionality
document.getElementById('placeOrderBtn').addEventListener('click', () => {
const placeOrderSection = document.getElementById('placeOrderSection');
placeOrderSection.classList.toggle('hidden');
});

// Add Item functionality
document.getElementById('addItemBtn').addEventListener('click', () => {
addOrderItem();
});

// Products data from PHP
const products = <?php echo json_encode($products); ?>;
const orderForm = document.getElementById('orderForm');
const menuTypeSelect = document.getElementById('menuType');
const regularItemsSection = document.getElementById('regularItemsSection');
const saverMenuSection = document.getElementById('saverMenuSection');
const saverQuantitySection = document.getElementById('saverQuantitySection');
const saverMenuSelect = document.getElementById('saverMenuSelect');
const saverQuantityInput = document.getElementById('saverQuantity');
const outletSelect = document.getElementById('outletSelect');
const selectedLocationText = document.getElementById('selectedLocation');
const subtotalText = document.getElementById('subtotalText');
const discountText = document.getElementById('discountText');
const totalPriceText = document.getElementById('totalPriceText');
const firstOrder = <?php echo json_encode($isFirstOrder ?? false); ?>;

function toggleMenuSections() {
    const isSaver = menuTypeSelect.value === 'saver';
    regularItemsSection.classList.toggle('hidden', isSaver);
    saverMenuSection.classList.toggle('hidden', !isSaver);
    saverQuantitySection.classList.toggle('hidden', !isSaver);
    updateOrderSummary();
}

menuTypeSelect.addEventListener('change', toggleMenuSections);
saverMenuSelect.addEventListener('change', updateOrderSummary);
saverQuantityInput.addEventListener('input', updateOrderSummary);
outletSelect.addEventListener('change', updateOrderSummary);

toggleMenuSections();

orderForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    if (!outletSelect.value) {
        alert('Please select a location for your order.');
        return;
    }

    if (menuTypeSelect.value === 'regular') {
        const orderItems = document.querySelectorAll('#orderItems > div');
        if (orderItems.length === 0) {
            alert('Please add at least one item to your order.');
            return;
        }

        for (const item of orderItems) {
            const select = item.querySelector('select');
            const quantity = parseInt(item.querySelector('input[type="number"]').value, 10) || 0;
            if (!select.value || quantity <= 0) {
                alert('Please select a product and quantity for every item.');
                return;
            }
        }
    } else {
        if (!saverMenuSelect.value || parseInt(saverQuantityInput.value, 10) <= 0) {
            alert('Please select a saver menu and quantity.');
            return;
        }
    }

    const formData = new FormData(orderForm);

    try {
        const response = await fetch(orderForm.action, {
            method: 'POST',
            body: formData,
            credentials: 'same-origin'
        });

        if (response.redirected || response.ok) {
            window.location.href = '/customer-dashboard';
            return;
        }

        const text = await response.text();
        alert('Order failed: ' + text);
    } catch (error) {
        alert('Order submission failed. Please try again.');
        console.error(error);
    }
});

function addOrderItem() {
const orderItems = document.getElementById('orderItems');
const itemDiv = document.createElement('div');
itemDiv.className = 'flex items-center space-x-2 bg-gray-700 p-2 rounded';

const select = document.createElement('select');
select.name = 'products[]';
select.className = 'px-2 py-1 bg-gray-600 border border-gray-500 rounded text-white';
select.required = true;

const defaultOption = document.createElement('option');
defaultOption.value = '';
defaultOption.textContent = 'Select Product';
select.appendChild(defaultOption);

products.forEach(product => {
const option = document.createElement('option');
option.value = product.product_id;
option.textContent = `${product.product_name} - £${product.product_price}`;
option.dataset.price = product.product_price;
select.appendChild(option);
});

const quantityInput = document.createElement('input');
quantityInput.type = 'number';
quantityInput.name = 'quantities[]';
quantityInput.min = '1';
quantityInput.value = '1';
quantityInput.className = 'px-2 py-1 bg-gray-600 border border-gray-500 rounded text-white w-16';
quantityInput.required = true;

const removeBtn = document.createElement('button');
removeBtn.type = 'button';
removeBtn.className = 'bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded';
removeBtn.textContent = 'Remove';
removeBtn.addEventListener('click', () => {
itemDiv.remove();
updateOrderSummary();
});

itemDiv.appendChild(select);
itemDiv.appendChild(quantityInput);
itemDiv.appendChild(removeBtn);
orderItems.appendChild(itemDiv);

// Update summary when product or quantity changes
select.addEventListener('change', updateOrderSummary);
quantityInput.addEventListener('input', updateOrderSummary);
}

function updateOrderSummary() {
const isSaver = menuTypeSelect.value === 'saver';
let totalItems = 0;
let totalPrice = 0;
let hasPrice = false;

if (isSaver) {
    totalItems = parseInt(saverQuantityInput.value, 10) || 0;
    const selectedSaver = saverMenuSelect.options[saverMenuSelect.selectedIndex];
    const price = parseFloat(selectedSaver.dataset.price) || 0;
    totalPrice = price * totalItems;
    hasPrice = totalItems > 0 && price > 0;
} else {
    const items = document.querySelectorAll('#orderItems > div');
    items.forEach(item => {
        const select = item.querySelector('select');
        const quantity = parseInt(item.querySelector('input[type="number"]').value, 10) || 0;
        const selectedOption = select.options[select.selectedIndex];

        if (selectedOption.value && quantity > 0) {
            const price = parseFloat(selectedOption.dataset.price);
            totalItems += quantity;
            totalPrice += price * quantity;
            hasPrice = true;
        }
    });
}

const selectedOutlet = outletSelect.options[outletSelect.selectedIndex];
selectedLocationText.textContent = selectedOutlet && selectedOutlet.value ? selectedOutlet.textContent : 'Not selected';

const discount = firstOrder && hasPrice ? 0.15 : 0;
const totalAfterDiscount = totalPrice - totalPrice * discount;

document.getElementById('totalItems').textContent = totalItems;
subtotalText.textContent = '£' + totalPrice.toFixed(2);
discountText.textContent = discount > 0 ? '15%' : '0%';
totalPriceText.textContent = hasPrice ? '£' + totalAfterDiscount.toFixed(2) : '£0.00';
}
</script>
</body>
</html>