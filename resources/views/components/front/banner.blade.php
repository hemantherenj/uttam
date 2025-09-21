<section class="pt-20 pb-16 px-8 md:px-12 bg-blue-500">
    <div class="max-w-7xl mx-auto md:flex md:items-center md:justify-between">
        <div class="md:flex-1 md:mr-6">
            <h1 class="font-bold text-4xl md:text-5xl text-white leading-tight">
                The Quickest way to Chat with your Loved Ones
            </h1>
            <p class="mt-4 text-lg text-white">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis aspernatur magni vitae
                veritatis.
            </p>
        </div>
        @if (auth('front')->check())
            <div class="p-[200px]"></div>
        @else
            {{-- <x-FRONT.RegisterForm /> --}}

            <div class="md:flex-1">
                {{-- <img src="https://res.cloudinary.com/thirus/image/upload/v1632162912/logos/chat_ys7mog.svg"
                    alt="Chat with loved ones" /> --}}
                <div class="bg-gray-50 p-8 rounded-md shadow-xl">
                    <form wire:submit.prevent="register">
                        <div class="py-2">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Create
                                profile
                                for</label>
                            <select name="" id="" wire:model="profile_for"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com">
                                <option value="">Select</option>
                                <option value="son">Son</option>
                                <option value="daughter">Daughter</option>
                                <option value="brother">Brother</option>
                                <option value="sister">Sister</option>
                                <option value="relative">Relative</option>
                                <option value="other">Other</option>
                            </select>
                            @error('profile_for')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                Address</label>
                            <input type="text" name="email" id="email" wire:model="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="info@gmail.com">
                            @error('email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="mobile"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile
                                No.</label>
                            <input type="text" name="mobile" id="mobile" wire:model="mobile"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="+91">
                            @error('mobile')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Create
                                Password</label>
                            <input type="password" name="password" id="password" wire:model="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Type Password">
                            @error('password')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="confim_password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                Password</label>
                            <input type="password" name="password" id="password" wire:model="password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Type Password">
                        </div>
                        {{-- <div class="py-2">
            <input type="checkbox" class="checkbox" /> I agree to the <a class="cursor-pointer text-red-600"
                onclick="terms_conditions.showModal()">Terms & Conditions</a> and <a class="cursor-pointer text-red-600"
                onclick="privacy_policy.showModal()">Privacy Policy</a>
        </div> --}}
                        <div class="py-2">
                            {{-- <button type="submit" class="btn btn-block btn-primary">Register For Free</button> --}}
                            <button type="submit"
                                class="btn btn-block btn-primary"
                                wire:loading.attr="disabled" wire:target="register">
                                <span wire:loading.remove wire:target="register">
                                    REGISTER FREE
                                </span>

                                <span wire:loading wire:target="register">
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</section>
