<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="mx-auto h-1/2 w-1/2">
                <img src="{{ asset('img/main-logo.png') }}" alt="main-logo.png">
            </div>
        </x-slot>

        <div class="flex-auto px-4 lg:px-10 py-10 pt-8 mx-auto text-base text-center">
            <p class="text-center">
                Email anda telah berhasil diperbarui klik tombol dibawah untuk kembali ke aplikasi
            </p>

            <a
                class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 mt-5 ease-linear transition-all duration-150"
                type="button" href="https://cleonmobile.page.link/start">
                Kembali ke App
        </a>
        </div>
    </x-auth-card>
</x-guest-layout>
