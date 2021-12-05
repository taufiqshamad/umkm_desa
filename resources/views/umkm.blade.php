@extends('layout.master')

@php
    
@endphp

@section('content')
    <div class="flex container mx-auto px-14 mt-16 flex-col pb-40">
        
        <div class="flex flex-row">
            <span class="text-gray-500">Semua UMKM</span>
            <span class="mx-2">/</span>
            <span>{{ $village->name }}</span>
        </div>

        <div class="flex mt-6">
            <h1 class="text-3xl font-medium">IKM dan Tempat Wisata di {{ $village->name }}</h1>
        </div>

        <div class="flex mt-10 border-b border-gray-200">
            <div class="w-full grid grid-cols-5 gap-2 text-center text-sm">
                <a href="{{ route('umkm.all', $village->id) }}" class="flex py-3 justify-center items-center hover:bg-gray-300 {{ empty($category)?"border-b-4 border-green-700":""}}">
                    <img class="h-5 mr-2" src="{{ asset('images/iconsax-linear/category.svg') }}">
                    <span class="{{ empty($category)?"text-green-700":""}}">Semua</span>
                </a>
                <a href="{{ route('umkm.by_category', [$village->id, 'makanan']) }}" class="flex py-3 justify-center items-center hover:bg-gray-300 {{ $category=="makanan"?"border-b-4 border-green-700":""}}">
                    <img class="h-5 mr-2" src="{{ $category=="makanan"?asset('images/icon-food2.png'):asset('images/icon-food-black.png') }}">
                    <span class="{{ $category=="makanan"?"text-green-700":""}}">Makanan</span>
                </a>
                <a href="{{ route('umkm.by_category', [$village->id, 'minuman']) }}" class="flex py-3 justify-center items-center hover:bg-gray-300 {{ $category=="minuman"?"border-b-4 border-green-700":""}}">
                    <img class="h-5 mr-2" src="{{ $category=="minuman"?asset('images/icon-beverage2.png'):asset('images/icon-beverage-black.png') }}">
                    <span class="{{ $category=="minuman"?"text-green-700":""}}">Minuman</span>
                </a>
                <a href="{{ route('umkm.by_category', [$village->id, 'pakaian']) }}" class="flex py-3 justify-center items-center hover:bg-gray-300 {{ $category=="pakaian"?"border-b-4 border-green-700":""}}">
                    <img class="h-5 mr-2" src="{{ $category=="pakaian"?asset('images/icon-cloth2.png'):asset('images/icon-cloth-black.png') }}">
                    <span class="{{ $category=="pakaian"?"text-green-700":""}}">Pakaian</span>
                </a>
                <a href="{{ route('umkm.by_category', [$village->id, 'pariwisata']) }}" class="flex py-3 justify-center items-center hover:bg-gray-300 {{ $category=="pariwisata"?"border-b-4 border-green-700":""}}">
                    <img class="h-5 mr-2" src="{{ $category=="pariwisata"?asset('images/icon-vacation2.png'):asset('images/icon-vacation-black.png') }}">
                    <span class="{{ $category=="pariwisata"?"text-green-700":""}}">Pariwisata</span>
                </a>
            </div>
        </div>

        <div class="flex mt-10">
            <div class="grid grid-cols-3 items-center h-12 gap-4 w-full">
                <div class="col-span-1">
                    <h2 class="text-lg font-medium text-green-700">"{{ $UMKMs->count() }} UMKM"</h2>
                </div>
                <div class="col-span-2">
                    <div class="flex justify-end w-full">
                        <div class="flex bg-gray-100 rounded-full flex-auto mr-4">
                            <div class="flex items-center justify-center pl-6">
                                <img class="filter contrast-0" src="{{ asset('images/iconsax-linear/search-normal.svg') }}">
                            </div>
                            <input type="text" class="px-4 py-0 focus:outline-none border-none bg-gray-100 w-full rounded-tr-full rounded-r-full" placeholder="Cari IKM">
                        </div>
                        <div class="flex h-16 flex-row items-center gap-4">
                            <span>Filter :</span>
                            <a href="" class="flex px-3 py-2 hover:bg-gray-200 rounded-full">
                                <span class="font-medium">Terpopuler</span>
                                <img class="h-5 ml-2" src="{{ asset('images/iconsax-linear/setting-3.svg') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex mt-10">
            <div class="grid grid-cols-4 gap-4">
                @foreach($UMKMs as $umkm)
                    <x-u-m-k-m
                    :umkm="$umkm"
                    ></x-u-m-k-m>
                @endforeach
            </div>
        </div>
    </div>
@endsection