@extends('layout.master')

@section('content')
<div class="flex container mx-auto px-14 mt-16 flex-col pb-40">
        
    <div class="flex flex-row">
        <span class="text-gray-500">Semua UMKM</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">{{ $umkm->village->name }}</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">{{ $umkm->category->name }}</span>
        <span class="mx-2">/</span>
        <span>{{ $umkm->name }}</span>
    </div>

    <div class="flex mt-6">
        <h1 class="text-3xl font-medium">{{ $umkm->name }}</h1>
    </div>
    <div class="flex mt-6">
        <div class="w-full grid grid-cols-3 gap-20">
            <div class="col-span-2">
                <img id="main-thumbnail" class="w-full rounded-2xl object-cover h-96" src="{{ asset('images/umkm/umkm6.jpg') }}" alt="">
                <div class="grid grid-cols-4 gap-4 mt-4">
                    <img class="thumbnail-item col-span-1 w-full h-32 object-cover rounded-2xl cursor-pointer" src="{{ asset('images/umkm/umkm6.jpg') }}" alt="">
                    <img class="thumbnail-item col-span-1 w-full h-32 object-cover rounded-2xl cursor-pointer" src="{{ asset('images/umkm/umkm2.jpg') }}" alt="">
                    <img class="thumbnail-item col-span-1 w-full h-32 object-cover rounded-2xl cursor-pointer" src="{{ asset('images/umkm/umkm3.jpg') }}" alt="">
                    <img class="thumbnail-item col-span-1 w-full h-32 object-cover rounded-2xl cursor-pointer" src="{{ asset('images/umkm/umkm4.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-span-1">
                <div class="flex flex-col">
                    <h2 class="text-xl font-semibold">Keterangan</h2>
                    <div class="flex mt-8">
                        <div class="w-10">
                            <img class="h-6 mr-3" src="{{ asset('images/iconsax-linear/buildings.svg') }}">
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-medium">Nama Perusahaan</h3>
                            <h3 class="text-gray-500">{{ $umkm->name }}</h3>
                        </div>
                    </div>
                    <div class="flex mt-8">
                        <div class="w-10">
                            <img class="h-6 mr-3" src="{{ asset('images/iconsax-linear/user.svg') }}">
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-medium">Nama Pemilik</h3>
                            <h3 class="text-gray-500">{{ $umkm->owner_name }}</h3>
                        </div>
                    </div>
                    <div class="flex mt-8">
                        <div class="w-10">
                            <img class="h-6 mr-3" src="{{ asset('images/iconsax-linear/box.svg') }}">
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-medium">Jenis Usaha</h3>
                            <h3 class="text-gray-500">{{ $umkm->business_type }}</h3>
                        </div>
                    </div>
                    <div class="flex mt-8">
                        <div class="w-10">
                            <img class="h-6 mr-3" src="{{ asset('images/iconsax-linear/map.svg') }}">
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-medium">Alamat</h3>
                            <h3 class="text-gray-500">{{ $umkm->address }}</h3>
                        </div>
                    </div>
                    <div class="flex mt-16">
                        <a href="" class="flex px-3 py-2 hover:bg-gray-200 rounded-full">
                            <img class="h-5 mr-2" src="{{ asset('images/routing-green.svg') }}">
                            <span>Rute</span>
                        </a>
                        <a href="" class="flex px-3 py-2 hover:bg-gray-200 rounded-full">
                            <img class="h-5 mr-2" src="{{ asset('images/share.png') }}">
                            <span>Share</span>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="flex mt-16 flex-col">
        <div class="flex justify-between">
            <span class="text-lg font-medium">Alamat UMKM</span>
            <a href="" class="flex flex-nowrap px-5 py-2 hover:bg-green-50 rounded-xl">Buka di Google Map <img class="h-4 ml-1 mt-1" src="{{ asset('images/iconsax-linear/export-2.svg') }}"></a>
        </div>
        <div id="map" class="w-full h-80 mt-6 rounded-2xl"></div>
    </div>
    @if(count($related_umkm)>1)
    <div class="flex mt-16 flex-col">
        <span class="text-lg font-medium">UMKM Terkait</span>
        <div class="mt-4 grid grid-cols-4 gap-4">
            @foreach($related_umkm as $related)
                <x-u-m-k-m
                :umkm="$related"
                ></x-u-m-k-m>
            @endforeach
        </div>
    </div>
    @endisset
</div>
<script>
    function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: { lat: {{ $umkm->village->coordinate->latitude }}, lng: {{ $umkm->village->coordinate->longitude }} },
    });
    const infoWindow = new google.maps.InfoWindow({
        content: "",
        disableAutoPan: true,
    });
    const icon = "{{ asset('images/map_marker_small.png') }}";
    // Create an array of alphabetical characters used to label the markers.
    const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    // Add some markers to the map.
    const markers = locations.map((position, i) => {
        const label = labels[i % labels.length];
        const marker = new google.maps.Marker({
        position,
        icon,
        label:"",
        });
        return marker;
    });

    // Add a marker clusterer to manage the markers.
    //   new MarkerClusterer({ markers, map });
    const markerCluster = new markerClusterer.MarkerClusterer({ map, markers });
    }

    const locations = [
        {
            lat: {{ $umkm->village->coordinate->latitude }}, 
            lng: {{ $umkm->village->coordinate->longitude }}, 
        },
    ];
    $(document).ready(()=>{
        $('.thumbnail-item').click(function(){
            $("#main-thumbnail").attr("src", $(this).attr("src"));
        });
    });
</script>
@endsection