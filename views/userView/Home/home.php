<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }
        @media (max-width: 768px) {
            .carousel-item img {
                height: 300px;
            }
        }
        /* Custom styles for the horizontal scrollable container */
        .scroll-container {
            display: flex;
            flex-wrap: nowrap; /* Ensures items stay in a single row */
            overflow-x: auto; /* Enables horizontal scrolling */
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none; /* Hides scrollbar in Firefox */
            -ms-overflow-style: none; /* Hides scrollbar in IE and Edge */
        }
        .scroll-container::-webkit-scrollbar {
            display: none; /* Hides scrollbar in Chrome, Safari, and Opera */
        }
        .scroll-container > div {
            flex: 0 0 auto; /* Prevents cards from shrinking or growing */
            scroll-snap-align: start; /* Snaps to the start of each card */
            margin-right: 1rem; /* Space between cards */
        }
        .scroll-container > div:last-child {
            margin-right: 0; /* Removes margin from the last card */
        }
        /* Arrow buttons */
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
        }
        .arrow-left {
            left: 10px;
        }
        .arrow-right {
            right: 10px;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-50">
    <nav class="bg-white-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <!--
                    Icon when menu is closed.

                    Menu open: "hidden", Menu closed: "block"
                -->
                <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!--
                    Icon when menu is open.

                    Menu open: "block", Menu closed: "hidden"
                -->
                <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                <img class="h-8 w-auto" src="https://as1.ftcdn.net/v2/jpg/03/49/15/22/1000_F_349152257_LWXemAKac8x18qvLyVHPnRXfsGIAF9oR.jpg" alt="Your Company">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class=" px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">Home</a>
                    <a href="#" class=" px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">About</a>
                    <a href="/sales" class="px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">Shop</a>
                    <a href="#" class=" px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">Contact</a>
                </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                </button>

                <!-- Profile dropdown -->
                <div class="relative ml-3">
                <div>
                    <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </button>
            </div>
            </div>
            <?php  ?>
                <span class="ml-3">User name</span>
            <?php  ?>
            <a href="/login" class="rounded-md bg-gray-700 px-3 py-2 text-sm font-medium text-white ml-5" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Home</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
            </div>
        </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Banner Carousel -->
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://t3.ftcdn.net/jpg/05/61/55/22/360_F_561552282_mGKd3af96Iw4TAjVj1NT8E9G6SNgxrPc.jpg" class="d-block w-100" alt="Summer Collection">
                    <div class="carousel-caption d-flex flex-col items-center justify-center h-full text-white">
                        <h2 class="text-4xl md:text-5xl font-bold mb-2">Building Materials</h2>
                        <p class="text-lg md:text-xl mb-4">Starting at $20.00</p>
                        <a href="#" class="btn bg-indigo-600 text-white hover:bg-indigo-700 transition-colors px-6 py-2 rounded-full">Shop Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://bsmedia.business-standard.com/_media/bs/img/article/2024-12/08/full/1733676029-4514.jpg?im=FeatureCrop,size=(826,465)" class="d-block w-100" alt="New Arrivals">
                    <div class="carousel-caption d-flex flex-col items-center justify-center h-full text-white">
                        <h2 class="text-4xl md:text-5xl font-bold mb-2">New Arrivals</h2>
                        <p class="text-lg md:text-xl mb-4">Starting at $15.00</p>
                        <a href="#" class="btn bg-indigo-600 text-white hover:bg-indigo-700 transition-colors px-6 py-2 rounded-full">Shop Now</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Categories -->
        <section class="py-12 ">
            <div class="container">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-8">Categories</h2>
                <div class="scrollable-container">
                    <div class="relative">
                        <!-- Arrows -->
                        <div class="arrow arrow-left" onclick="scrollLeft()">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </div>
                        <div class="arrow arrow-right" onclick="scrollRight()">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <!-- Scrollable Content -->
                        <div class="scroll-container">
                            <?php foreach ($categories as $category) : ?>
                                <div class="bg-white rounded-lg shadow-md mb-10 p-4 w-64 hover:shadow-lg transition-transform transform hover:scale-105">
                                    <img src="https://m.media-amazon.com/images/I/71lMSi5mQaL._AC_UF894,1000_QL80_.jpg" class="w-full h-32 object-contain p-4" alt="Clothes">
                                    <div class="text-center">
                                        <h5 class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($category['CategoryName']) ?></h5>
                                        <p class="text-gray-500 text-sm"><?= htmlspecialchars($category['CategoryName']) ?></p>
                                        <a href="/category" class="mt-2 inline-block bg-indigo-600 text-white py-2 px-4 rounded-full hover:bg-indigo-700 transition-colors">Show All</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <script>
                    const container = document.querySelector('.scroll-container');
                            
                            function scrollLeft() {
                                container.scrollBy({ left: 300, behavior: 'smooth' });
                            }

                            function scrollRight() {
                                container.scrollBy({ left: 300, behavior: 'smooth' });
                            }
                </script>
        </div>
            </div>
        </section>

        <!-- Products -->
        <section class="py-12 bg-white">
            <div class="container">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-8">New Arrivals</h2>
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col">
                        <div class="bg-gray-50 rounded-lg shadow-md p-4 hover:shadow-lg transition-all">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhM5fYda5b0pNuQuX_RKXGxu4wD1KssFN4Nd25W4ibhCtgNoY8ZNsi7B9KuqDZpJ88g9P-efIJDGdsXrDuACQpM8rHBwmX4Hzyebsh6FXfwRzUeyYmIOOnwGHCXENalJoNjpvxd2WKyVso/s1600/steel-construction-1733848_960_720+%25281%2529.webp" class="w-full h-48 object-cover rounded-t-lg" alt="T-shirt">
                            <div class="p-4">
                                <h5 class="text-lg font-semibold text-gray-800">Reinforcement No.1</h5>
                                <p class="text-gray-500 text-sm">New Arrival!</p>
                                <div class="flex justify-between items-center mt-3">
                                    <div>
                                        <span class="text-indigo-600 font-bold">$50.00</span>
                                        <del class="text-gray-400 text-sm ml-2">$80.00</del>
                                    </div>
                                    <a href="#" class="bg-indigo-600 text-white py-1 px-3 rounded-full hover:bg-indigo-700 transition-colors">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-gray-50 rounded-lg shadow-md p-4 hover:shadow-lg transition-all">
                            <img src="https://www.jkcement.com/wp-content/uploads/2024/09/sand-quarry-excavating-equipment-bulldozer-with-heap-sand-gravel-1024x663-jpg.webp" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                            <div class="p-4">
                                <h5 class="text-lg font-semibold text-gray-800">Sand No.1</h5>
                                <p class="text-gray-500 text-sm">New Arrival!</p>
                                <div class="flex justify-between items-center mt-3">
                                    <div>
                                        <span class="text-indigo-600 font-bold">$45.00</span>
                                        <del class="text-gray-400 text-sm ml-2">$55.00</del>
                                    </div>
                                    <a href="#" class="bg-indigo-600 text-white py-1 px-3 rounded-full hover:bg-indigo-700 transition-colors">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-gray-50 rounded-lg shadow-md p-4 hover:shadow-lg transition-all">
                            <img src="https://media.istockphoto.com/id/173627444/photo/bricks.jpg?s=612x612&w=0&k=20&c=4XgsgPO4f-j-mqP-grM9fm4WyIFnJVz7_alMHxL3llo=" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                            <div class="p-4">
                                <h5 class="text-lg font-semibold text-gray-800">Bricks No.1</h5>
                                <p class="text-gray-500 text-sm">New Arrival!</p>
                                <div class="flex justify-between items-center mt-3">
                                    <div>
                                        <span class="text-indigo-600 font-bold">$25.00</span>
                                        <del class="text-gray-400 text-sm ml-2">$55.00</del>
                                    </div>
                                    <a href="#" class="bg-indigo-600 text-white py-1 px-3 rounded-full hover:bg-indigo-700 transition-colors">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-gray-50 rounded-lg shadow-md p-4 hover:shadow-lg transition-all">
                            <img src="https://www.3ds.com/assets/invest/styles/banner/public/2023-02/glass-verre-1.jpg.webp?itok=7KYfddzR" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                            <div class="p-4">
                                <h5 class="text-lg font-semibold text-gray-800">Glass No.2</h5>
                                <p class="text-gray-500 text-sm">New Arrival!</p>
                                <div class="flex justify-between items-center mt-3">
                                    <div>
                                        <span class="text-indigo-600 font-bold">$45.00</span>
                                        <del class="text-gray-400 text-sm ml-2">$65.00</del>
                                    </div>
                                    <a href="#" class="bg-indigo-600 text-white py-1 px-3 rounded-full hover:bg-indigo-700 transition-colors">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="py-12">
            <div class="container">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-8">Our Services</h2>
                <div class="row row-cols-1 row-cols-md-5 g-4 d-flex justify-center align-items-center">
                    <div class="col">
                        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                            <ion-icon name="boat-outline" class="text-4xl text-indigo-600 mb-3"></ion-icon>
                            <h5 class="text-lg font-semibold text-gray-800">Home delivery</h5>
                            <p class="text-gray-500 text-sm">For Orders Over $100</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                            <ion-icon name="rocket-outline" class="text-4xl text-indigo-600 mb-3"></ion-icon>
                            <h5 class="text-lg font-semibold text-gray-800">Next Day Delivery</h5>
                            <p class="text-gray-500 text-sm">Orders Only</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                            <ion-icon name="rocket-outline" class="text-4xl text-indigo-600 mb-3"></ion-icon>
                            <h5 class="text-lg font-semibold text-gray-800">Buy from shop</h5>
                            <p class="text-gray-500 text-sm">For all costumer</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="text-white px-8 py-6 bg-blue-950">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="mb-8 md:mb-0">
                <h3 class="text-lg font-bold mb-4">About Us</h3>
                <p class="mb-2 w-80">At Lim Tri depot, we are dedicated to providing high-quality construction materials to builders, contractors, and DIY enthusiasts. With years of experience in the industry, we pride ourselves on our commitment to excellence and customer satisfaction.</p>
            </div>
            <div class="mb-8 md:mb-0">
                <h3 class="text-lg font-bold mb-4">Products</h3>
                <ul>
                    <li><a href="#" class="hover:text-yellow-400">Concrete & Cement</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Aggregates</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Steel & Rebar</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Insulation Materials</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Roofing Supplies</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Tools & Equipment</a></li>
                </ul>
            </div>
            <div class="mb-8 md:mb-0">
                <h3 class="text-lg font-bold mb-4">Services</h3>
                <ul>
                    <li><a href="#" class="hover:text-yellow-400">Delivery Services</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Custom Orders</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Consultation & Support</a></li>
                </ul>
            </div>
            <div class="mb-8 md:mb-0">
                <h3 class="text-lg font-bold mb-4">Location</h3>
                <p class="mb-2"><a href="https://maps.app.goo.gl/YjR875jimR99F8J36"><i class="material-icons md-18">location_on</i> Street 103, Khan SekSok, Phnom Penh, Cambodia</a></p>
                <p class="mb-2"><a href="tel:+1514890000" class="hover:text-yellow-400">1-514-890-0000</a></p>
                <p><a href="mailto:calinscompagnies@calins.com"
                        class="hover:text-yellow-400">limtri@gmail.com</a></p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>