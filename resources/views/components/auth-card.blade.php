{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div> --}}

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="background-image:url('https://cdn.pixabay.com/photo/2016/12/22/18/20/skyline-1925943_960_720.jpg'); background-repeat: no-repeat; background-size: cover;">
    
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg backdrop-blur-sm bg-white/30">
        <div class="flex flex-col sm:justify-center items-center m-2">
            {{ $logo }}
        </div>
        {{ $slot }}
    </div>
</div>
