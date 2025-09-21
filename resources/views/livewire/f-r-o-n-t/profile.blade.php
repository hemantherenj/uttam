{{-- <div>
    <x-front.breadCrumb />
    <div class="container mx-auto pt-32">
        @guest
            <p class="text-gray-600 text-center">You are a guest. Please login.</p>
            <h1 class="text-2xl font-bold">Welcome, {{ auth('front')->user()->profile_for }}

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded mt-4">
                        Logout
                    </button>
                </form>

                {{ auth('web')->user()->name }}
            </h1>
        @endguest

        @auth
            @livewire('f-r-o-n-t.home')
            <p class="text-gray-600 text-center">You are a auth. Please login.</p>
            <h1 class="text-2xl font-bold">Welcome, {{ auth('front')->user()->profile_for }}</h1>

            
        @endauth
    </div>

    @if ($loggedIn)
        <div>
            <h1>Welcome, {{ auth()->user()->name }}</h1>
            <button wire:click="logout">Logout</button>
        </div>
    @else
        <form wire:submit.prevent="login">
            <!-- login form -->
        </form>
    @endif
</div> --}}

<div>
    {{-- <div class="pt-20">
        <h2>{{ auth('front')->user()->email }}</h2>
        @if (auth()->check())
            {{ auth('front')->user()->mobile }}
        @endif
    </div> --}}

    <div class="container mx-auto shadow-md p-5 pt-20">
        <div class="grid grid-cols md:grid-cols-3 gap-5">
            <div class="flex items-center border rounded-xl">
                <figure class="hover-gallery max-w-full p-2">
                    <img src="{{ url('storage/' . auth('front')->user()->image_one) }}" class="rounded-xl" />
                    <img src="{{ url('storage/' . auth('front')->user()->image_two) }}" class="rounded-xl" />
                    <img src="{{ url('storage/' . auth('front')->user()->image_three) }}" class="rounded-xl" />
                    <img src="{{ url('storage/' . auth('front')->user()->image_four) }}" class="rounded-xl" />
                    <img src="{{ url('storage/' . auth('front')->user()->image_five) }}" class="rounded-xl" />
                    {{-- <img src="https://img.daisyui.com/images/stock/daisyui-hat-4.webp" /> --}}
                </figure>

                {{-- <img src="{{ url('storage/' . auth('front')->user()->image_one) }}" alt="" class="border rounded-2xl"> --}}
            </div>
            <div class="flex flex-col justify-around">
                <h2>{{ auth('front')->user()->first_name }} {{ auth('front')->user()->last_name }}</h2>
                <p><b>Age:</b> {{ auth('front')->user()->dob }}</p>
                <p><b>Height:</b> 5 Ft 4 In</p>
                <p><b>Religion:</b> Hindu - Brahmin</p>
                <p><b>Caste:</b> Sharma</p>
                <p><b>Location:</b> India/ Up / Lucknow</p>
                <p><b>Education:</b> MBA</p>
                <p><b>Profession:</b> Accounts/ Finance</p>
                <p><b>Annual Income:</b> 2 - 3 Lakhs</p>
            </div>
            <div>
                <p class="text-xl py-2">{{ auth('front')->user()->about }}</p>
                <a href="{{ route('form') }}" wire:navigate class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>

    <div class="container mx-auto shadow-lg border border-gray-100 p-5 my-5">
        <h2 class="font-bold py-5">Personal Information</h2>

        <h3 class="font-bold"><i class="bi bi-gender-female text-danger me-1 align-middle"></i>About my
            {{ auth('front')->user()->profile_for }}</h3>
        <p>{{ auth('front')->user()->about }}</p>

        <h4 class="text-xl font-bold  py-5">Basic Details</h4>
        <div class="grid grid-cols-2 gap-2">
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <p>Name: </p>
                    <p>Age:</p>
                    <p>Height:</p>
                    <p>Weight:</p>
                    <p>Mother Tongue:</p>
                    <p>Marital Status:</p>
                </div>
                <div>
                    <p>{{ auth('front')->user()->first_name }} {{ auth('front')->user()->last_name }}</p>
                    <p>30 Yrs:</p>
                    <p>5 Ft 3 In / 160 Cms:</p>
                    <p>45 Kgs / 99 lbs:</p>
                    <p>Hindi:</p>
                    <p>Never married:</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <p>Body Type:</p>
                    <p>Complexion:</p>
                    <p>Physical Status:</p>
                    <p>Eating Habits:</p>
                    <p>Drinking Habits:</p>
                    <p>Smoking Habits:</p>
                </div>
                <div>
                    <p>Slim</p>
                    <p>Fair</p>
                    <p>Normal</p>
                    <p>Vegetarian</p>
                    <p>Never drinks</p>
                    <p>Never smokes</p>
                </div>
            </div>
        </div>

        <div class="flex justify-between w-[1100px] border-0 mx-auto items-start">
            <div>
                <h4 class="text-xl font-bold py-5">Contact Details</h4>
                <p>Contact Number: +(00) 123-456-7890</p>
                <p>Parent Contact: Available</p>
                <p>Chat Status: Online</p>
                <p>Send Mail: Online</p>
            </div>
            <div>
                <h4 class="text-xl font-bold py-5">Religion Information</h4>
                <p>Religion: Hindu</p>
                <p>Caste / Sub Caste: Brahmin Pandit / Brahmin</p>
                <p>Star / Raasi: Hastha / Kanya (Virgo)</p>
                <p>Dosh: Not Specified</p>
            </div>
        </div>

        <div class="flex justify-between w-[1200px] border-0 mx-auto items-start">
            <div>
                <h4 class="text-xl font-bold py-5">Bride's Location</h4>
                <p>Contact Number: +(00) 123-456-7890</p>
                <p>Parent Contact: Available</p>
                <p>Chat Status: Online</p>
                <p>Send Mail: Online</p>
            </div>
            <div>
                <h4 class="text-xl font-bold py-2">Religion Information</h4>
                <p>Religion: Hindu</p>
                <p>Caste / Sub Caste: Brahmin Pandit / Brahmin</p>
                <p>Star / Raasi: Hastha / Kanya (Virgo)</p>
                <p>Dosh: Not Specified</p>
            </div>
        </div>

        <div class="flex justify-between w-[1200px] border-0 mx-auto items-start">
            <div>
                <h4 class="text-xl font-bold pt-5 pb-2">Professional Information</h4>
                <p>Contact Number: +(00) 123-456-7890</p>
                <p>Parent Contact: Available</p>
                <p>Chat Status: Online</p>
                <p>Send Mail: Online</p>
            </div>
            <div>
                <h4 class="text-xl font-bold pt-5 pb-2">Astro Details</h4>
                <p>Religion: Hindu</p>
                <p>Caste / Sub Caste: Brahmin Pandit / Brahmin</p>
                <p>Star / Raasi: Hastha / Kanya (Virgo)</p>
                <p>Dosh: Not Specified</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto shadow-lg border border-gray-100 p-5 my-5">
        <h2 class="text-2xl font-bold">Personal Information</h2>

        <h4 class="text-xl"><i class="bi bi-gender-female text-danger me-1 align-middle"></i>About my daughter</h4>
        <p>My daughter is a Manager with a Master's degree currently working in Private sector in Gurgaon. We come from
            a Middle class, Nuclear family background with Traditional values.</p>

        <h4 class="text-xl font-bold py-2">Basic Details</h4>
        <div class="grid grid-cols-2 gap-2">
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <p>Name:</p>
                    <p>Age:</p>
                    <p>Height:</p>
                    <p>Weight:</p>
                    <p>Mother Tongue:</p>
                    <p>Marital Status:</p>
                </div>
                <div>
                    <p>Semper</p>
                    <p>30 Yrs:</p>
                    <p>5 Ft 3 In / 160 Cms:</p>
                    <p>45 Kgs / 99 lbs:</p>
                    <p>Hindi:</p>
                    <p>Never married:</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <p>Body Type:</p>
                    <p>Complexion:</p>
                    <p>Physical Status:</p>
                    <p>Eating Habits:</p>
                    <p>Drinking Habits:</p>
                    <p>Smoking Habits:</p>
                </div>
                <div>
                    <p>Slim</p>
                    <p>Fair</p>
                    <p>Normal</p>
                    <p>Vegetarian</p>
                    <p>Never drinks</p>
                    <p>Never smokes</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2">
            <div>
                <h4 class="text-xl font-bold py-2">Contact Details</h4>
                <p>Contact Number: +(00) 123-456-7890</p>
                <p>Parent Contact: Available</p>
                <p>Chat Status: Online</p>
                <p>Send Mail: Online</p>
            </div>
            <div>
                <h4 class="text-xl font-bold py-2">Religion Information</h4>
                <p>Religion: Hindu</p>
                <p>Caste / Sub Caste: Brahmin Pandit / Brahmin</p>
                <p>Star / Raasi: Hastha / Kanya (Virgo)</p>
                <p>Dosh: Not Specified</p>
            </div>
        </div>

        <div class="grid grid-cols-2">
            <div>
                <h4 class="text-xl font-bold py-2">Bride's Location</h4>
                <p>Contact Number: +(00) 123-456-7890</p>
                <p>Parent Contact: Available</p>
                <p>Chat Status: Online</p>
                <p>Send Mail: Online</p>
            </div>
            {{-- <div>
                <h4 class="text-xl font-bold py-2">Religion Information</h4>
                <p>Religion: Hindu</p>
                <p>Caste / Sub Caste: Brahmin Pandit / Brahmin</p>
                <p>Star / Raasi: Hastha / Kanya (Virgo)</p>
                <p>Dosh: Not Specified</p>
            </div> --}}
        </div>

        <div class="grid grid-cols-2">
            <div>
                <h4 class="text-xl font-bold py-2">Professional Information</h4>
                <p>Contact Number: +(00) 123-456-7890</p>
                <p>Parent Contact: Available</p>
                <p>Chat Status: Online</p>
                <p>Send Mail: Online</p>
            </div>
            <div>
                <h4 class="text-xl font-bold py-2">Astro Details</h4>
                <p>Religion: Hindu</p>
                <p>Caste / Sub Caste: Brahmin Pandit / Brahmin</p>
                <p>Star / Raasi: Hastha / Kanya (Virgo)</p>
                <p>Dosh: Not Specified</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('contextmenu', function(e) {
        if (e.target.tagName === 'IMG') {
            e.preventDefault();
        }
    });
</script>



