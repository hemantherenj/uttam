<aside class="bg-gray-600 dark:bg-gray-800 shadow-md transition-all duration-300 hidden md:block relative"
    :class="sidebarCollapsed ? 'w-16' : 'w-64'">
    <div class="flex items-center justify-between h-16 px-4">
        <span x-show="!sidebarCollapsed" class="text-lg font-bold text-white dark:text-gray-200">
            Dashboard
        </span>
        <button @click="toggleSidebar()" class="text-white dark:text-gray-300">
            <span class="material-icons">menu</span>
        </button>
    </div>

    <nav class="mt-4 space-y-1">
        <!-- Simple Menu -->
        <a href="{{ route('admin') }}" wire:navigate
            class="flex items-center px-4 py-2 text-white dark:text-gray-200 hover:bg-gray-200 hover:text-gray-700 dark:hover:bg-gray-700">
            <span class="material-icons">home</span>
            <span x-show="!sidebarCollapsed" class="ml-2">Home</span>
        </a>

        <!-- Settings with submenu -->
        <div class="relative group">
            <button @click="toggleSubmenu('settings')"
                class="flex items-center w-full px-4 py-2 text-white hover:text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">
                <span class="material-icons">settings</span>
                <span x-show="!sidebarCollapsed" class="ml-2 flex-1 text-left">Settings</span>
                <span x-show="!sidebarCollapsed" class="material-icons transform transition-transform duration-200"
                    :class="submenuOpen['settings'] ? 'rotate-180' : ''">
                    expand_more
                </span>
            </button>

            <!-- Expanded Mode Submenu -->
            <div x-show="submenuOpen['settings'] && !sidebarCollapsed" x-transition class="ml-12 space-y-1" x-cloak>
                <a href="{{ route('admin.profiles') }}" wire:navigate
                    class="block px-2 py-1 text-white dark:text-gray-300 hover:bg-gray-500 dark:hover:bg-gray-700 rounded">
                    Profile Settings
                </a>
                <a href="#"
                    class="block px-2 py-1 text-white dark:text-gray-300 hover:bg-gray-500 dark:hover:bg-gray-700 rounded">
                    Security
                </a>
                <a href="#"
                    class="block px-2 py-1 text-white dark:text-gray-300 hover:bg-gray-500 dark:hover:bg-gray-700 rounded">
                    Billing
                </a>
            </div>

            <!-- Collapsed Mode Hover Submenu -->
            <div x-show="sidebarCollapsed"
                class="absolute left-full top-0 mt-0 hidden group-hover:block w-48 bg-white dark:bg-gray-800 shadow-lg rounded-lg p-2 z-50">
                <a href="{{ route('admin.profiles') }}" wire:navigate
                    class="block px-3 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
                    Profile Settings
                </a>
                <a href="{{ route('admin.products') }}" wire:navigate
                    class="block px-3 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
                    Security
                </a>
                <a href="#"
                    class="block px-3 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
                    Billing
                </a>
            </div>
        </div>
    </nav>
</aside>



<!-- Mobile Sidebar -->
<div class="fixed inset-0 z-30 flex md:hidden" x-show="mobileSidebar"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50" @click="mobileSidebar = false"></div>

    <!-- Sidebar Panel -->
    <aside class="relative bg-white dark:bg-gray-800 w-64 shadow-lg p-4 transform transition-transform"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
        <button class="mb-4 text-gray-600 dark:text-gray-300" @click="mobileSidebar = false">
            <span class="material-icons">close</span>
        </button>

        <nav class="space-y-1">
            <a href="#"
                class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">Home</a>

            <!-- Submenu in mobile -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center w-full px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">
                    <span class="flex-1 text-left">Settings</span>
                    <span class="material-icons transform transition-transform duration-200"
                        :class="open ? 'rotate-180' : ''">
                        expand_more
                    </span>
                </button>

                <div x-show="open" x-transition class="ml-6 space-y-1" x-cloak>
                    <a href="#"
                        class="block px-2 py-1 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Profile
                        Settings</a>
                    <a href="#"
                        class="block px-2 py-1 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Security</a>
                    <a href="#"
                        class="block px-2 py-1 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Billing</a>
                </div>
            </div>
        </nav>
    </aside>
</div>
