@extends('layouts.app')
@section('content')
<div class="mt-7 mx-7 col-span-3 text-center">
  <a class="" href="{{ \route('payment.index') }}">
      <svg fill="#ffffff" version="1.1" baseProfile="tiny" id="Layer_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" width="30px" height="30px" viewBox="0 0 42 42" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon fill-rule="evenodd" points="31,38.32 13.391,21 31,3.68 28.279,1 8,21.01 28.279,41 "></polygon> </g></svg>
   </a>
   Iuran {{ $category[0]->name }} : {{ $warga->name }} 
  {{-- {{$wargas->first()->alamat}} --}}
</div>

  @foreach ($paymentStatus['month'] as $key => $month)
  <div class="w-full shadow-2xl rounded-xl bg-[#4C3B2A] m-1 py-2 justify-center">
      <p class="text-center">{{ $month }}</p>
      <div class="text-center flex justify-center items-center w-full">
        <form class="payment" action="{{ route("payment.store", ['warga' => $warga, 'category' => $category[0]->name]) }}" method="POST">
            {{-- DATE IN THIS MONTH INPUT VALUEE --}}
            {{-- month name to date can? --}}
            @csrf
            @php
            // Convert the numeric index to a Carbon instance
            $carbonMonth = \Carbon\Carbon::createFromFormat('n', $key + 1);

            // Get the first day of the month
            $firstDayOfMonth = $carbonMonth->startOfMonth()->format('Y-m-d');
        @endphp
             <input class="hidden" type="date" name="date" value="{{ $firstDayOfMonth }}">
          <button type="submit" method="" class="paymeny-button w-max bg-[#CA8D6E] rounded-xl px-2">
          
            {{-- STATUS INPUT VALUE --}}
            {{ $paymentStatus['status'][$key] ? "Rp. " . $category[0]->price : "Rp. 0" }}
          </button> 
        </form>
      </div>
  </div> 
@endforeach

@endsection

