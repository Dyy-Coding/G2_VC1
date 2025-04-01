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
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-50">
        <nav class="navbar navbar-expand-lg container py-4">
            <div class="container-fluid">
                <a class="navbar-brand text-2xl font-bold text-gray-800" href="#">Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto space-x-6">
                        <li class="nav-item">
                            <a class="nav-link text-gray-600 hover:text-indigo-600 transition-colors font-medium" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray-600 hover:text-indigo-600 transition-colors font-medium" href="#">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray-600 hover:text-indigo-600 transition-colors font-medium" href="#">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray-600 hover:text-indigo-600 transition-colors font-medium" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <li class="nav-item">
          <a class="nav-link" href="/logout">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Banner Carousel -->
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://wp.technologyreview.com/wp-content/uploads/2023/07/220616_SublimeSystems_199.jpeg" class="d-block w-100" alt="Summer Collection">
                    <div class="carousel-caption d-flex flex-col items-center justify-center h-full text-white">
                        <h2 class="text-4xl md:text-5xl font-bold mb-2">Summer Collection</h2>
                        <p class="text-lg md:text-xl mb-4">Starting at $20.00</p>
                        <a href="#" class="btn bg-indigo-600 text-white hover:bg-indigo-700 transition-colors px-6 py-2 rounded-full">Shop Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://i0.wp.com/civillane.com/wp-content/uploads/2022/02/Top-5-Cement-Companies-In-India.jpg?fit=1000%2C600&ssl=1" class="d-block w-100" alt="New Arrivals">
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
        <section class="py-12">
            <div class="container">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-8">Categories</h2>
                <div class="row row-cols-1 row-cols-md-4 g-4">
                
                    <div class="col">
                        <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-transform transform hover:scale-105">
                            <img src="https://m.media-amazon.com/images/I/71lMSi5mQaL._AC_UF894,1000_QL80_.jpg" class="w-full h-32 object-contain p-4" alt="Clothes">
                            <div class="text-center">
                                <h5 class="text-lg font-semibold text-gray-800">Clothes</h5>
                                <p class="text-gray-500 text-sm">(50)</p>
                                <a href="#" class="mt-2 inline-block bg-indigo-600 text-white py-2 px-4 rounded-full hover:bg-indigo-700 transition-colors">Show All</a>
                            </div>
                        </div>
                    </div>
 
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
                            <img src="./admin/upload/product1.jpg" class="w-full h-48 object-cover rounded-t-lg" alt="T-shirt">
                            <div class="p-4">
                                <h5 class="text-lg font-semibold text-gray-800">Summer T-shirt</h5>
                                <p class="text-gray-500 text-sm">New Arrival!</p>
                                <div class="flex justify-between items-center mt-3">
                                    <div>
                                        <span class="text-indigo-600 font-bold">$25.00</span>
                                        <del class="text-gray-400 text-sm ml-2">$30.00</del>
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
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="py-12">
            <div class="container">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-8">Our Services</h2>
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    <div class="col">
                        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                            <ion-icon name="boat-outline" class="text-4xl text-indigo-600 mb-3"></ion-icon>
                            <h5 class="text-lg font-semibold text-gray-800">Worldwide Delivery</h5>
                            <p class="text-gray-500 text-sm">For Orders Over $100</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
                            <ion-icon name="rocket-outline" class="text-4xl text-indigo-600 mb-3"></ion-icon>
                            <h5 class="text-lg font-semibold text-gray-800">Next Day Delivery</h5>
                            <p class="text-gray-500 text-sm">UK Orders Only</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container text-center">
            <p class="text-gray-300">© 2025 Store. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>