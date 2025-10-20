{{-- resources/views/components/sitemap-interactive.blade.php --}}
@props(['lots' => []])

<div x-data="sitemapInteractive(@js($lots))" x-init="init()" class="flex flex-col h-screen md:flex-row">

    <!-- SVG WRAPPER -->
    <div id="svg-wrap" class="flex-1 p-4 overflow-auto bg-gray-100">
        <div>Loading sitemap…</div>
    </div>

    <!-- INFO PANEL -->
    <aside x-show="panelOpen"
        class="w-full md:w-[340px] bg-white border-t md:border-t-0 md:border-l shadow-md p-4 relative z-20" x-transition
        @click.away="closePanel">

        <div class="flex items-center justify-between mb-2">
            <h2 class="text-lg font-semibold" x-text="selectedLot?.name || 'Select a lot'"></h2>
            <button @click="closePanel" class="text-xl leading-none text-gray-600">✕</button>
        </div>

        <template x-if="selectedLot">
            <div>
                <div class="mb-3 text-sm text-gray-500">Information for the selected lot.</div>
                <div class="space-y-1 text-sm">
                    <p><strong>ID:</strong> <span x-text="selectedLot.id"></span></p>
                    <p><strong>Name:</strong> <span x-text="selectedLot.name"></span></p>
                    <p><strong>Type:</strong> <span x-text="selectedLot.type"></span></p>
                    <p><strong>Address:</strong> <span x-text="selectedLot.address"></span></p>
                    <p><strong>Area (sqm):</strong> <span x-text="selectedLot.area"></span></p>
                    <p><strong>Price (PHP):</strong> <span x-text="selectedLot.price"></span></p>
                </div>

                <div class="mt-4">
                    <button @click="reserveLot" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">
                        Reserve
                    </button>
                </div>
            </div>
        </template>
    </aside>

</div>

<script>
    function sitemapInteractive(lots) {
        return {
            lots,
            panelOpen: false,
            selectedLot: null,

            async init() {
                const wrap = document.getElementById('svg-wrap');
                try {
                    const resp = await fetch('{{ asset('img/properties/sitemap.svg') }}');
                    const svgText = await resp.text();
                    wrap.innerHTML = svgText;

                    const svgEl = wrap.querySelector('svg');
                    if (!svgEl) {
                        wrap.innerHTML = `<p class='text-red-500'>Invalid SVG structure.</p>`;
                        return;
                    }

                    // ✅ Select all paths (since yours are <path> elements)
                    const paths = svgEl.querySelectorAll('path');

                    // Assign temporary IDs if missing
                    paths.forEach((el, i) => {
                        if (!el.id) el.id = `lot-${i + 1}`;
                        el.classList.add('cursor-pointer', 'transition', 'duration-150');
                        el.addEventListener('click', () => this.selectLot(el.id));
                        el.addEventListener('mouseenter', () => el.classList.add('ring',
                            'ring-orange-400'));
                        el.addEventListener('mouseleave', () => el.classList.remove('ring',
                            'ring-orange-400'));
                    });

                    // Add sample data if none provided
                    if (Object.keys(this.lots).length === 0) {
                        paths.forEach((el, i) => {
                            const id = el.id;
                            this.lots[id] = {
                                id,
                                name: `Lot ${i + 1}`,
                                type: 'Residential',
                                address: 'N/A',
                                area: Math.floor(Math.random() * 100 + 80),
                                price: (Math.random() * 4_000_000 + 1_000_000).toFixed(0)
                            };
                        });
                    }

                } catch (e) {
                    wrap.innerHTML =
                        `<p class='text-red-500'>Failed to load sitemap.svg. Make sure it's in your /public folder.</p>`;
                }
            },

            selectLot(id) {
                this.selectedLot = this.lots[id] ?? {
                    id,
                    name: `Lot ${id}`
                };
                this.panelOpen = true;
            },

            closePanel() {
                this.panelOpen = false;
            },

            reserveLot() {
                if (!this.selectedLot?.id) return;
                alert(`Reserve lot: ${this.selectedLot.id}`);
            }
        };
    }
</script>
