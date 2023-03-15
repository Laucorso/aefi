<x-app-layout>
    <x-slot name="header">
        <h2 class="text-sm leading-tight" style="font-style:italic;color:#CD853F;">
            {{ __('Area Privada') }}
        </h2>
    </x-slot>

    <div class="py-12" style="padding-left:200px;padding-right:200px;">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('area-privada')
            </div>
        </div>
    </div>
</x-app-layout>
