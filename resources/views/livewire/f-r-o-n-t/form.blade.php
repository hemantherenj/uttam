<div>
    <div class="pt-16">
        <div class="container mx-auto">
            <div class="border-1 border-gray-100 shadow-2xl ">

                {{-- <form class="p-10 mx-auto"> --}}
                <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-5xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Registration Form</h2>
                        <form wire:submit.prevent="update" enctype="multipart/form-data">
                            {{-- <input type="hidden" value="{{ Auth::id() }}" wire:model="{{ Auth::id() }}"> --}}
                            <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">

                                <div class="sm:col-span-3">
                                    <label for="image_one"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                                        Image</label>
                                    <input type="file" name="image_one" id="image_one" wire:model="image_one"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="First Name">
                                    <span class="text-gray-500 font-medium">PNG, JPG or JPEG (MAX. 800x400px).</span>
                                    <br>
                                    <div wire:loading wire:target="image_one">
                                        {{-- <div class="skeleton img-preview"></div> --}}
                                        <span class="loading loading-dots loading-xl"></span>
                                    </div>
                                </div>
                                {{-- image Preview --}}
                                <div
                                    class="border-0 p-1 border-gray-200 shadow h-[160px] w-[160px] rounded text-center mx-auto">

                                    @if ($image_one)
                                        <img src="{{ $image_one->temporaryUrl() }}" alt="New Preview"
                                            class="img-preview object-cover h-[160px] w-[160px] rounded border-2 p-0.5 border-gray-500">
                                    @elseif (!auth('front')->user()->image_one == '')
                                        <img src="{{ asset('storage/' . auth('front')->user()->image_one) }}"
                                            @class([
                                                'img-preview object-cover h-[160px] w-[160px] rounded border-2 p-0.5 border-gray-500',
                                                'transition-transform duration-1000 ease-in-out',
                                                'hidden' => $image_one,
                                            ])>
                                    @else
                                        <img src="{{ asset('images/NoImage.jpg') }}"
                                            class="img-preview object-cover h-[160px] w-[160px] rounded border-2 p-0.5 border-gray-500">
                                    @endif

                                </div>

                                <div class="sm:col-span-2">
                                    <label for="first_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                        Name</label>
                                    <input type="text" name="first_name" id="first_name" wire:model="first_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="First Name">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                        Name</label>
                                    <input type="text" name="last_name" id="last_name" wire:model="last_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Last Name">
                                </div>
                                <div class="w-full">
                                    <label for="gender"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                    <fieldset class="flex gap-10 pt-2">
                                        <div class="flex items-center mb-4">
                                            <input id="gender" type="radio" name="male" value="male"
                                                wire:model="gender"
                                                class="w-5 h-5 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="male"
                                                class="block ms-2  text-lg font-medium text-gray-900 dark:text-gray-300">
                                                Male
                                            </label>
                                        </div>

                                        <div class="flex items-center mb-4">
                                            <input id="gender" type="radio" name="female" value="female"
                                                wire:model="gender"
                                                class="w-5 h-5 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="female"
                                                class="block ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                                                Female
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="w-full">
                                    <label for="dob"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of
                                        Birth</label>
                                    <input type="date" name="dob" id="dob" wire:model="dob"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="$2999">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                        Address</label>
                                    <input type="text" name="email" id="email" wire:model="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="email@email.com">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="mobile"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile
                                        Number</label>
                                    <input type="text" name="mobile" id="mobile" wire:model="mobile"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="+91 XXXXXXXXXX">
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="height"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Height
                                        (cm)</label>
                                    <input type="text" name="height" id="height" wire:model="height"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="in CM">
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="weight"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight
                                        (kg)</label>
                                    <input type="text" name="weight" id="weight" wire:model="weight"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="in KG">
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="mother_tongue"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mother
                                        Tongue</label>
                                    <select id="mother_tongue" wire:model="mother_tongue"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select Mother Tongue</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="english">English</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="telegu">Telegu</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="marital_status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marital
                                        Status</label>
                                    <select id="marital_status" wire:model="marital_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select Marital Status</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="english">English</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="telegu">Telegu</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="body_type"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body
                                        Type</label>
                                    <select id="body_type" wire:model="body_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select Body Type</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="english">English</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="telegu">Telegu</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="complexion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Complexion</label>
                                    <select id="complexion" wire:model="complexion"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select Complexion</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="english">English</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="telegu">Telegu</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="physical_status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Physical
                                        Status</label>
                                    <select id="physical_status" wire:model="physical_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select Physical Status</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="english">English</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="telegu">Telegu</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="eating_habits"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Eating
                                        Habits</label>
                                    <select id="eating_habits" wire:model="eating_habits"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select Eating Habits</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="english">English</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="telegu">Telegu</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="drinking_habits"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Drinking
                                        Habits</label>
                                    <select id="drinking_habits" wire:model="drinking_habits"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select Drinking Habits</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="english">English</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="telegu">Telegu</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="smoking_habits"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Smoking
                                        Habits</label>
                                    <select id="smoking_habits" wire:model="smoking_habits"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select Smoking Habits</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="english">English</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="telegu">Telegu</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="education"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Education</label>
                                    <input type="text" name="education" id="education" wire:model="education"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="education">
                                </div>
                                <div class="sm:col-span-4">
                                    <label for="address"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <input type="text" name="address" id="address" wire:model="address"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="address">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="city"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">city</label>
                                    <input type="text" name="city" id="city" wire:model="city"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="city">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="state"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">state</label>
                                    <input type="text" name="state" id="state" wire:model="state"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="state">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="pincode"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">pincode</label>
                                    <input type="text" name="pincode" id="pincode" wire:model="pincode"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="pincode">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="country"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">country</label>
                                    <input type="text" name="country" id="country" wire:model="country"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="country">
                                </div>
                                <div class="sm:col-span-4">
                                    <label for="about"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">about</label>
                                    <textarea id="about" rows="8" wire:model="about"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Your about here"></textarea>
                                    @error('about')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="sm:col-span-1">

                                    <label for="image_two"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                        Image
                                        <div wire:loading wire:target="image_two">
                                            {{-- <div class="skeleton img-preview"></div> --}}
                                            <span class="loading loading-dots loading-xs"></span>
                                        </div>
                                    </label>
                                    <input type="file" wire:model="image_two"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        accept="image/jpeg, image/png, image/*" placeholder="Profile Image">

                                    @error('image_two')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror



                                    {{-- Conditional Image Preview --}}
                                    {{-- @if ($image_two)
                                        @if (is_object($image_two) && method_exists($image_two, 'temporaryUrl'))
                                            <img src="{{ $image_two->temporaryUrl() }}" alt="New Preview"
                                                class="img-preview">
                                        @elseif ($oldImage)
                                            Old Preview:
                                            <img src="{{ url('storage/' . $oldImage) }}" class="img-preview">
                                        @else
                                            My Preview:
                                            <img src="{{ asset('storage/' . auth('front')->user()->image_two) }}" class="img-preview">
                                        @endif
                                    @endif --}}


                                    <div class="pt-2">
                                        @if ($image_two)
                                            <img src="{{ $image_two->temporaryUrl() }}" alt="New Preview"
                                                class="img-preview  rounded border-2 p-0.5 border-gray-500">
                                        @elseif (!auth('front')->user()->image_two == '')
                                            <img src="{{ asset('storage/' . auth('front')->user()->image_two) }}"
                                                @class([
                                                    'img-preview rounded border-2 p-0.5 border-gray-500',
                                                    'transition-transform duration-1000 ease-in-out',
                                                    'hidden' => $image_two,
                                                ])>
                                        @else
                                            <img src="{{ asset('images/NoImage.jpg') }}"
                                                class="img-preview rounded border-2 p-0.5 border-gray-500">
                                        @endif
                                    </div>

                                </div>
                                <div class="sm:col-span-1">
                                    <label for="image_three"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                        Image
                                        <div wire:loading wire:target="image_three">
                                            {{-- <div class="skeleton img-preview"></div> --}}
                                            <span class="loading loading-dots loading-xs"></span>
                                        </div>
                                    </label>
                                    <input type="file" wire:model="image_three"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Image">

                                    <div class="pt-2">

                                        @if ($image_three)
                                            <img src="{{ $image_three->temporaryUrl() }}" alt="New Preview"
                                                class="img-preview  rounded border-2 p-0.5 border-gray-500">
                                        @elseif (!auth('front')->user()->image_three == '')
                                            <img src="{{ asset('storage/' . auth('front')->user()->image_three) }}"
                                                @class([
                                                    'img-preview rounded border-2 p-0.5 border-gray-500',
                                                    'transition-transform duration-1000 ease-in-out',
                                                    'hidden' => $image_three,
                                                ])>
                                        @else
                                            <img src="{{ asset('images/NoImage.jpg') }}"
                                                class="img-preview rounded border-2 p-0.5 border-gray-500">
                                        @endif
                                    </div>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="image_four"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                        Image
                                        <div wire:loading wire:target="image_four">
                                            {{-- <div class="skeleton img-preview"></div> --}}
                                            <span class="loading loading-dots loading-xs"></span>
                                        </div>
                                    </label>
                                    <input type="file" wire:model="image_four"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Image">

                                    <div class="pt-2">

                                        @if ($image_four)
                                            <img src="{{ $image_four->temporaryUrl() }}" alt="New Preview"
                                                class="img-preview  rounded border-2 p-0.5 border-gray-500">
                                        @elseif (!auth('front')->user()->image_four == '')
                                            <img src="{{ asset('storage/' . auth('front')->user()->image_four) }}"
                                                @class([
                                                    'img-preview rounded border-2 p-0.5 border-gray-500',
                                                    'transition-transform duration-1000 ease-in-out',
                                                    'hidden' => $image_four,
                                                ])>
                                        @else
                                            <img src="{{ asset('images/NoImage.jpg') }}"
                                                class="img-preview rounded border-2 p-0.5 border-gray-500">
                                        @endif
                                    </div>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="image_five"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                        Image
                                        <div wire:loading wire:target="image_five">
                                            {{-- <div class="skeleton img-preview"></div> --}}
                                            <span class="loading loading-dots loading-xs"></span>
                                        </div>
                                    </label>
                                    <input type="file" wire:model="image_five"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Image">

                                    <div class="pt-2">

                                        @if ($image_five)
                                            <img src="{{ $image_five->temporaryUrl() }}" alt="New Preview"
                                                class="img-preview  rounded border-2 p-0.5 border-gray-500">
                                        @elseif (!auth('front')->user()->image_five == '')
                                            <img src="{{ asset('storage/' . auth('front')->user()->image_five) }}"
                                                @class([
                                                    'img-preview rounded border-2 p-0.5 border-gray-500',
                                                    'transition-transform duration-1000 ease-in-out',
                                                    'hidden' => $image_five,
                                                ])>
                                        @else
                                            <img src="{{ asset('images/NoImage.jpg') }}"
                                                class="img-preview rounded border-2 p-0.5 border-gray-500">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-block py-2.5 mt-4  btn-primary">UPDATE</button>
                            {{-- <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 cursor-pointer">
                                Add product
                            </button> --}}
                        </form>
                    </div>
                </section>
                {{-- </form> --}}



            </div>
        </div>
    </div>
</div>
