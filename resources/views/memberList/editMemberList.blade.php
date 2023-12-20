@extends('layouts.app')
@section('content')

<div class="col-span-3"> 
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 mb-7 bg-[#4C3B2A] mt-10 px-7 py-5 h-96 ">
        <a class="" href="{{route('profile.edit')}}">
            <svg fill="#ffffff" version="1.1" baseProfile="tiny" id="Layer_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" width="30px" height="30px" viewBox="0 0 42 42" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon fill-rule="evenodd" points="31,38.32 13.391,21 31,3.68 28.279,1 8,21.01 28.279,41 "></polygon> </g></svg>
         </a>

         <form class="p-4 md:p-5" action="{{route("memberList.update")}}" method="POST">
          @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
              <div class="col-span-1">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                  <input type="text" name="id" value="{{$warga->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ID" required="">
              </div>
              <div class="col-span-2 sm:col-span-1">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                  <input type="text" name="name" value="{{$warga->name}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama" required="">
              </div>
                
              <div class="col-span-2 sm:col-span-1">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                <select name="rt" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option disabled>RT</option>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i > 9 )
                        <option value="RT0{{$i}}" @if($warga == "RT0$i") selected @endif>RT 0{{$i}}</option>
                        @else
                        <option value="RT0{{$i}}" @if($warga->rt == "RT0$i") selected @endif>RT 0{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div>
            {{-- {{ dd($warga->rw) }} --}}
            <div class="col-span-2 sm:col-span-1">
              <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
              <select name="rw" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option disabled>RW</option>
                  @for ($i = 1; $i <= 21; $i++)
                      @if ($i > 9 )
                      <option value="RW{{$i}}" @if($warga->rw == "RW$i") selected @endif>RW {{$i}}</option>
                      @else
                      <option value="RW0{{$i}}" @if($warga->rw == "RW0$i") selected @endif>RW 0{{$i}}</option>
                      @endif
                  @endfor
              </select>
          </div>
          

          <div class="col-span-2 sm:col-span-1">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option disabled>Status</option>
                <option value="menetap" @if($warga->status == "menetap") selected @endif>Menetap</option>
                <option value="ngontrak" @if($warga->status == "ngontrak") selected @endif>Ngontrak</option>
            </select>
        </div>
        
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">  
              Save
           </button>

<input type="hidden" value="{{$warga->id}}" name="id">

        </form>
    </div>
  </div>

</div>






@endsection





