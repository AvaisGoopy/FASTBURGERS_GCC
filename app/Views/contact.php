<?php
$title = 'Contact Us - Fast Burgers';
?>

<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(135deg, #ea580c 0%, #fb923c 100%); color: white; padding: 3rem 0%;">
    <div class="container-fluid text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4" style="color: white;">Get In Touch</h1>
        <p class="text-lg text-white/80 max-w-2xl mx-auto" style="color: rgba(255, 255, 255, 0.9);">We'd love to hear from you. Send us a message!</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 md:py-24" style="background-color: #ffffff; color: #0f172a;">
    <div class="container-fluid">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Contact Info Cards -->
            <div class="card text-center">
                <div class="text-4xl mb-4">📍</div>
                <h3 class="text-xl font-semibold mb-2">Location</h3>
                <p class="text-slate-600">123 Burger Street<br>Food City, FC 12345</p>
            </div>
            <div class="card text-center">
                <div class="text-4xl mb-4">📞</div>
                <h3 class="text-xl font-semibold mb-2">Phone</h3>
                <p class="text-slate-600">(555) 123-4567<br>10 AM - 11 PM Daily</p>
            </div>
            <div class="card text-center">
                <div class="text-4xl mb-4">✉️</div>
                <h3 class="text-xl font-semibold mb-2">Email</h3>
                <p class="text-slate-600">info@fastburgers.com<br>support@fastburgers.com</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Send us a Message</h2>
            <form action="#" method="POST" class="card">
                <div class="mb-6">
                    <label for="name" class="block text-sm font-semibold mb-2">Full Name</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-2 rounded-lg border border-border focus:outline-none focus:border-primary transition-colors" placeholder="Your name">
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-semibold mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 rounded-lg border border-border focus:outline-none focus:border-primary transition-colors" placeholder="your@email.com">
                </div>

                <div class="mb-6">
                    <label for="subject" class="block text-sm font-semibold mb-2">Subject</label>
                    <input type="text" id="subject" name="subject" required class="w-full px-4 py-2 rounded-lg border border-border focus:outline-none focus:border-primary transition-colors" placeholder="What's this about?">
                </div>

                <div class="mb-8">
                    <label for="message" class="block text-sm font-semibold mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 rounded-lg border border-border focus:outline-none focus:border-primary transition-colors" placeholder="Your message here..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-full font-semibold">Send Message</button>
            </form>
        </div>
    </div>
</section>