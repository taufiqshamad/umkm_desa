@extends('layout.master')

@php
    
@endphp

@section('content')
    <div class="flex container mx-auto px-14 mt-16 flex-col pb-40">

        <div class="flex mt-6">
            <h1 class="text-3xl font-medium">Semua IKM</h1>
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
        <div class="flex mt-4 w-full flex-col">
            {{ $UMKMs->links() }}
        </div>
    </div>
@endsection