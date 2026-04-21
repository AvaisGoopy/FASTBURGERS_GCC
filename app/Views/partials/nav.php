<div class="top-bar" style="position: relative; height: auto;">
  <div class="container-fluid" style="position: relative; padding-top: 90px; padding-bottom: 20px;">
    <a href="/" class="flex items-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
      <img src="/assets/images/FBP_logo.png" alt="Fast Burgers" title="Fast Burgers" class="site-logo" style="height: 168px; width: auto;">
    </a>
    <div class="flex justify-between items-center">
      <div style="width: 180px;"></div>
      <div class="text-white font-semibold" style="position: absolute; right: 50px; font-size: 1.25rem;">
        Fast, fresh & hot — order online
      </div>
    </div>
  </div>
</div>

<?php
// Check if user is logged in
$isLoggedIn = isset($_SESSION['auth']) && !empty($_SESSION['auth']['logged_in']);
?>

<nav class="site-nav" style="background-color: #ea580c !important;">
    <div class="container-fluid">
        <div class="flex justify-between items-center w-full">

            <!-- Desktop Navigation -->
            <ul class="hidden md:flex gap-2 items-center list-none" style="margin-left: 50px;">
                <li><a href="/" class="site-nav a active">Home</a></li>

                <li class="relative group">
                    <button type="button" class="site-nav a" data-toggle="nav" data-target="nav-about">
                        Menu <span class="ml-1">▾</span>
                    </button>
                    <ul id="nav-about" class="absolute left-0 mt-0 bg-white rounded-lg shadow-lg hidden group-hover:block z-20 min-w-[160px]">
                        <li><a href="/about" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 rounded-t-lg">About Us</a></li>
                        <li><a href="/contact" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 rounded-b-lg">Contact</a></li>
                    </ul>
                </li>

                <?php if ($isLoggedIn): ?>
                    <li class="relative group">
                        <button type="button" class="site-nav a" data-toggle="nav" data-target="nav-account">
                            Account <span class="ml-1">▾</span>
                        </button>
                        <ul id="nav-account" class="absolute left-0 mt-0 bg-white rounded-lg shadow-lg hidden group-hover:block z-20 min-w-[160px]">
                            <li><a href="/customer-dashboard" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 rounded-t-lg">Dashboard</a></li>
                            <li><a href="/logout" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 rounded-b-lg">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="relative group">
                        <button type="button" class="site-nav a" data-toggle="nav" data-target="nav-account">
                            Account <span class="ml-1">▾</span>
                        </button>
                        <ul id="nav-account" class="absolute left-0 mt-0 bg-white rounded-lg shadow-lg hidden group-hover:block z-20 min-w-[160px]">
                            <li><a href="/register" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 rounded-t-lg">Register</a></li>
                            <li><a href="/login" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 rounded-b-lg">Login</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- RIGHT: Logout Button (Desktop) -->
            <?php if ($isLoggedIn): ?>
            <div class="hidden md:flex items-center" style="margin-right: 50px;">
                <a href="/logout" style="background:#ef4444; color:white; border:none; padding:8px 14px; border-radius:8px; cursor:pointer; text-decoration: none;">
                    Logout
                </a>
            </div>
            <?php endif; ?>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" type="button" class="md:hidden p-2 rounded-lg hover:bg-secondary transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t border-border">
            <ul class="flex flex-col gap-2">
                <li><a href="/" class="site-nav a block">Home</a></li>

                <li>
                    <button type="button" class="site-nav a w-full text-left" data-toggle="nav" data-target="nav-orders-mobile">
                        Orders <span class="float-right">▾</span>
                    </button>
                    <ul id="nav-orders-mobile" class="hidden pl-4 mt-2 gap-1 flex flex-col">
                        <li><a href="/orders" class="text-sm text-muted-foreground hover:text-primary">View Orders</a></li>
                        <li><a href="/admin/orders" class="text-sm text-muted-foreground hover:text-primary">Manage Orders</a></li>
                    </ul>
                </li>

                <li>
                    <button type="button" class="site-nav a w-full text-left" data-toggle="nav" data-target="nav-about-mobile">
                        Menu <span class="float-right">▾</span>
                    </button>
                    <ul id="nav-about-mobile" class="hidden pl-4 mt-2 gap-1 flex flex-col">
                        <li><a href="/about" class="text-sm text-muted-foreground hover:text-primary">About Us</a></li>
                        <li><a href="/contact" class="text-sm text-muted-foreground hover:text-primary">Contact</a></li>
                    </ul>
                </li>

                <li>
                    <button type="button" class="site-nav a w-full text-left" data-toggle="nav" data-target="nav-account-mobile">
                        Account <span class="float-right">▾</span>
                    </button>
                    <?php if ($isLoggedIn): ?>
                    <ul id="nav-account-mobile" class="hidden pl-4 mt-2 gap-1 flex flex-col">
                        <li><a href="/customer-dashboard" class="text-sm text-muted-foreground hover:text-primary">Dashboard</a></li>
                        <li><a href="/logout" class="text-sm text-muted-foreground hover:text-primary">Logout</a></li>
                    </ul>
                    <?php else: ?>
                    <ul id="nav-account-mobile" class="hidden pl-4 mt-2 gap-1 flex flex-col">
                        <li><a href="/register" class="text-sm text-muted-foreground hover:text-primary">Register</a></li>
                        <li><a href="/login" class="text-sm text-muted-foreground hover:text-primary">Login</a></li>
                    </ul>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
(function(){
    // Mobile menu toggle
    var mobileMenuBtn = document.getElementById('mobile-menu-btn');
    var mobileMenu = document.getElementById('mobile-menu');
    if(mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function(){
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Nav dropdowns
    var navToggles = document.querySelectorAll('[data-toggle="nav"]');
    navToggles.forEach(function(btn){
        btn.addEventListener('click', function(e){
            e.stopPropagation();
            var target = this.getAttribute('data-target');
            var el = document.getElementById(target);
            if(!el) return;
            el.classList.toggle('hidden');
        });
    });
    
    // Close on outside click
    document.addEventListener('click', function(){
        document.querySelectorAll('[id^="nav-"]').forEach(function(m){ 
            if(!m.id.includes('-mobile')) m.classList.add('hidden'); 
        });
    });

    // Scroll shadow for nav
    var navEl = document.querySelector('.site-nav');
    if(navEl) {
        function onScroll(){
            if(window.scrollY > 8) navEl.classList.add('scrolled'); 
            else navEl.classList.remove('scrolled');
        }
        window.addEventListener('scroll', onScroll, {passive:true});
        onScroll();
    }
})();

// Logout function
function logout() {
    localStorage.removeItem("token");
    sessionStorage.clear();
}
</script>