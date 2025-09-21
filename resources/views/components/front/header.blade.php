<header
    class="
            fixed
            w-full
            bg-blue-500
            flex
            justify-between
            items-center
            px-4
            md:px-12
            transition-all
            duration-200
            h-18
            z-50
            shadow-sm
         "
    :class="{ 'h-18': !scrolledFromTop, 'h-14': scrolledFromTop }">
    <a href="#">
        <div class="text-3xl font-bold text-white transform origin-left transition duration-200"
            :class="{ 'scale-100': !scrolledFromTop, 'scale-75': scrolledFromTop }">UttamAshish</div>
        {{-- <img src="https://res.cloudinary.com/thirus/image/upload/v1631988912/logos/chitchat-logo_pkpwwu.png"
                alt="ChitChat Logo" class="h-12 transform origin-left transition duration-200"
                :class="{ 'scale-100': !scrolledFromTop, 'scale-75': scrolledFromTop }" /> --}}
    </a>
    <nav>
        <button class="md:hidden" @click="navOpen = !navOpen">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <ul class="
                  fixed
                  left-0
                  right-0
                  min-h-screen
                  px-4
                  pt-8
                  space-y-4
                  bg-blue-500
                  text-white
                  transform
                  transition
                  duration-300
                  translate-x-full
                  md:relative md:flex md:space-x-10 md:min-h-0 md:px-0 md:py-0 md:space-y-0 md:translate-x-0
               "
            :class="{ 'translate-x-full': !navOpen }" :class="{ 'translate-x-0': navOpen }">
            <li class="text-lg font-medium">
                <a href="{{ route('home') }}" wire:navigate @click="navOpen = false">Home</a>
            </li>
            <!-- <li class="text-lg font-medium">
                <a href="#features" class="" @click="navOpen = false">Features</a>
            </li> -->
            <!-- <li class="text-lg font-medium">
                <a href="#about" @click="navOpen = false">About</a>
            </li> -->
            <li class="text-lg font-medium">
                <a href="#contact" @click="navOpen = false">Contact</a>
            </li>
            <button class="btn btn-primary block md:hidden">Login</button>
        </ul>
    </nav>

    @if (auth('front')->check())
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="text-white cursor-pointer m-1">
                {{ auth('front')->user()->first_name }} {{ auth('front')->user()->profile_for }}</div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                <li><a href="{{ route('profile') }}" wire:navigate>Profile</a></li>
                {{-- <li><a href="{{ route('form') }}" wire:navigate>Form</a></li> --}}
                <li><a>Settings</a></li>
                <li>
                    <a wire:click='logout'>Logout</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded mt-4">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        {{-- <button class="btn btn-warning btn-sm" wire:click='logout'>Yes Logout it!</button> --}}
    @else
        {{-- <a href="{{ route('login') }}" wire:navigate class="btn btn-primary">Login</a> --}}
        {{-- <button class="btn btn-primary hidden md:block" onclick="my_modal_3.showModal()">Login</button> --}}
        <button href="{{ route('login') }}" wire:navigate class="btn btn-primary hidden md:block">Login</button>
    @endif

</header>

<!-- You can open the modal using ID.showModal() method -->
{{-- <button class="btn" onclick="my_modal_3.showModal()">open modal</button> --}}
<dialog id="my_modal_3" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-lg font-bold">Login</h3>
        <div>
            @livewire('f-r-o-n-t.login')
        </div>
    </div>
</dialog>
