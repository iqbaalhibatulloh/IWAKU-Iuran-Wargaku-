@extends('layouts.app')

@section('content')
<div class="mt-7 mx-7 col-span-3 text-center">
    Home
</div>
<div class="col-span-3">
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 bg-[#4C3B2A] mt-5 h-52 px-2">
        <h2 class="border-b-2">Bulan Ini</h2>
        @foreach ($categories as $item)
        <h2 class="text-xl ">Yang belum bayar iuran {{$item}} {{$results[$item]}} orang</h2>
        @endforeach
    </div>
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 bg-[#4C3B2A] mt-10 h-52 px-2">
        <h2 class="border-b-2"> Transaksi terakhir</h2>
        @foreach ($categories as $item)
        <h2 class="text-xl ">Yang sudah bayar iuran {{$item}} {{$wargaUdahBayar[$item]}} orang</h2>
        @endforeach
    </div>
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 bg-[#4C3B2A] mt-10 h-52 px-2">
        <h2 class="border-b-2"> Berita Terkini</h2>
        <h2 class="text-3xl" ></h2>
    </div>
  </div>
@endsection