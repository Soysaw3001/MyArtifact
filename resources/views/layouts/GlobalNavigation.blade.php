@section('GlobalNavigation')
    <nav id="navi">
        <ul class="wrapper">
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>
            <li><x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                    {{ __('Index') }}
                </x-nav-link>
            </li>
        </ul>
    </nav>
    <!--
    <div class="glovalNavigation">
       <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
            {{ __('Index') }}
        </x-nav-link>
    </div>-->
@endsection