<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .carousel-item img { height: 500px; object-fit: cover; border-radius: 15px; transition: transform 0.3s; }
        .carousel-item img:hover { transform: scale(1.05); }
        @media (max-width: 768px) { .carousel-item img { height: 300px; } }
        .container { display: flex; justify-content: center; align-items: center; position: relative; text-align: center; color: white; }
        .image { width: 70%; }
        .caption { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5); opacity: 0; animation: fadeIn 1s forwards; }
        .title { font-size: 2.5em; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); }
        @keyframes fadeIn { from { opacity: 0; transform: translate(-50%, -60%); } to { opacity: 1; transform: translate(-50%, -50%); } }
        .about-company { display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin: 20px 0; }
        .about-company p { width: 80%; margin: 20px 70px; }
        .con img { margin-left: 70px; }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <header class="bg-white sticky top-0 z-50">
        <nav class="bg-white-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
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
                                <a href="/welcome" class="px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">Home</a>
                                <a href="/about" class="px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">About</a>
                                <a href="/sales" class="px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">Shop</a>
                                <a href="/contact" class="px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">Contact</a>
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
                            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
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
    <div class="main-container">
        <div class="container">
            <img src="views/assets/img/material.png" class="image" alt="About Us Image">
            <div class="caption">
                <h1 class="title h1">About Us</h1>
            </div>
        </div>
        <div class="about-company bg-white">
            <div class="con">
                <h1 class="text-4xl font-bold text-center text-blue-600 mb-8">About Us</h1>
                <p>Welcome to Lim Tri Depot, your trusted partner in construction materials. We are dedicated to providing high-quality products and exceptional service to builders, contractors, and DIY enthusiasts. With years of experience in the industry, we understand the importance of reliable materials for successful projects.</p>
                <p>At Lim Tri Depot, we offer a wide range of construction materials, including concrete, aggregates, steel, insulation, and more. Our team of experts is here to assist you in finding the right products for your specific needs. We pride ourselves on our commitment to quality, ensuring that every product we offer meets the highest standards.</p>
            </div>
            <div class="con">
                <img src="views/assets/img/hat.png" alt="">
            </div>
        </div>
        <div class="about-company">
            <div class="con">
                <img src="views/assets/img/mission.png" alt="" style="width: 50%; margin-left: 140px">
            </div>
            <div class="con">
                <h1 class="text-4xl font-bold text-center text-blue-600 mb-8">Our Mission</h1>
                <p>Our mission is simple: to empower our customers with the best building materials available on the market. We understand that the success of your project depends on the quality of the materials you use, which is why we source our products from reputable manufacturers known for their commitment to excellence and innovation.</p>
            </div>
        </div>
        <div class="mx-auto p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-center text-blue-800 mb-4">What We Offer</h1>
            <p class="mb-6 text-lg">From foundational materials like concrete and steel to finishing touches such as tiles, paints, and fixtures, we offer a wide selection of products to suit every phase of your construction project. Our extensive inventory includes:</p>
            <ul class="list-none space-y-4">
                <li class="flex items-start bg-blue-100 p-4 rounded border-l-4 border-blue-500">
                    <i class="material-icons text-blue-600 mr-2">forest</i>
                    <div><strong>Lumber & Framing Materials:</strong> Quality wood and engineered products for structural integrity.</div>
                </li>
                <li class="flex items-start bg-blue-100 p-4 rounded border-l-4 border-blue-500">
                    <i class="material-icons text-blue-600 mr-2">construction</i>
                    <div><strong>Concrete & Masonry:</strong> Durable solutions for foundations, walls, and more.</div>
                </li>
                <li class="flex items-start bg-blue-100 p-4 rounded border-l-4 border-blue-500">
                    <i class="material-icons text-blue-600 mr-2">roofing</i>
                    <div><strong>Roofing & Insulation:</strong> Energy-efficient options to protect and enhance your building.</div>
                </li>
                <li class="flex items-start bg-blue-100 p-4 rounded border-l-4 border-blue-500">
                    <i class="material-icons text-blue-600 mr-2">format_paint</i>
                    <div><strong>Drywall & Interior Finishes:</strong> Aesthetic materials to create beautiful interiors.</div>
                </li>
                <li class="flex items-start bg-blue-100 p-4 rounded border-l-4 border-blue-500">
                    <i class="material-icons text-blue-600 mr-2">build</i>
                    <div><strong>Tools & Hardware:</strong> Everything you need to get the job done right.</div>
                </li>
            </ul>
        </div>
        <div class="mx-auto p-6">
            <h1 class="text-4xl font-bold text-center text-blue-600 mb-8">Why Choose Us?</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105">
                    <h2 class="text-xl font-semibold text-blue-600">Quality Assurance</h2>
                    <p class="mt-2">We stand behind the products we sell. Our materials are rigorously tested to ensure they meet industry standards and provide lasting performance.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105">
                    <h2 class="text-xl font-semibold text-blue-600">Expert Guidance</h2>
                    <p class="mt-2">Our knowledgeable team is here to help you make informed decisions. Whether you’re a seasoned contractor or a first-time builder, we provide personalized support to help you find the right materials for your project.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105">
                    <h2 class="text-xl font-semibold text-blue-600">Competitive Pricing</h2>
                    <p class="mt-2">We believe that quality shouldn’t come at a premium. Our competitive pricing ensures that you get the best value for your investment.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105">
                    <h2 class="text-xl font-semibold text-blue-600">Sustainability</h2>
                    <p class="mt-2">We are committed to promoting sustainable building practices. Many of our products are sourced from eco-friendly manufacturers, helping you build responsibly.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105">
                    <h2 class="text-xl font-semibold text-blue-600">Convenient Shopping Experience</h2>
                    <p class="mt-2">Our user-friendly website makes it easy to browse our extensive catalog, place orders, and arrange for delivery right to your job site.</p>
                </div>
            </div>
        </div>
    </div>
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
                <p><a href="mailto:calinscompagnies@calins.com" class="hover:text-yellow-400">limtri@gmail.com</a></p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
