
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

   