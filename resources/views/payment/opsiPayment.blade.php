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
<div class="flex justify-end col-span-3 mr-7 hidden">
    <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button">
        Payment all
      </button>
    </div>
  
      <!-- Main modal -->
      <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative p-4 w-full max-w-xl max-h-full">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                         Payment mounth
                      </h3>
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                  </div>
                  <!-- Modal body -->
                  <form class="p-4 md:p-5" action="{{route("warga.store")}}" method="POST">
                    @csrf
                      <div class="grid gap-4 mb-4 grid-cols-2">
                         <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bulan</label>
                            <select name="rt" id="category" class="select2-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option selected disabled>Bulan</option>
                            @for ($i = 1 ; $i <=12 ; $i++)
                            <option value="{{$monthNames[$i]}}">{{$monthNames[$i]}}</option>
                            @endfor
                            <option value="all">All mounth</option>
                          </select>
                        </div>
                        
                          
                      </div>
                      <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">  
                         Save
                      </button>
                  </form>
              </div>
          </div>
      </div> 
      <!-- Modal toggle -->
    </h1>
  </div>

@endsection

