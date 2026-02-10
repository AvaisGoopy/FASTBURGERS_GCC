<div>
  <div class="min-h-screen bg-white text-slate-900 font-sans p-6 md:p-12 lg:p-20 selection:bg-rose-100 selection:text-rose-600">

    <!-- FOOTER SECTION (Updated with richer gradient) -->
    <footer class="max-w-7xl mx-auto mt-24 pb-8">
        <!-- Newsletter Banner with Enhanced Sun Flare -->
        <div class="relative w-full rounded-[1.5rem] overflow-hidden bg-[#050202] text-white px-8 py-16 md:px-16 md:py-20 mb-20 shadow-2xl isolate">
            
            <!-- Deep Atmosphere Background -->
            <div class="absolute inset-0 z-0">
               <!-- Subtle warm tint on the right -->
               <div class="absolute inset-0 bg-gradient-to-br from-black via-[#0f0404] to-[#1a0505]"></div>
               
               <!-- 1. Large Ambient Glow (Reddish-Orange) -->
               <div class="absolute -top-[50%] -right-[10%] w-[120%] h-[200%] bg-[radial-gradient(circle_closest-side,_var(--tw-gradient-stops))] from-orange-900/40 via-red-950/20 to-transparent blur-[120px]"></div>

               <!-- 2. Intense Flare Core (Golden Orange) -->
               <div class="absolute -top-[20%] -right-[15%] w-[800px] h-[800px] bg-[radial-gradient(circle_closest-side,_var(--tw-gradient-stops))] from-amber-500/20 via-orange-600/10 to-transparent blur-[90px] mix-blend-screen opacity-80"></div>

               <!-- 3. The Bright Sun Spot (White/Yellow) -->
               <div class="absolute -top-[5%] -right-[5%] w-[400px] h-[400px] bg-[radial-gradient(circle,_var(--tw-gradient-stops))] from-amber-100/30 via-orange-200/5 to-transparent blur-[60px] mix-blend-overlay"></div>
               
               <!-- 4. Lens Flare Beams -->
               <div class="absolute top-0 right-0 w-[800px] h-[800px] opacity-40 mix-blend-screen pointer-events-none">
                  <div class="absolute top-0 right-0 w-[150%] h-[1px] bg-gradient-to-r from-transparent via-amber-100 to-transparent rotate-[-35deg] transform origin-top-right blur-[1px]"></div>
                  <div class="absolute top-0 right-0 w-[150%] h-[40px] bg-gradient-to-r from-transparent via-orange-500/10 to-transparent rotate-[-35deg] transform origin-top-right blur-[20px]"></div>
               </div>
            </div>

            <!-- Newsletter Content -->
            <div class="relative z-10 flex flex-col md:flex-row items-start md:items-end justify-between gap-10">
                <div class="max-w-xl">
                    <h2 class="text-4xl md:text-6xl font-medium tracking-tight mb-8 leading-[1.1]">Stay ahead without the noise.</h2>
                    <div class="flex flex-col sm:flex-row gap-3 w-full max-w-md">
                        <input type="email" placeholder="Enter your email" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder:text-white/40 focus:outline-none focus:border-white/30 focus:bg-white/10 transition-colors backdrop-blur-sm" />
                        <button class="bg-white text-black px-6 py-3 rounded-lg font-medium hover:bg-gray-200 transition-colors whitespace-nowrap">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Links Grid replaced by 4 main toggle buttons with subclass links -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 border-b border-slate-100 pb-16 mb-12">
            <!-- Tagline Column -->
            <div class="lg:col-span-4">
                 <p class="text-xl font-medium text-slate-900 max-w-[280px] leading-snug">
                    Designed for those who build the future quietly.
                 </p>
            </div>

            <!-- Four grouped buttons -->
            <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Button Group 1 -->
                <div class="bg-white/5 p-4 rounded-lg">
                    <button class="w-full text-left font-medium text-slate-900 py-3 px-4 rounded-md hover:bg-white/3 transition" data-toggle="group" data-target="platform">Platform</button>
                    <ul id="platform" class="mt-3 space-y-2 text-slate-500 text-sm hidden pl-4">
                        <li><a href="#" class="hover:text-slate-900 transition-colors">How It Works</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Features</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Integrations</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Roadmap</a></li>
                    </ul>
                </div>

                <!-- Button Group 2 -->
                <div class="bg-white/5 p-4 rounded-lg">
                    <button class="w-full text-left font-medium text-slate-900 py-3 px-4 rounded-md hover:bg-white/3 transition" data-toggle="group" data-target="company">Company</button>
                    <ul id="company" class="mt-3 space-y-2 text-slate-500 text-sm hidden pl-4">
                        <li><a href="#" class="hover:text-slate-900 transition-colors">About</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Careers</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Culture</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Press Kit</a></li>
                    </ul>
                </div>

                <!-- Button Group 3 -->
                <div class="bg-white/5 p-4 rounded-lg">
                    <button class="w-full text-left font-medium text-slate-900 py-3 px-4 rounded-md hover:bg-white/3 transition" data-toggle="group" data-target="resources">Resources</button>
                    <ul id="resources" class="mt-3 space-y-2 text-slate-500 text-sm hidden pl-4">
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Docs</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Support</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">API Reference</a></li>
                    </ul>
                </div>

                <!-- Button Group 4 -->
                <div class="bg-white/5 p-4 rounded-lg">
                    <button class="w-full text-left font-medium text-slate-900 py-3 px-4 rounded-md hover:bg-white/3 transition" data-toggle="group" data-target="legal">Legal</button>
                    <ul id="legal" class="mt-3 space-y-2 text-slate-500 text-sm hidden pl-4">
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Terms of Use</a></li>
                        <li><a href="#" class="hover:text-slate-900 transition-colors">Security</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm font-medium">
            <div class="flex items-center gap-2 text-slate-900">
                 <!-- Logo Icon placeholder -->
                 <div class="w-5 h-5 bg-slate-900 rounded-full flex items-center justify-center text-white">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                 </div>
                 <span class="font-bold tracking-tight">Rhys Milnes</span>
            </div>
            <div class="text-slate-500">
                Copyright © 2025 Rhys Milnes. All rights reserved.
            </div>
        </div>
    </footer>

  </div>
    <script>
        (function(){
            document.querySelectorAll('[data-toggle="group"]').forEach(function(btn){
                btn.addEventListener('click', function(){
                    var target = this.getAttribute('data-target');
                    // toggle this target
                    var el = document.getElementById(target);
                    if(!el) return;
                    var isHidden = el.classList.contains('hidden');
                    // hide all groups
                    document.querySelectorAll('[id^="platform"],[id^="company"],[id^="resources"],[id^="legal"]').forEach(function(g){
                        g.classList.add('hidden');
                    });
                    if(isHidden) el.classList.remove('hidden');
                });
            });
        })();
    </script>
</template>


<style scoped>

.perspective-1000 {
  perspective: 1000px;
}
</style>