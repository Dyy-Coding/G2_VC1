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
</head>
<style>
        /* Container styling */
        .container {
            position: relative;
            margin-bottom: 1.5rem;
            width: 100%;
            max-width: 950px; /* Matches your original image width */
            margin-left: auto;
            margin-right: auto;
        }

        /* Image styling */
        .image {
            width: 100%;
            height: auto;
            display: block;
            animation: fadeInScale 1.5s ease-in-out;
        }

        /* Caption styling */
        .caption {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Arial', sans-serif;
            font-size: 3rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Text styling */
        .title {
            font-size: 2.25rem; /* Equivalent to text-4xl */
            font-weight: bold;
            margin-bottom: 0.5rem;
            animation: slideUpFade 1s ease-out;
        }

        /* Image Animation */
        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(1.1);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Text Animation */
        @keyframes slideUpFade {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .space-y-4 {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .card {
            flex: 1;
            max-width: 20%;
            margin: 5px;
            display: flex;
            flex-direction: column;
            /* justify-content: space-between; */
        }
        </style>
<body>
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
                    <a href="/welcome" class=" px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">Home</a>
                    <a href="#" class=" px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">About</a>
                    <a href="/contact" class=" px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 hover:text-white">Contact</a>
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
    <div class="main-container">
    <div class="container">
        <img src="https://d2d4xyu1zrrrws.cloudfront.net/website/web-ui/assets/images/illustrations/banner_building_material_web.webp" class="image">
        <div class="caption">
            <h1 class="title">Get in Touch</h1>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white text-gray-700 rounded-lg p-4 ml-6">
            <div class="">
                <h6 class="font-semibold text-lg">Phone:</h6>
                <p class="text-gray-700">Call us at <span class="font-bold">(123) 456-7890</span></p>
                <p class="text-gray-500 mb-4">Our customer service team is available Monday to Friday, 8 AM - 5 PM.</p>
            </div>
            <div class="">
                <h6 class="font-semibold text-lg">Email:</h6>
                <p class="text-gray-700">For inquiries, please email us at <span class="font-bold">support@yourcompany.com</span></p>
                <p class="text-gray-500 mb-4">We aim to respond to all emails within 24 hours.</p>
            </div>
            <div class="">
                <h6 class="font-semibold text-lg">Visit Us:</h6>
                <p class="text-gray-700">Come see us in person!</p>
                <p class="text-gray-700 mb-4">Address: <br> 123 Building Lane <br> City, State, ZIP Code</p>
            </div>
            <div class="">
                <h6 class="font-semibold text-lg">Business Hours:</h6>
                <p class="text-gray-700">Monday - Friday: 8 AM - 5 PM</p>
                <p class="text-gray-500 mb-4">Our customer service team is available Monday to Sunday, 8 AM - 5 PM.</p>
            </div>
        </div>
        <div class="map mt-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.040523800103!2d104.88019487452674!3d11.548950844470662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951adb0716eaf%3A0x2bdcb128ba2fd716!2sLim%20Tri!5e0!3m2!1sen!2skh!4v1743653233359!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <section class="bg-white flex items-center justify-center m-6">
    <div class=" bg-gray-100 p-8 m-6 rounded-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Customer Feedback Form</h2>
        <form>
            <div class="mb-4">
                <label for="customerName" class="block text-gray-700 font-bold mb-2">Customer Name</label>
                <input type="text" id="customerName" name="customerName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your name">
            </div>
            <div class="mb-4">
                <label for="feedback" class="block text-gray-700 font-bold mb-2">Feedback</label>
                <textarea id="feedback" name="feedback" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your feedback"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Star Rating</label>
                <!-- Star Rating -->
                <div class="flex text-gray-400 mb-2 cursor-pointer">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current star" data-value="<?php echo $i; ?>" viewBox="0 0 24 24">
                            <path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/>
                        </svg>
                    <?php endfor; ?>
                </div>
                
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-950 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.add('text-yellow-500');
                            s.classList.remove('text-gray-400');
                        } else {
                            s.classList.add('text-gray-400');
                            s.classList.remove('text-yellow-500');
                        }
                    });
                    document.getElementById('starRating').value = index + 1;
                });
            });
        });
    </script>

</section>





    <h2 style="font-size: 2rem; font-weight: bold;" class="text-center m-6">Feedback</h2>
   <div class="bg-white rounded-lg shadow-md mt-4 p-6">
    <div class="space-y-4 flex  flex-row gap-6 ">
        <div class="card w-2/5 p-4 border border-gray-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800">Customer Name</h3>
            <p class="text-gray-600">💬 "Decent website, but slow loading." I like the variety of products, but some pages took too long to load. It would be great if the images loaded faster.</p>
            <!-- Star Rating -->
            <div class="flex text-yellow-500 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
            </div>
        </div>
        <div class="card w-2/5 p-4 border border-gray-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800">Customer Name</h3>
            <p class="text-gray-600">💬 "Great experience! The website is easy to navigate, and I found everything I needed quickly. The product descriptions were detailed, and the checkout process was smooth. Will definitely shop again!"</p>
                <!-- Star Rating -->
            <div class="flex text-yellow-500 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
            </div>
        </div>
        <div class="card w-2/5 p-4 border border-gray-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800">Customer Name</h3>
            <p class="text-gray-600">💬 "Fast delivery and quality products! I ordered cement and tiles, and they arrived on time. The packaging was secure, and the materials were exactly as described."</p>
                <!-- Star Rating -->
            <div class="flex text-yellow-500 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
            </div>
        </div>
        <div class="card w-2/5 p-4 border border-gray-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800">Customer Name</h3>
            <p class="text-gray-600">💬 "Good customer service! I had a question about bulk pricing, and the support team responded quickly. They even helped me choose the best material for my project. Very satisfied!"</p>
                <!-- Star Rating -->
            <div class="flex text-yellow-500 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
            </div>
        </div>
        <div class="card w-2/5 p-4 border border-gray-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800">Customer Name</h3>
            <p class="text-gray-600">💬 "Checkout needs some improvements." I found the checkout process a bit confusing because I wasn’t sure about the shipping costs until the last step. Showing delivery fees earlier would help.</p>
             <!-- Star Rating -->
            <div class="flex text-yellow-500 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/></svg>
            </div>
        </div>
    </div>
</div>
</div>
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
</body>

</html>