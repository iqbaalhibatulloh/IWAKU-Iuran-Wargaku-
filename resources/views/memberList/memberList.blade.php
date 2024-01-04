@extends('layouts.app')

@section('content')

<div class="mt-7 mx-7 col-span-3 text-center">
  {{ auth()->user()->rw ? auth()->user()->rw : auth()->user()->role }}
  <h1 class="text-right">
   <!-- Modal toggle -->
<div class="flex justify-end">
  <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button">
      Tambah Warga
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
                       Tambah Warga
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
                        <div class="col-span-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                            <input type="text" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ID" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                            <select name="rt" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option selected disabled>RT</option>
                            @for ($i = 1 ; $i <= 5; $i++)
                            <option value="RT0{{$i}}">RT 0{{$i}}</option>
                            @endfor
                          </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
                            <select name="rw" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option selected disabled>RW</option>
                            @for ($i = 1 ; $i <= 21; $i++)
                            @if ($i >9)
                            <option value="RW{{$i}}">RW {{$i}}</option>
                              @else
                              <option value="RW0{{$i}}">RW 0{{$i}}</option>
                            @endif
                            @endfor
                          </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option selected disabled>Status</option>
                              <option value="menetap">Menetap</option>
                              <option value="ngontrak">Ngontrak</option>
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
<div class="col-span-3">
  @for ($i = 1; $i <= 5; $i++)
  <a href="{{route('memberList.show.byrt', "RT0" . $i)}}" class="block col-span-3 shadow-2xl rounded-xl mb-5 mx-7 bg-[#4C3B2A] text-center py-10">
      <button>
        <h2>RT0{{$i}}</h2>
        <h5 class="text-sm">Total warga: {{$rtTotals["RT0$i"]}}</h5>
      </button>    
  </a>
  @endfor
</div>

@endsection