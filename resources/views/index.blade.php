@extends('layout.master')

@section('content')
<script>
    // [START maps_marker_clustering]
    const domain = window.location.protocol+"//"+window.location.hostname+"/";
    function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: { lat: 3.485295399529201, lng: 98.70687721042982 },
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

        // markers can only be keyboard focusable when they have click listeners
        // open info window when marker is clicked
        marker.addListener("click", () => {
            showDialog(position);
        // infoWindow.setContent(label);
        // infoWindow.open(map, marker);
        });
        return marker;
    });

    // Add a marker clusterer to manage the markers.
    //   new MarkerClusterer({ markers, map });
    const markerCluster = new markerClusterer.MarkerClusterer({ map, markers });
    }

    const locations = [
        @foreach($coordinates as $coordinate)
            {
                lat: {{ $coordinate->latitude }}, 
                lng: {{ $coordinate->longitude }}, 
                village_id: {{ $coordinate->village_id }}, 
            },
        @endforeach
    ];
    // [END maps_marker_clustering]

    function showDialog(position)
    {
        // alert(position.village_id);
        document.getElementById("modal").classList.remove('invisible');
        document.getElementById("dialog").classList.remove('transform');
        document.getElementById("dialog").classList.remove('scale-0');
        
        $.ajax({
            url:domain+"api/get-category-count-by-village",
            method:"GET",
            data:{village_id:position.village_id},
            success:(res)=>{
                document.getElementById("loading").classList.add('invisible');
                document.getElementById("village_name").innerHTML = res.village.name;
                document.getElementById("district_name").innerHTML = res.district.name;
                document.getElementById("makanan_count").innerHTML = res.category.makanan;
                document.getElementById("minuman_count").innerHTML = res.category.minuman;
                document.getElementById("pakaian_count").innerHTML = res.category.pakaian;
                document.getElementById("pariwisata_count").innerHTML = res.category.pariwisata;

                document.getElementById("makanan_link").href=domain+"umkm/"+position.village_id+"/makanan";
                document.getElementById("minuman_link").href=domain+"umkm/"+position.village_id+"/minuman";
                document.getElementById("pakaian_link").href=domain+"umkm/"+position.village_id+"/pakaian";
                document.getElementById("pariwisata_link").href=domain+"umkm/"+position.village_id+"/pariwisata";
            },
            error:()=>{
                alert("Gagal meload data, silahkan coba lagi.");
                hideDialog();
            }
        });
    }
    function hideDialog()
    {
        document.getElementById("dialog").classList.add('transform');
        document.getElementById("dialog").classList.add('scale-0');
        setTimeout(()=>{
            document.getElementById("modal").classList.add('invisible');
        }, 150)
        document.getElementById("loading").classList.remove('invisible');
        document.getElementById("village_name").innerHTML = "...";
        document.getElementById("district_name").innerHTML = "...";
        document.getElementById("makanan_count").innerHTML = "...";
        document.getElementById("minuman_count").innerHTML = "...";
        document.getElementById("pakaian_count").innerHTML = "...";
        document.getElementById("pariwisata_count").innerHTML = "...";
    }
</script>
<div id="map" class="h-screen">

</div>
<div class="invisible min-w-screen h-screen transition fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" id="modal">
    <div class="absolute bg-black opacity-20 inset-0 z-0" onclick="hideDialog()"></div>
    <div id="dialog" class="transition duration-300 transform scale-0 w-full max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->
      <div class="flex justify-center" id="loading">
        <img class="animate-spin h-6" src="{{ asset('images/iconsax-linear/rotate-right.svg') }}" alt="">
      </div>
      <div class="flex">
        <div class="flex items-start w-full">
            <div class="mr-3">
                <img class="h-10" src="{{ asset('images/iconsax-linear/house-2.svg') }}">
            </div>
            <div class="flex flex-col">
                <div class="text-gray-900 font-medium text-xl" id="village_name">...</div>
                <div class="text-gray-500 text-sm" >Kecamatan <span id="district_name">...</span></div>
                {{-- <div class="text-sm mt-3">2.3 Kilometer dari lokasimu</div> --}}
                <div class="flex mt-1">
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
            <img class="ml-auto cursor-pointer w-10 h-10 hover:bg-gray-200 rounded-full p-2" src="{{ asset('images/iconsax-linear/close-circle.svg') }}" onclick="hideDialog()" alt="">
            {{-- <svg class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
             </svg> --}}
        </div>
      </div>
      <div class="flex mt-3">
          <hr class="w-full">
      </div>
      <div class="grid grid-cols-4 gap-2 mt-3">
        <a href="" id="makanan_link" class="flex flex-col justify-center text-center">
            <div class="flex bg-gray-100 rounded-md items-center p-9 transition transform hover:scale-110">
                <img class="w-full" src="{{ asset('images/icon-food2.png') }}" alt="">
            </div>
            <span class="mt-2"><strong id="makanan_count">...</strong> IKM</span>
            <span>Makanan</span>
        </a>
        <a href="" id="minuman_link" class="flex flex-col justify-center text-center">
            <div class="flex bg-gray-100 rounded-md items-center p-9 transition transform hover:scale-110">
                <img class="w-full" src="{{ asset('images/icon-beverage2.png') }}" alt="">
            </div>
            <span class="mt-2"><strong id="minuman_count">...</strong> IKM</span>
            <span>Minuman</span>
        </a>
        <a href="" id="pakaian_link" class="flex flex-col justify-center text-center">
            <div class="flex bg-gray-100 rounded-md items-center p-9 transition transform hover:scale-110">
                <img class="w-full" src="{{ asset('images/icon-cloth2.png') }}" alt="">
            </div>
            <span class="mt-2"><strong id="pakaian_count">...</strong> IKM</span>
            <span>Pakaian</span>
        </a>
        <a href="" id="pariwisata_link" class="flex flex-col justify-center text-center">
            <div class="flex bg-gray-100 rounded-md items-center p-9 transition transform hover:scale-110">
                <img class="w-full" src="{{ asset('images/icon-vacation2.png') }}" alt="">
            </div>
            <span class="mt-2"><strong id="pariwisata_count">...</strong> IKM</span>
            <span>Pariwisata</span>
        </a>
      </div>
    </div>
</div>
@endsection