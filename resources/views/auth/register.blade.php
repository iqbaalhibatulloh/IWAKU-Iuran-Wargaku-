<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="text-center">
            <h1 class="text-xl font-bold">Create your account</h1>
        <h5 class="text-sm">Please note that phone verification is required for signup. Your number will only be used to verify your identity for security purposes.</h5>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- No-Telp --}}
        <div class="mt-4">
            <x-input-label for="noTelp" :value="__('No Telp')" />
            <x-text-input id="text" class="block mt-1 w-full pl-3" type="noTelp" name="noTelp" :value="old('noTelp')" required autocomplete="noTelp" />
            <x-input-error :messages="$errors->get('noTelp')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
            {{-- <x-input-label for="role" :value="__('Role')" /> --}}
            <select id="role" name="role" class="dark:bg-white dark:text-black focus:border-indigo-500 dark:focus:border-indigo-600  rounded-md w-full shadow-sm border-2 border-gray-500">
              <option selected disabled>Role</option>
              <option value="admin">Admin</option>
              @for ($i = 1 ; $i <= 21; $i++)
              @if ($i >9)
              <option value="RW{{$i}}">RW {{$i}}</option>
                @else
                <option value="RW0{{$i}}">RW 0{{$i}}</option>
              @endif
              @endfor
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

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-3 text-center">
            Already have an account ? <a href="{{ route('login') }}" class="underline">Log In</a>
            <h1>OR</h1>
        </div>

        {{-- white goggle --}}
        <div class="mt-3"> 
            <a href="{{ URL::to("googleLogin") }}">
            <x-primary-button class="w-full h-10  justify-center">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg " class="pr-2">
                    <g clip-path="url(#clip0_50_914)">
                    <path d="M22.0001 11.2439C22.0134 10.4877 21.9338 9.73268 21.7629 8.99512H11.2246V13.0773H17.4105C17.2933 13.793 17.0296 14.4782 16.6352 15.0915C16.2409 15.7048 15.724 16.2336 15.1158 16.6461L15.0942 16.7828L18.4264 19.3125L18.6571 19.3351C20.7772 17.4162 21.9997 14.5928 21.9997 11.2439" fill="#4285F4"></path>
                    <path d="M11.2245 22C14.255 22 16.7992 21.0222 18.6577 19.3355L15.1156 16.6465C14.1679 17.2945 12.8958 17.7467 11.2245 17.7467C9.80508 17.7386 8.42433 17.2926 7.27814 16.4721C6.13195 15.6516 5.27851 14.4982 4.83892 13.1755L4.70737 13.1865L1.24255 15.8143L1.19727 15.9377C2.13043 17.7603 3.56252 19.2925 5.33341 20.3631C7.10429 21.4338 9.14416 22.0005 11.2249 22" fill="#34A853"></path>
                    <path d="M4.83889 13.1756C4.59338 12.4754 4.46669 11.7405 4.46388 11.0001C4.4684 10.2609 4.59041 9.52697 4.82552 8.82462L4.81927 8.6788L1.31196 6.00879L1.19724 6.06226C0.410039 7.59392 0 9.28503 0 11C0 12.715 0.410039 14.4061 1.19724 15.9377L4.83889 13.1756" fill="#FBBC05"></path>
                    <path d="M11.2249 4.25337C12.8333 4.22889 14.3888 4.8159 15.565 5.89121L18.7329 2.86003C16.7011 0.992106 14.0106 -0.0328008 11.2249 3.27798e-05C9.14418 -0.000452376 7.10433 0.566279 5.33345 1.63686C3.56256 2.70743 2.13046 4.23965 1.19727 6.06218L4.82684 8.82455C5.27077 7.50213 6.12703 6.34962 7.27491 5.5295C8.4228 4.70938 9.80439 4.26302 11.2249 4.25337" fill="#EB4335"></path>
                    </g>
                    <defs>
                    <clipPath id="clip0_50_914">
                    <rect width="22" height="22" fill="white"></rect>
                    </clipPath>
                    </defs>
                    </svg>
               Continue white google
            </x-primary-button>
            </a>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="ms-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" >
                {{ __('Register') }}
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
