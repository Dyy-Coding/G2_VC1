<header class="bg-white shadow sticky top-0 z-50">
  <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <!-- Logo -->
      <div class="flex items-center">
        <a href="/welcome">
          <img class="h-10 w-auto" src="https://as1.ftcdn.net/v2/jpg/03/49/15/22/1000_F_349152257_LWXemAKac8x18qvLyVHPnRXfsGIAF9oR.jpg" alt="Logo">
        </a>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-8">
        <a href="/welcome" class="px-3 py-2 rounded-md text-sm transition-all duration-300 nav-link" data-link="/welcome">Home</a>
        <a href="/about" class="px-3 py-2 rounded-md text-sm transition-all duration-300 nav-link" data-link="/about">About</a>
        <a href="/sales" class="px-3 py-2 rounded-md text-sm transition-all duration-300 nav-link" data-link="/sales">Shop</a>
        <a href="/contact" class="px-3 py-2 rounded-md text-sm transition-all duration-300 nav-link" data-link="/contact">Contact</a>
      </div>

      <!-- Profile and Logout (direct buttons, no dropdown) -->
      <div class="flex items-center space-x-4">
        <!-- Profile -->
        <a href="/profile" class="text-gray-500 hover:text-indigo-600">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 14c3.866 0 7-2.686 7-6s-3.134-6-7-6-7 2.686-7 6 3.134 6 7 6zM4 18c0-2.485 4.515-3 8-3s8 .515 8 3v2H4v-2z" />
          </svg>
        </a>

        <!-- Logout -->
        <a href="/logout" class="text-gray-500 hover:text-indigo-600">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H3" />
          </svg>
        </a>
      </div>

      <!-- Mobile Menu Button -->
      <div class="md:hidden flex items-center">
        <button id="mobile-menu-button" class="text-gray-700 hover:text-indigo-600 focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden mt-2 space-y-1">
      <a href="/welcome" class="block px-3 py-2 rounded-md text-base font-medium transition-all duration-300 mobile-link" data-link="/welcome">Home</a>
      <a href="/about" class="block px-3 py-2 rounded-md text-base font-medium transition-all duration-300 mobile-link" data-link="/about">About</a>
      <a href="/sales" class="block px-3 py-2 rounded-md text-base font-medium transition-all duration-300 mobile-link" data-link="/sales">Shop</a>
      <a href="/contact" class="block px-3 py-2 rounded-md text-base font-medium transition-all duration-300 mobile-link" data-link="/contact">Contact</a>
      <a href="/logout" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-100">Logout</a>
    </div>
  </nav>
</header>

<script>
  // Mobile menu toggle
  const btn = document.getElementById('mobile-menu-button');
  const menu = document.getElementById('mobile-menu');
  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });

  // Highlight current page
  const currentPath = window.location.pathname;
  document.querySelectorAll('.nav-link, .mobile-link').forEach(link => {
    if (link.getAttribute('data-link') === currentPath) {
      link.classList.add('text-indigo-600', 'font-semibold');
    } else {
      link.classList.add('text-gray-700', 'hover:text-indigo-600');
    }
  });
</script>
