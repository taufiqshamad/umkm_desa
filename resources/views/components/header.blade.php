<div class="w-full shadow-md">
    <div class="grid grid-cols-8 items-center h-16 gap-4 container mx-auto px-14">
        <div class="col-span-2">
            <a href="/">
                <img src="{{ asset('images/logo-umkm.svg') }}" class="h-10">
            </a>
        </div>
        <div class="col-span-4">
            <div class="flex bg-gray-100 rounded-full">
                <div class="flex items-center justify-center pl-6">
                    <img class="filter contrast-0" src="{{ asset('images/iconsax-linear/search-normal.svg') }}">
                </div>
                <input type="text" class="px-4 py-2 focus:outline-none border-none bg-gray-100 w-full rounded-tr-full rounded-r-full" placeholder="Cari Kecamatan">
            </div>
        </div>
        <div class="col-span-2">
            <div class="flex h-16 flex-wrap justify-end items-center gap-6 text-sm">
                <a href="/" class="{{!empty($active)?($active=="home"?"text-green-700":""):""}}">Beranda</a>
                <a href="/" class="hover:text-green-700">Semua UMKM</a>
                <img class="h-full p-2" src="{{ asset('images/avatar.png') }}">
            </div>
        </div>
    </div>
</div>