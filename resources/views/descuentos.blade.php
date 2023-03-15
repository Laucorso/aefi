<x-app-layout>
    <x-slot name="header">
        <h2 class="text-sm leading-tight" style="font-style:italic;color:#CD853F;">
            {{ __('Descuentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('descuentos')
            </div>
        </div>
    </div>
</x-app-layout>