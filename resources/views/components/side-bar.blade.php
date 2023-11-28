<div class="py-3 ">
    <div class="py-3 px-10  ">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Home') }}
        </x-nav-link>
    </div>
    <div class="py-3 px-10 ">
        <x-nav-link :href="route('payment')" :active="request()->routeIs('payment')">
            {{ __('Payment') }}
        </x-nav-link>
    </div>
    <div class="py-3 px-10 ">
        <x-nav-link :href="route('memberList')" :active="request()->routeIs('memberList')">
            {{ __('Member List') }}
        </x-nav-link>
    </div>
    <div class="py-3 px-10 ">
        <x-nav-link :href="route('dokumen')" :active="request()->routeIs('dokumen')">
            {{ __('Dokumen') }}
        </x-nav-link>
    </div>
</div>