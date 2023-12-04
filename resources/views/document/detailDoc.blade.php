@extends('layouts.app')

@section('content')

<div class="mt-7 mx-7 col-span-3 text-center">
 
  RW16
  
</div>
<div class="col-span-3">
 
  <a href=" {{ \route('document.docPemasukan') }} " class="block col-span-3 shadow-2xl rounded-xl mb-10 mx-7 bg-[#4C3B2A] text-center ">
      <button>
        <h2 class="py-20">Pemasukan</h2>
      </button>    
  </a>
  <a href="{{ \route('document.docPengeluaran') }}" class="block col-span-3 shadow-2xl rounded-xl mb-10 mx-7 bg-[#4C3B2A] text-center ">
      <button>
        <h2 class="py-20">Pengeluaran</h2>
      </button>    
  </a>
 </div>

@endsection