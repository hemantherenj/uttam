<script>
        function dashboard() {
            return {
                sidebarCollapsed: false,
                darkMode: false,
                showUserMenu: false,
                showNotifications: false,
                mobileSidebar: false,

                init() {
                    this.sidebarCollapsed = localStorage.getItem('sidebar') === 'true';
                    this.darkMode = localStorage.getItem('darkMode') === 'true';
                },
                toggleSidebar() {
                    this.sidebarCollapsed = !this.sidebarCollapsed;
                    localStorage.setItem('sidebar', this.sidebarCollapsed);
                },
                toggleDark() {
                    this.darkMode = !this.darkMode;
                    localStorage.setItem('darkMode', this.darkMode);
                }
            }
        }
    </script>

    <script>
        function dashboard() {
            return {
                sidebarCollapsed: false,
                darkMode: false,
                showUserMenu: false,
                showNotifications: false,
                mobileSidebar: false,
                submenuOpen: {},

                init() {
                    // Sidebar + Darkmode restore
                    this.sidebarCollapsed = localStorage.getItem('sidebar') === 'true';
                    this.darkMode = localStorage.getItem('darkMode') === 'true';

                    // Restore submenu states
                    let submenuState = localStorage.getItem('submenuState');
                    this.submenuOpen = submenuState ? JSON.parse(submenuState) : {};
                },

                toggleSidebar() {
                    this.sidebarCollapsed = !this.sidebarCollapsed;
                    localStorage.setItem('sidebar', this.sidebarCollapsed);
                },

                toggleDark() {
                    this.darkMode = !this.darkMode;
                    localStorage.setItem('darkMode', this.darkMode);
                },

                toggleSubmenu(key) {
                    this.submenuOpen[key] = !this.submenuOpen[key];
                    localStorage.setItem('submenuState', JSON.stringify(this.submenuOpen));
                }
            }
        }
    </script>