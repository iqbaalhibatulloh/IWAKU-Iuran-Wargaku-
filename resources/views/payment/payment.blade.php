@extends('layouts.app')

@section('content')
<div class="col-span-3 ">
    <div class="mt-7 mx-7 col-span-3 text-center">
        Payment
    </div>
   
    {{-- Table Ctegory--}}
    @foreach ($results as $index => $item)
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 bg-[#4C3B2A] mt-10 h-72 px-2 overflow-y-auto relative ">      
        <div class="sticky top-0 bg-[#4C3B2A] z-10">
            <h2 class="border-b-2 sticky top-0 text-2xl">Iuran {{ $index }}</h2>
            <h2 class="text-base" >Data yang belum bayar iuran bulan {{ \Carbon\Carbon::now()->formatLocalized('%B') }}</h2>
        </div>
        <div class="w-full px-7 my-5 overflow-y-auto text-sm ">
            <table id="{{ $index }}" class="display " style="width:100%" class="">
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
                    @foreach ($item as $item)
                    <tr>                          
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->rt . " , " . $item->rw }}</td>
                        <td>{{$item->status}}</td>
                        <td class="flex gap-3 justify-center">
                            <a href="{{ route("payment.detailPayment.warga", ["warga" => $item, "category" => $index]) }}">
                            <button class="flex justify-center rounded-lg bg-blue-500 w-16 h-9 items-center">
                            Bayar
                            </button>
                        </a>
                        </td>
                    </tr>                          
                    @endforeach                                                                          
                </tbody>
            </table>
        </div>
    </div>
    @endforeach


  </div>
@endsection

