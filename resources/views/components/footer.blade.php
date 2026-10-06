<footer class="mt-16 text-mos-50">

    {{-- Golvende rand bovenaan --}}
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="block w-full h-10 text-mos-800">
        <path fill="currentColor" d="M0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 L0,60 Z" />
    </svg>

    <div class="bg-mos-800">
        <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Over de club --}}
            <div>
                <p class="font-display text-2xl font-semibold text-white mb-2">🥾 Snelle Slenteraars</p>
                <p class="text-mos-100">
                    Wandelen in ons eigen tempo. Niet te snel, niet te traag, en altijd met een koffiestop.
                </p>
            </div>

            {{-- Contact --}}
            <div>
                <p class="font-display text-lg font-semibold text-zon-400 mb-2">Contact</p>
                <ul class="space-y-1 text-mos-100">
                    <li>Brugge</li>
                    <li>✉️ <a href="mailto:info@voorbeeld.be" class="hover:text-white hover:underline">info@voorbeeld.be</a></li>
                </ul>
            </div>

            {{-- Links --}}
            <div>
                <p class="font-display text-lg font-semibold text-zon-400 mb-2">Snel naar</p>
                <ul class="space-y-1 text-mos-100">
                    <li><a href="{{ route('home') }}" class="hover:text-white hover:underline">Komende wandelingen</a></li>
                    <li><a href="#" class="hover:text-white hover:underline">Facebook</a></li>
                </ul>
            </div>

        </div>

        <div class="border-t border-mos-700">
            <p class="max-w-6xl mx-auto px-6 py-4 text-sm text-mos-100">
                © {{ date('Y') }} Snelle Slenteraars · Gemaakt door Wannes Lamoot
            </p>
        </div>
    </div>

</footer>
