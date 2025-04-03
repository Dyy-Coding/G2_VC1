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
            top: 15%;
            left: 0;
            height: 100vh;
            width: 250px;
            margin-left: 20px;
            background-color: #fff;
            padding: 20px;
            overflow-y: auto;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        .product-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            position: relative;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .product-card h4 {
            font-size: 14px;
            color: #e74c3c;
            margin-bottom: 5px;
        }

        .product-card p {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        .product-card .price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .product-card .old-price {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
            margin-left: 10px;
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

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Categories</h3>
            <ul>
                <li><img src="https://media.istockphoto.com/id/1448349078/photo/cement-bags-o-sacks-isolated-on-white.jpg?s=612x612&w=0&k=20&c=F5_VosP_qf9xYgyVth-Vs3OsSjaL0gZBMae39zZ3Zmg=" alt="Clothes"> <a href="#">Cement</a></li>
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
    <footer class="bg-gray-900 text-white py-6">
        <div class="container text-center">
            <p class="text-gray-300">© 2025 Store. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

