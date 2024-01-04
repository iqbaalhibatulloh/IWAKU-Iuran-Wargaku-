@extends('layouts.app')
@section('content')
<div class="mt-7 mx-7 col-span-3 text-center ">
    <a class="" href="{{ \route('home') }}">
        <svg fill="#ffffff" version="1.1" baseProfile="tiny" id="Layer_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" width="30px" height="30px" viewBox="0 0 42 42" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon fill-rule="evenodd" points="31,38.32 13.391,21 31,3.68 28.279,1 8,21.01 28.279,41 "></polygon> </g>
        </svg>
    </a>
   {{ $warga->name }}
  {{-- {{$wargas->first()->alamat}} --}}
</div>
<div class=" flex col-span-3 relative mx-5 h-48  "> 
    <a href="{{ Route("payment.detailPayment.warga", ["warga" => $warga, "category" => "Bulanan"]) }}" class="w-full rounded-xl bg-[#4C3B2A] m-1 py-2 items-center justify-center text-center flex px-2">
        <button type="" method="" >
            Iuran Bulanan 
        </button>
    </a>
    <a href="{{ Route("payment.detailPayment.warga", ["warga" => $warga, "category" => "Ronda"]) }}" class="w-full rounded-xl bg-[#4C3B2A] m-1 py-2 items-center justify-center text-center flex px-2">
        <button type="" method="" >
            Iuran Ronda 
        </button>
    </a>
</div>
<div class=" flex col-span-3 relative mx-5 mb-7 h-48    "> 
    <a href="{{ Route("payment.detailPayment.warga", ["warga" => $warga, "category" => "Sampah"]) }}" class="w-full rounded-xl bg-[#4C3B2A] m-1 py-2 items-center justify-center text-center flex px-2">
        <button type="" method="" >
            Iuran Sampah 
        </button>
    </a>
    <a href="{{ Route("payment.detailPayment.warga", ["warga" => $warga, "category" => "THR"]) }}" class="w-full rounded-xl bg-[#4C3B2A] m-1 py-2 items-center justify-center text-center flex px-2">
        <button type="" method="" >
            Iuran THR 
        </button>
    </a>
</div>

@endsection

