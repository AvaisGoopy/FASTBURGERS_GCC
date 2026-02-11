<?php
$title = 'Login - Fast Burgers';
?>

<section class="py-16 md:py-24 bg-indigo-50">
    <div class="max-w-md mx-auto">
        <div class="card">
            <h1 class="text-3xl font-bold text-center mb-8" style="color: #ea580c;">Welcome Back</h1>
            
            <form action="#" method="POST" class="flex flex-col gap-4">
                <div>
                    <label for="email" class="block text-sm font-semibold mb-2 text-slate-700">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-100 transition-colors" placeholder="you@example.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold mb-2 text-slate-700">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-100 transition-colors" placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded border-slate-300">
                        <span class="text-slate-700">Remember me</span>
                    </label>
                    <a href="#" class="text-indigo-600 hover:underline">Forgot password?</a>
                </div>

                <button type="submit" class="btn btn-primary font-semibold py-2 mt-2">Sign In</button>
            </form>

            <div class="mt-6 text-center text-sm">
                <span class="text-slate-600">Don't have an account? </span>
                <a href="/register" class="text-indigo-600 font-semibold hover:underline">Register here</a>
            </div>
        </div>
    </div>
</section>
