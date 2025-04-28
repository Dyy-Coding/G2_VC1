<!-- Main CSS -->
<style>
    .fade-in-scale {
        animation: fadeInScale 1.5s ease-in-out;
    }
    .slide-up-fade {
        animation: slideUpFade 1s ease-out;
    }
    @keyframes fadeInScale {
        0% { opacity: 0; transform: scale(1.1); }
        100% { opacity: 1; transform: scale(1); }
    }
    @keyframes slideUpFade {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Main Section -->
<div class="max-w-6xl mx-auto px-4">
    <!-- Banner -->
    <div class="relative mb-8">
        <img src="https://d2d4xyu1zrrrws.cloudfront.net/website/web-ui/assets/images/illustrations/banner_building_material_web.webp" class="w-full h-auto fade-in-scale" alt="Building Materials">
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center slide-up-fade drop-shadow-lg">Get in Touch</h1>
        </div>
    </div>

    <!-- Contact Information and Map -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Contact Info -->
        <section class="bg-white rounded-lg shadow-md p-6 space-y-6">
            <div>
                <h2 class="text-xl font-semibold mb-2">Phone</h2>
                <p>Call us at <span class="font-bold">(123) 456-7890</span></p>
                <p class="text-gray-500 text-sm">Available Monday to Friday, 8 AM - 5 PM.</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Email</h2>
                <p>Email us at <span class="font-bold">support@yourcompany.com</span></p>
                <p class="text-gray-500 text-sm">Replies within 24 hours.</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Visit Us</h2>
                <p>123 Building Lane<br>City, State, ZIP Code</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Business Hours</h2>
                <p>Monday - Friday: 8 AM - 5 PM</p>
            </div>
        </section>

        <!-- Google Map -->
        <div class="rounded-lg overflow-hidden shadow-md">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.040523800103!2d104.88019487452674!3d11.548950844470662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951adb0716eaf%3A0x2bdcb128ba2fd716!2sLim%20Tri!5e0!3m2!1sen!2skh!4v1743653233359!5m2!1sen!2skh"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <!-- Feedback Form -->
    <section class="bg-gray-100 rounded-lg shadow-md p-8 mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center">Customer Feedback Form</h2>
        <form action="" method="POST" class="space-y-6">
            <div>
                <label for="customerName" class="block text-gray-700 font-bold mb-2">Customer Name</label>
                <input type="text" id="customerName" name="customerName" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter your name" required>
            </div>
            <div>
                <label for="feedback" class="block text-gray-700 font-bold mb-2">Feedback</label>
                <textarea id="feedback" name="feedback" rows="4" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter your feedback" required></textarea>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Star Rating</label>
                <div class="flex items-center gap-1 cursor-pointer text-gray-400">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current star" data-value="<?php echo $i; ?>" viewBox="0 0 24 24">
                            <path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/>
                        </svg>
                    <?php endfor; ?>
                </div>
                <input type="hidden" id="starRating" name="starRating">
            </div>
            <button type="submit" class="w-full bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </section>

    <!-- Feedback List -->
    <h2 class="text-2xl font-bold text-center mt-16 mb-8">Customer Feedback</h2>
    <div class="flex flex-wrap justify-center gap-6">
        <!-- Single Feedback Card -->
        <article class="w-full md:w-1/2 lg:w-1/3 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Customer Name</h3>
            <p class="text-gray-600 mb-4">💬 "Decent website, but slow loading." Some pages took too long to load. Faster images would be better.</p>
            <div class="flex text-yellow-500">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/>
                    </svg>
                <?php endfor; ?>
            </div>
        </article>
        <!-- Another Feedback Card -->
        <article class="w-full md:w-1/2 lg:w-1/3 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Customer Name</h3>
            <p class="text-gray-600 mb-4">💬 "Great experience! Website easy to navigate. Found what I needed fast!"</p>
            <div class="flex text-yellow-500">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.75l-6.18 3.85 1.64-7.03L2 9.26l7.19-.62L12 2.5l2.81 6.14L22 9.26l-5.46 5.31 1.64 7.03z"/>
                    </svg>
                <?php endfor; ?>
            </div>
        </article>
    </div>
</div>

<!-- Star Rating Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star');
        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                stars.forEach((s, i) => {
                    s.classList.toggle('text-yellow-500', i <= index);
                    s.classList.toggle('text-gray-400', i > index);
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

