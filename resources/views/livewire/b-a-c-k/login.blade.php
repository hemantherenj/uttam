<!-- Login Card -->
<div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 w-full max-w-md animate-fade-in">

    <!-- Logo / Heading -->
    <div class="flex flex-col items-center mb-6">
        <div class="w-16 h-16 bg-indigo-500 rounded-full flex items-center justify-center text-white text-2xl font-bold">
            🔒
        </div>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-4">Welcome Back</h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm">Please login to continue</p>
    </div>

    <!-- Form -->
    <form wire:submit.prevent="login" class="space-y-5">
        <div>
            <label class="block text-gray-700 dark:text-gray-300 text-sm mb-1">Email</label>
            <input type="email" placeholder="you@example.com" wire:model="email"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                      focus:ring-2 focus:ring-indigo-500 outline-none 
                      bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 text-sm mb-1">Password</label>
            <input type="password" placeholder="••••••••" wire:model="password"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                      focus:ring-2 focus:ring-indigo-500 outline-none 
                      bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center text-gray-600 dark:text-gray-300">
                <input type="checkbox" wire:model="remember"  class="mr-2">
                Remember me
            </label>
            <a href="#" class="text-indigo-500 hover:underline">Forgot Password?</a>
        </div>

        <button type="submit"
            class="w-full py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow">
            Login
        </button>
    </form>

    <!-- Divider -->
    {{-- <div class="flex items-center my-6">
      <div class="flex-grow h-px bg-gray-300 dark:bg-gray-600"></div>
      <span class="px-3 text-gray-400 text-sm">or</span>
      <div class="flex-grow h-px bg-gray-300 dark:bg-gray-600"></div>
    </div> --}}

    <!-- Social Login -->
    {{-- <div class="flex space-x-4">
      <button class="flex-1 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
        Google
      </button>
      <button class="flex-1 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
        Facebook
      </button>
    </div> --}}

    <!-- Footer -->
    {{-- <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-6">
      Don’t have an account? 
      <a href="#" class="text-indigo-500 hover:underline">Sign up</a>
    </p> --}}

    <!-- Dark Mode Toggle -->
    <div class="absolute top-4 right-4">
        <button @click="darkMode = !darkMode"
            class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
            <span x-show="!darkMode">🌙</span>
            <span x-show="darkMode">☀️</span>
        </button>
    </div>
</div>

