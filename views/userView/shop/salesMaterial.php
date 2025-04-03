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
    <!-- Material Icons for Footer -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            padding-left: 270px; /* Push content to the right to make space for fixed sidebar */
            gap: 20px;
            align-items: flex-start;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 13%;
            left: 0;
            width: 250px;
            margin-left: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #ffffff, #f0f4f8); 
            /* max-height: calc(100vh - 20% - 200px);  */
            overflow-y: auto; 
            bottom: 200px; 
        }

        .sidebar h3 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar ul li img {
            width: 30px;
            height: 30px;
            border-radius: 6px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #555;
        }

        .sidebar ul li a:hover {
            color: #e74c3c;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .discount {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #e74c3c;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
        }

        .sale {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #000;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            transform: rotate(45deg);
        }

        /* Best Sellers Section */
        .best-sellers {
            grid-column: span 3;
        }

        .best-sellers h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
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
                <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
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
                    <a href="#" class=" px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">Home</a>
                    <a href="#" class=" px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">About</a>
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
                <div class="relative ml-3">
                <div>
                    <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </button>
                </div>
                </div>
                <span class="ml-3">User name</span>
                <a href="/login" class="rounded-md bg-gray-700 px-3 py-2 text-sm font-medium text-white ml-5" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div>
            </div>
        </div>
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Home</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
            </div>
        </div>
        </nav>
    </header>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Categories</h3>
            <ul>
                <li><img src="https://media.istockphoto.com/id/1448349078/photo/cement-bags-o-sacks-isolated-on-white.jpg?s=612x612&w=0&k=20&c=F5_VosP_qf9xYgyVth-Vs3OsSjaL0gZBMae39zZ3Zmg=" alt="Clothes">Cement</a></li>
                <li><img src="https://media.sortly.com/wp-content/uploads/2023/08/24210510/iStock-1484751645-1024x683.jpg" alt="Footwear"> <a href="#">Steel</a></li>
                <li><img src="https://wooddesigner.org/wp-content/uploads/2021/05/planed-timber.jpg" alt="Jewelry"> <a href="#">Roofing</a></li>
                <li><img src="https://5.imimg.com/data5/SELLER/Default/2021/12/HW/KG/SQ/143354869/syp-wood-timber-plank.jpg" alt="Perfume"> <a href="#">Wood</a></li>
                <li><img src="https://images.jdmagicbox.com/rep/b2b/plumbing-material/plumbing-material-7.jpg" alt="Cosmetics"> <a href="#">Plumbing</a></li>
                <li><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl5hDcnZSGHDNpy6S8lyLSefic9iuvGuXPbQ&s" alt="Glasses"> <a href="#">Electrical</a></li>
                <li><img src="https://www.nobroker.in/blog/wp-content/uploads/2023/07/emulsion-paint-1200x673.webp" alt="Bags"> <a href="#">Paint</a></li>
                <li><img src="https://www.martinsflooring.com/wp-content/uploads/2023/02/flooring-samples.jpg" alt="Electronics"> <a href="#">Flooring</a></li>
                <li><img src="https://dailycivil.com/wp-content/uploads/2021/05/types-of-sand-in-construction.webp" alt="Electronics"> <a href="#">Sand</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">  
            <!-- Product Cards -->
            <div class="col">
                <div class="bg-gray-50 rounded-lg shadow-md p-4 hover:shadow-lg transition-all">
                    <img src="https://www.nobroker.in/blog/wp-content/uploads/2023/07/emulsion-paint-1200x673.webp" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">Paint</h5>
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
                    <img src="https://5.imimg.com/data5/SELLER/Default/2023/10/355485683/HS/WR/FW/79376408/construction-river-sand-500x500.jpg" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">Sand</h5>
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
                    <img src="https://m.media-amazon.com/images/I/410yA733NdL.jpg" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">Camera</h5>
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
                    <img src="https://gotinoconstruction.com/wp-content/uploads/2022/09/Construction-Materials.jpg" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">Winter Jacket</h5>
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
                    <img src="https://gotinoconstruction.com/wp-content/uploads/2022/09/Construction-Materials.jpg" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">Winter Jacket</h5>
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
                    <img src="https://gotinoconstruction.com/wp-content/uploads/2022/09/Construction-Materials.jpg" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">Winter Jacket</h5>
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
                    <img src="https://gotinoconstruction.com/wp-content/uploads/2022/09/Construction-Materials.jpg" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">Winter Jacket</h5>
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
                    <img src="https://gotinoconstruction.com/wp-content/uploads/2022/09/Construction-Materials.jpg" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">Winter Jacket</h5>
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
                    <img src="https://www.gmat.co.uk/wp-content/uploads/2023/04/Types-of-Construction-Sand.jpg" class="w-full h-48 object-cover rounded-t-lg" alt="Jacket">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">Winter Jacket</h5>
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

            <!-- Best Sellers Section -->
            <div class="best-sellers">
                <h3>Best Sellers</h3>
                <!-- Best sellers can be styled similarly to product cards -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white px-8 py-6 bg-blue-950 w-full">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
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
                <p><a href="mailto:calinscompagnies@calins.com" class="hover:text-yellow-400">limtri@gmail.com</a></p>
            </div>
        </div>
    </footer>

    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>