<x-client>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-green-light leading-tight">
            {{ __('accueil.point_vente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-3d-brown-radial overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-3d-brown-radial">
                    <livewire:guest.place />
                </div>
            </div>
        </div>
    </div>
</x-client>