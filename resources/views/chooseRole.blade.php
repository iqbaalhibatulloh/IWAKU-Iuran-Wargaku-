<x-guest-layout>
    <form method="POST" action="{{ route('updateRole') }}">
        @csrf
        @method('PUT')

        <div class="text-center">
            <h1 class="text-xl font-bold">Choose Role</h1>
        <h5 class="text-sm">Please note that phone verification is required for signup. Your number will only be used to verify your identity for security purposes.</h5>
        </div>

         {{-- No-Telp --}}
         <div class="mt-4">
            <x-input-label for="noTelp" :value="__('No Telp')" />
            <x-text-input id="text" class="block mt-1 w-full" type="noTelp" name="noTelp" :value="old('noTelp')" required autocomplete="noTelp" />
            <x-input-error :messages="$errors->get('noTelp')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
            {{-- <x-input-label for="role" :value="__('Role')" /> --}}
            <select id="role" name="role" class="dark:bg-white dark:text-black focus:border-indigo-500 dark:focus:border-indigo-600  rounded-md w-full shadow-sm border-2 border-gray-500">
              <option selected disabled>Role</option>              
              <option value="RW16">RW 16</option>
              <option value="RT01">RT 01</option>
              <option value="RT02">RT 02</option>
              <option value="RT03">RT 03</option>
              <option value="RT04">RT 04</option>
              <option value="RT05">RT 05</option>
          </select>
        </div>

         <!-- Rw -->
         <div class="mt-4 hidden" id="rw">
            
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
            {{-- <x-input-label for="role" :value="__('Role')" /> --}}
            <select name="rw" class="dark:bg-white dark:text-black focus:border-indigo-500 dark:focus:border-indigo-600  rounded-md w-full shadow-sm border-2 border-gray-500">
              <option selected disabled>Role</option>
              <option value="admin">Admin</option>
              @for ($i = 1 ; $i <= 21; $i++)
                            @if ($i >9)
                            <option value="RW{{$i}}">RW {{$i}}</option>
                              @else
                              <option value="RW0{{$i}}">RW 0{{$i}}</option>
                            @endif
                            @endfor
          </select>
        </div>
              
        <div class="flex items-center justify-end mt-4">
                    
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                {{ __('Save Role') }}
            </button>
        </div>
    </form>
    @push('js')
    <script>
        $(document).ready(function(){
            $('#role').change(function(){
                const role = $(this).val();
                // check if has word RW                    
                if(role.includes('RW')){
                    $('#rw').addClass('hidden');                        
                    $('select[name="rw"]').val(null);
                }else{
                    $('#rw').removeClass('hidden');
                }
            });
        });
    </script>
@endpush
</x-guest-layout>
