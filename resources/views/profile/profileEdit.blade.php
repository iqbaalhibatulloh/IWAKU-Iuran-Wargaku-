@extends('layouts.app')
@section('content')

<div class="col-span-3"> 
    <div class="col-span-3 shadow-2xl rounded-xl mx-7 mb-7 bg-[#4C3B2A] mt-10 px-7 py-5 h-96 ">
        <a class="" href="{{route('profile.edit')}}">
            <svg fill="#ffffff" version="1.1" baseProfile="tiny" id="Layer_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" width="30px" height="30px" viewBox="0 0 42 42" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon fill-rule="evenodd" points="31,38.32 13.391,21 31,3.68 28.279,1 8,21.01 28.279,41 "></polygon> </g></svg>
         </a>
        <h2 class=" text-xl" >
         <div class="flex mx-20 my-5 p-5 justify-between">
          <button>
          <div class="flex-col gap-6">
           <form action="{{route('profile.update')}}" method="POST" class="flex justify-between ">
            <h1>{{$name}} : &ensp;</h1>
            <input id="lihat" type="{{ $type }}" name="{{ $name }}" value="{{ ($name == 'password') ? '' : old($name, auth()->user()->$name) }}" class="bg-[#4C3B2A] border-none text-white font-bold">
            @csrf
            @method("PATCH")
            <button type="submit">
              <svg fill="#ffffff" height="15px" width="15px" version="1.1" id="XMLID_287_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="next"> <g> <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 "></polygon> </g> </g> </g></svg>
            </button>
        </form>
          </div>
          @if ($name=="password")
          <button id="lihatBtn" onclick="togglePassword()" >lihat</button>
          @endif
        </button>        
         </div>
        </h2>
    </div>
  </div>

</div>






@endsection

