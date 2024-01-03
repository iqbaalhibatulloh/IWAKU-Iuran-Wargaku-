@extends('layouts.app')

@section('content')
<div class="col-span-3 ">
    <div class="mt-7 mx-7 col-span-3 text-center">
        Payment
    </div>
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 bg-[#4C3B2A] mt-10 h-72 px-2 overflow-y-auto relative ">
        {{-- <h2 class="border-b-2 sticky top-0">Iuran Bulanan</h2>
        <h2 class="text-xl" >Data yang belum bayar iuran bulan Desember</h2> --}}
        <div class="sticky top-0 bg-[#4C3B2A] z-10">
            <h2 class="border-b-2 sticky top-0 text-2xl">Iuran Bulanan</h2>
            <h2 class="text-base" >Data yang belum bayar iuran bulan Desember</h2>
        </div>
        <div class="w-full px-7 my-5 overflow-y-auto text-sm ">
            <table id="example1" class="display " style="width:100%" class="">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @forelse ($wargas as $item)
                            @if($item)
                        @empty
                        
                        @endforelse
                        <td></td>
                        <td>System Architect</td>
                        <td>Iqbaal Hibatulloh</td>
                        <td>RT05</td>
                        <td>2011-04-25</td>
                        <td class="flex gap-3 justify-center">
                            <a href="opsiPayment">
                            <button class="flex justify-center rounded-lg bg-blue-500 w-16 h-9 items-center">
                            Bayar
                            </button>
                        </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 bg-[#4C3B2A] mt-10 h-72 px-2 overflow-y-auto relative">
        <div class="sticky top-0 bg-[#4C3B2A] z-10">
        <h2 class="border-b-2 sticky top-0 text-2xl"> Iuran Ronda</h2>
        <h2 class="text-base">Data yang belum bayar iuran bulan Sampah</h2>
    </div>
    <div class="w-full px-7 my-5 overflow-y-auto text-sm">
        <table id="example2" class="display" style="width:100%" class="">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>010101</td>
                    <td>Iqbaal Hibatulloh</td>
                    <td>RT05</td>
                    <td>Menetap</td>
                    <td class="flex gap-3 justify-center">
                        <a href="opsiPayment">
                        <button class="flex justify-center rounded-lg bg-blue-500 w-16 h-9 items-center">
                        Bayar
                        </button>
                    </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 bg-[#4C3B2A] mt-10 h-72 px-2 overflow-y-auto relative">
        <div class="sticky top-0 bg-[#4C3B2A] z-10">
        <h2 class="border-b-2 sticky top-0  text-2xl"> Iuran Sampah</h2>
        <h2 class="text-base">Data yang belum bayar iuran Ronda</h2>
    </div>
    <div class="w-full px-7 my-5 overflow-y-auto text-sm">
        <table id="example3" class="display" style="width:100%" class="">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>010101</td>
                    <td>Iqbaal Hibatulloh</td>
                    <td>RT05</td>
                    <td>Menetap</td>
                    <td class="flex gap-3 justify-center">
                        <a href="opsiPayment">
                        <button class="flex justify-center rounded-lg bg-blue-500 w-16 h-9 items-center">
                        Bayar
                        </button>
                    </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    {{-- <div class="col-span-3 shadow-2xl rounded-xl mx-7 bg-[#4C3B2A] mt-10 h-72  px-2 overflow-y-auto relative">
        <div class="sticky top-0 bg-[#4C3B2A] z-10">
        <h2 class="border-b-2 sticky top-0">Iuran Ronda</h2>
        <h2 class="text-xl">Data yang belum bayar iuran bulan Ronda</h2>
    </div>
    
    </div> --}}
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 bg-[#4C3B2A] mt-10 h-max px-2 mb-7 overflow-y-auto relative">
        <div class="sticky top-0 bg-[#4C3B2A] z-10">
        <h2 class="border-b-2 sticky top-0  text-2xl">Iuran THR</h2>
        <h2 class="text-base">Data yang belum bayar iuran bulan THR</h2>
    </div>
    <div class="w-full px-7 my-5 overflow-y-auto text-sm text-center">
        <table id="example4" class="display" style="width:100%" class="">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
               {{-- @foreach ($wargas as $item) --}}
               <tr>
                {{-- <td>{{$loop->iteration}}</td>
                <td>{{$item->id}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->status}}</td> --}}
                <td>1</td>
                <td>010101</td>
                <td>Iqbaal</td>
                <td>RT01</td>
                <td>Menetap</td>
                <td class="flex gap-3 justify-center">
                    <a href="opsiPayment">
                    <button class="flex justify-center rounded-lg bg-blue-500 w-16 h-9 items-center">
                    Bayar
                    </button>
                </a>
                </td>
            </tr>
               {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
    </div>
  </div>
@endsection

