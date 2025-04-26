
    <!-- Main Content -->
    <main>
                <!-- Banner Carousel -->
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($topSellingMaterials as $index => $material): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo $material['ImagePath']; ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($material['Name']); ?>">
                        <div class="carousel-caption d-flex flex-col items-center justify-center h-full text-white">
                            <h2 class="text-4xl md:text-5xl font-bold mb-2"><?php echo htmlspecialchars($material['Name']); ?></h2>
                            <p class="text-lg md:text-xl mb-4">Starting at $<?php echo number_format($material['UnitPrice'], 2); ?></p>
                            <a href="#" class="btn bg-indigo-600 text-white hover:bg-indigo-700 transition-colors px-6 py-2 rounded-full">Shop Now</a>
                        </div>
                    </div>
                <?php endforeach; ?>
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

        <section class="py-12">
            <div class="container">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-8">Popular Categories</h2>
                <div class="scrollable-container">
                    <div class="relative">
                        <div class="arrow arrow-left" onclick="scrollLeft()">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </div>
                        <div class="arrow arrow-right" onclick="scrollRight()">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>

                        <div class="scroll-container">
                            <?php foreach ($categories as $category): ?>
                                <div class="bg-white rounded-lg shadow-md mb-10 p-4 w-64 hover:shadow-lg transition-transform transform hover:scale-105">
                                    <img src="https://via.placeholder.com/150" class="w-full h-32 object-contain p-4" alt="<?= htmlspecialchars($category['CategoryName']) ?>">
                                    <div class="text-center">
                                        <h5 class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($category['CategoryName']) ?></h5>
                                        <p class="text-gray-500 text-sm">Sold: <?= $category['totalSales'] ?> times</p>
                                        <a href="/category" class="mt-2 inline-block bg-indigo-600 text-white py-2 px-4 rounded-full hover:bg-indigo-700 transition-colors">View</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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

 