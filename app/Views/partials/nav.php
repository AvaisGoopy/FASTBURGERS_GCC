<nav class="site-nav sticky top-0 z-50 bg-white/95 border-gray-200 py-2.5 dark:bg-gray-900/95 backdrop-blur-sm transition-shadow">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="/" class="flex items-center">
            <img src="/assets/images/FBP_logo.png" alt="Fast Burgers" title="Fast Burgers" class="site-logo h-36 sm:h-36 md:h-36 w-auto object-contain">
        </a>
        <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 mr-4 sm:inline-block">
                <span></span>
            </div>

            <!-- Download CTA removed -->
            <button data-collapse-toggle="mobile-menu-2" type="button"
				class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
				aria-controls="mobile-menu-2" aria-expanded="true">
				<span class="sr-only">Open main menu</span>
				<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
						clip-rule="evenodd"></path>
				</svg>
				<svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
						clip-rule="evenodd"></path>
				</svg>
			</button>
        </div>
        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="/" class="block py-2 pl-3 pr-4 text-white bg-purple-700 rounded lg:bg-transparent lg:text-purple-700 lg:p-0 dark:text-white">Home</a>
                </li>

                <!-- Orders group -->
                <li class="relative">
                    <button type="button" class="block py-2 pl-3 pr-4 text-gray-700 lg:p-0" data-toggle="nav" data-target="nav-orders">Orders ▾</button>
                    <ul id="nav-orders" class="absolute left-0 mt-2 bg-white rounded-md shadow-lg hidden z-20 lg:translate-y-2 lg:w-40">
                        <li><a href="/controllers/Admin/OrdersController.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Orders</a></li>
                        <li><a href="/controllers/Admin/UsersController.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Users</a></li>
                    </ul>
                </li>

                <!-- About group -->
                <li class="relative">
                    <button type="button" class="block py-2 pl-3 pr-4 text-gray-700 lg:p-0" data-toggle="nav" data-target="nav-about">About ▾</button>
                    <ul id="nav-about" class="absolute left-0 mt-2 bg-white rounded-md shadow-lg hidden z-20 lg:translate-y-2 lg:w-40">
                        <li><a href="/about" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">About</a></li>
                        <li><a href="/contact" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contact</a></li>
                    </ul>
                </li>

                <!-- Account group -->
                <li class="relative">
                    <button type="button" class="block py-2 pl-3 pr-4 text-gray-700 lg:p-0" data-toggle="nav" data-target="nav-account">Account ▾</button>
                    <ul id="nav-account" class="absolute left-0 mt-2 bg-white rounded-md shadow-lg hidden z-20 lg:translate-y-2 lg:w-40">
                        <li><a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</a></li>
                        <li><a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
<script>
    (function(){
        var navToggles = document.querySelectorAll('[data-toggle="nav"]');
        navToggles.forEach(function(btn){
            btn.addEventListener('click', function(e){
                e.stopPropagation();
                var target = this.getAttribute('data-target');
                var el = document.getElementById(target);
                if(!el) return;
                // hide other nav menus
                document.querySelectorAll('#nav-orders,#nav-about,#nav-account').forEach(function(m){ if(m!==el) m.classList.add('hidden'); });
                el.classList.toggle('hidden');
            });
        });
        // close on outside click
        document.addEventListener('click', function(){
            document.querySelectorAll('#nav-orders,#nav-about,#nav-account').forEach(function(m){ m.classList.add('hidden'); });
        });
    })();

    // add simple scroll shadow for nav
    (function(){
      var navEl = document.querySelector('.site-nav');
      if(!navEl) return;
      function onScroll(){
        if(window.scrollY > 8) navEl.classList.add('scrolled'); else navEl.classList.remove('scrolled');
      }
      window.addEventListener('scroll', onScroll, {passive:true});
      onScroll();
    })();
</script>