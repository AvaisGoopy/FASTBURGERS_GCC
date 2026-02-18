<?php
// Home page view
$title = 'Home - Fast Burgers';
?>

<!-- Hero Section -->
<section class="hero-section" style="padding: 4rem 0;">
    <div class="container-fluid">
        <div class="hero-inner">
            <div class="hero-content">
                <h1 style=" font-size: 2.25rem; margin-bottom: 1.5rem; line-height: 1.2; text-align: center;">Delicious Burgers<br />Delivered Fast</h1>
                <p style="font-size: 1.125rem; margin-bottom: 2rem; text-align: center;">
                    Order from our wide selection of gourmet burgers, sides, and drinks. Fast delivery to your door!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section - 4 Cards -->
<section style="padding: 4rem 0; background-color: #ffffff;">
    <div class="container-fluid">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            <!-- Feature 1 -->
            <div class="card" style="padding: 2rem; background-color: white; border: 1px solid rgba(234, 88, 12, 0.12); border-radius: 0.5rem;">
                <div style="width: 4rem; height: 4rem; background-color: #ea580c; color: white; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; font-size: 1.5rem; font-weight: bold;">🚚</div>
                <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.75rem; color: #111827;">Fast Delivery</h3>
                <p style="color: #6b7280; font-size: 0.875rem;">30 min or less</p>
            </div>

            <!-- Feature 2 -->
            <div class="card" style="padding: 2rem; background-color: white; border: 1px solid rgba(234, 88, 12, 0.12); border-radius: 0.5rem;">
                <div style="width: 4rem; height: 4rem; background-color: #ea580c; color: white; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; font-size: 1.5rem; font-weight: bold;">💰</div>
                <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.75rem; color: #111827;">Best Prices</h3>
                <p style="color: #6b7280; font-size: 0.875rem;">Affordable meals</p>
            </div>

            <!-- Feature 3 -->
            <div class="card" style="padding: 2rem; background-color: white; border: 1px solid rgba(234, 88, 12, 0.12); border-radius: 0.5rem;">
                <div style="width: 4rem; height: 4rem; background-color: #ea580c; color: white; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; font-size: 1.5rem; font-weight: bold;">✨</div>
                <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.75rem; color: #111827;">Quality Food</h3>
                <p style="color: #6b7280; font-size: 0.875rem;">Fresh ingredients</p>
            </div>

            <!-- Feature 4 -->
            <div class="card" style="padding: 2rem; background-color: white; border: 1px solid rgba(234, 88, 12, 0.12); border-radius: 0.5rem;">
                <div style="width: 4rem; height: 4rem; background-color: #ea580c; color: white; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; font-size: 1.5rem; font-weight: bold;">🎁</div>
                <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.75rem; color: #111827;">Free Delivery</h3>
                <p style="color: #6b7280; font-size: 0.875rem;">Orders over $20</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Items Section -->
<section style="padding: 4rem 0; background-color: #ffffff;">
    <div class="container-fluid">
        <h2 style="font-size: 2rem; font-weight: 700; text-align: center; margin-bottom: 1rem; color: #111827;">Featured Burgers</h2>
        <p style="text-align: center; color: #6b7280; margin-bottom: 3rem;">Try our most popular items</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
            <!-- Item 1 -->
            <div class="card" style="background-color: white; border: 1px solid rgba(234, 88, 12, 0.12); border-radius: 0.5rem; overflow: hidden; display: flex; flex-direction: column; height: 100%;">
                <div style="width: 100%; height: 16rem; background-color: #f3f4f6; border-radius: 0;">
                    <img src="/assets/images/ClassicBurger.png" alt="Classic Cheeseburger" style="width: 100%; height: 100%; object-fit: contain; padding: 1rem;" />
                </div>
                <div style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h3 style="font-size: 1.125rem; font-weight: 600; color: #111827;">Classic Cheeseburger</h3>
                        <span style="font-size: 0.875rem; font-weight: 600; color: #ea580c;">⭐ 4.8</span>
                    </div>
                    <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem; flex: 1;">Our signature beef patty with lettuce, tomato, and special sauce on a toasted bun</p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto;">
                        <span style="font-size: 1.5rem; font-weight: 700; color: #ea580c;">£8.99</span>
                        <button class="btn btn-primary" style="font-size: 0.875rem; padding: 0.5rem 1rem;">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="card" style="background-color: white; border: 1px solid rgba(234, 88, 12, 0.12); border-radius: 0.5rem; overflow: hidden; display: flex; flex-direction: column; height: 100%;">
                <div style="width: 100%; height: 16rem; background-color: #f3f4f6; border-radius: 0;">
                    <img src="/assets/images/DeluxeBurger.png" alt="Bacon Deluxe" style="width: 100%; height: 100%; object-fit: contain; padding: 1rem;" />
                </div>
                <div style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h3 style="font-size: 1.125rem; font-weight: 600; color: #111827;">Deluxe Combo</h3>
                        <span style="font-size: 0.875rem; font-weight: 600; color: #ea580c;">⭐ 4.9</span>
                    </div>
                    <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem; flex: 1;">Burger, fries, and a drink. Everything you need for the perfect meal.</p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto;">
                        <span style="font-size: 1.5rem; font-weight: 700; color: #ea580c;">£10.99</span>
                        <button class="btn btn-primary" style="font-size: 0.875rem; padding: 0.5rem 1rem;">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="card" style="background-color: white; border: 1px solid rgba(234, 88, 12, 0.12); border-radius: 0.5rem; overflow: hidden; display: flex; flex-direction: column; height: 100%;">
                <div style="width: 100%; height: 16rem; background-color: #f3f4f6; border-radius: 0;">
                    <img src="/assets/images/DoubleBurger.png" alt="Double Beef Burger" style="width: 100%; height: 100%; object-fit: contain; padding: 1rem;" />
                </div>
                <div style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h3 style="font-size: 1.125rem; font-weight: 600; color: #111827;">Double Burger</h3>
                        <span style="font-size: 0.875rem; font-weight: 600; color: #ea580c;">⭐ 4.7</span>
                    </div>
                    <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem; flex: 1;">Two juicy patties stacked high with double cheese and all the fixings.</p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto;">
                        <span style="font-size: 1.5rem; font-weight: 700; color: #ea580c;">£9.49</span>
                        <button class="btn btn-primary" style="font-size: 0.875rem; padding: 0.5rem 1rem;">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section style="padding: 4rem 0; background-color: #f3f4f6; text-align: center;">
    <div class="container-fluid">
        <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: #111827;">Ready to Order?</h2>
        <p style="font-size: 1.125rem; margin-bottom: 2rem; max-width: 42rem; margin-left: auto; margin-right: auto; color: #6b7280;">
            Sign up today and get 15% off your first order!
        </p>
        <div style="display: flex; flex-direction: column; gap: 1rem; justify-content: center; align-items: center; flex-wrap: wrap;">
            <button class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600; font-size: 1rem;">Create Account</button>
