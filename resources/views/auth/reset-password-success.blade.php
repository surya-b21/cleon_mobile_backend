<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="mx-auto h-1/2 w-1/2">
                <img src="{{ asset('img/main-logo.png') }}" alt="main-logo.png">
            </div>
        </x-slot>

        <div class="flex-auto px-4 lg:px-10 py-10 pt-8 mx-auto text-base">
            Password anda telah berhasil diperbarui
        </div>
    </x-auth-card>
</x-guest-layout>
