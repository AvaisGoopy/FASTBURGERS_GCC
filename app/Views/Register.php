
<?php
$title = 'Register - Fast Burgers';
?>

<section class="py-16 md:py-24 bg-indigo-50">
    <div class="max-w-md mx-auto">
        <div class="card">
            <h1 class="text-3xl font-bold text-center mb-8 text-indigo-900">Join Fast Burgers</h1>
            
            <form action="#" method="POST" class="flex flex-col gap-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="firstName" class="block text-sm font-semibold mb-2 text-slate-700">First Name</label>
                        <input type="text" id="firstName" name="firstName" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-100 transition-colors" placeholder="John">
                    </div>
                    <div>
                        <label for="lastName" class="block text-sm font-semibold mb-2 text-slate-700">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-100 transition-colors" placeholder="Doe">
                    </div>
                </div>

                <div>
                    <label for="username" class="block text-sm font-semibold mb-2 text-slate-700">Username</label>
                    <input type="text" id="username" name="username" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-100 transition-colors" placeholder="johndoe">
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold mb-2 text-slate-700">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-100 transition-colors" placeholder="john@example.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold mb-2 text-slate-700">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-100 transition-colors" placeholder="••••••••">
                </div>

                <div>
                    <label for="confirmPassword" class="block text-sm font-semibold mb-2 text-slate-700">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-100 transition-colors" placeholder="••••••••">
                </div>

                <label class="flex items-center gap-2 text-sm mt-2">
                    <input type="checkbox" name="terms" required class="rounded border-slate-300">
                    <span class="text-slate-700">I agree to the <a href="#" class="text-indigo-600 hover:underline">Terms of Service</a></span>
                </label>

                <button type="submit" class="btn btn-primary font-semibold py-2 mt-2">Create Account</button>
            </form>

            <div class="mt-6 text-center text-sm">
                <span class="text-slate-600">Already have an account? </span>
                <a href="/login" class="text-indigo-600 font-semibold hover:underline">Login here</a>
            </div>
        </div>
    </div>
</section>
