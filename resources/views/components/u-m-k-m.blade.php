<div>
    <div class="col-span-1 rounded overflow-hidden shadow-lg relative">
        @if ($umkm->is_featured)
        <div class="absolute flex flex-row text-xs rounded-lg top-1 left-1 bg-gradient-to-br from-white to-yellow-400 p-2 z-10 text-gray-700">
            <img class="h-4 mr-1" src="{{ asset('images/iconsax-linear/crown-1.svg') }}" alt="">
            <span>Unggulan</span>
        </div>
        @endif
        <a href="{{ route('umkm.detail', [$umkm->village_id, Str::slug($umkm->category->name), $umkm->id, Str::slug($umkm->name)])}}">
            <img class="transform transition hover:scale-105 w-full h-48 object-cover" src="{{ asset('images/umkm/umkm'.random_int(1,21).'.jpg') }}" alt="Mountain">
        </a>
        <div class="px-6 py-4">
          <a href="{{ route('umkm.detail', [$umkm->village_id, Str::slug($umkm->category->name), $umkm->id, Str::slug($umkm->name)])}}" class="font-medium text-xl mb-2 h-12 hover:text-green-700">{{ $umkm->name }}</a>
        </div>
        <div class="flex flex-col px-6 pb-2">
          <div class="flex flex-row mb-2">
              <img class="h-5 mr-3" src="{{ asset('images/iconsax-linear/box.svg') }}">
              <span class="text-sm text-gray-500">{{ $umkm->business_type }}</span>
          </div>
          <div class="flex flex-row mb-2">
            <img class="h-5 mr-3" src="{{ asset('images/iconsax-linear/user.svg') }}">
            <span class="text-sm text-gray-500">{{ $umkm->owner_name }}</span>
        </div>
        <div class="flex flex-row mb-2">
            <img class="h-5 mr-3" src="{{ asset('images/iconsax-linear/map.svg') }}">
            <span class="text-sm text-gray-500">{{ $umkm->address }}</span>
        </div>
        </div>
    </div>
</div>