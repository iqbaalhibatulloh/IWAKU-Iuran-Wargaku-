<div class="py-3 ">
    <div class="py-3 px-10  ">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Home') }}
        </x-nav-link>
    </div>
    <div class="py-3 px-10 ">
        <x-nav-link :href="route('payment.index')" :active="Route::is('payment.*')">
            {{ __('Payment') }}
        </x-nav-link>
    </div>
    <div class="py-3 px-10 ">
        <x-nav-link :href="route('memberList.index')" :active="\Route::is('memberList.*') ? true : false">
            {{ __('Member List') }}
        </x-nav-link>
        
    </div>
    <div class="py-3 px-10 ">
        <x-nav-link :href="route('document.doc')" :active="\Route::is('document.*') ? true : false">
            {{ __('Dokumen') }}
        </x-nav-link>
    </div>
</div>