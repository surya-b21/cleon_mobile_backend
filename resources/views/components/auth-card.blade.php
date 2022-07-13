<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-primary bg-cover bg-no-repeat" style="background-image: url({{ asset('img/register_bg_2.png') }})">
    <div>
        {{ $logo }}
    </div>

    <div class="container mx-auto mt-8 px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg border-0 bg-blueGray-200">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
