<header class="flex items-center justify-between h-16 bg-gray-600 dark:bg-gray-800 px-4 shadow-md">
    <div class="flex items-center">
        <!-- Mobile Sidebar Toggle -->
        <button class="md:hidden text-white dark:text-gray-300" @click="mobileSidebar = !mobileSidebar">
            <span class="material-icons">menu</span>
        </button>
    </div>

    <div class="flex items-center space-x-4">
        <!-- Dark Mode Toggle -->
        <button @click="toggleDark()" class="text-white dark:text-gray-300">
            <span x-show="!darkMode" class="material-icons">dark_mode</span>
            <span x-show="darkMode" class="material-icons">light_mode</span>
        </button>

        <!-- Notifications -->
        <div class="relative" @click.outside="showNotifications = false">
            <button @click="showNotifications = !showNotifications" class="text-white dark:text-gray-300 relative">
                <span class="material-icons">notifications</span>
                <!-- Example Badge -->
                <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full px-1">3</span>
            </button>
            <div x-show="showNotifications"
                class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-700 shadow-lg rounded-lg py-2 z-10">
                <p class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">No new notifications</p>
            </div>
        </div>

       
        <!-- User Dropdown with Photo -->
        <div class="relative" @click.outside="showUserMenu = false">
            <button @click="showUserMenu = !showUserMenu" class="flex items-center text-white dark:text-gray-300">
                <!-- User Photo -->
                <img src="https://i.pravatar.cc/40" alt="User" class="w-8 h-8 rounded-full mr-2">
                <!-- User Name -->
                <span class="mr-1">{{ auth('user')->user()->name }}</span>
                <span class="material-icons">expand_more</span>
            </button>
            <div x-show="showUserMenu" x-transition
                class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 shadow-lg rounded-lg py-2 z-10">
                <a href="#"
                    class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-white">Profile</a>
                <a href="#"
                    class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-white">Settings</a>
                <a href=""
                    class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-white">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                            Logout
                        </button>
                    </form>
                    {{-- Logout --}}
                </a>
            </div>
        </div>

    </div>
</header>
