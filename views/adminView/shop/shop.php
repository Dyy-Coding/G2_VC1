<style>
    body {
        background-color: #f5f5f5;
    }

    .container-shop {
        max-width: 1200px;
        margin: 30px auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .scrollable-container {
        width: 100%;
        overflow-x: auto;
        white-space: nowrap;
        margin-bottom: 20px;
    }

    .scrollable-container::-webkit-scrollbar {
        display: none;
    }

    .scroll-container {
        display: inline-flex;
        gap: 10px;
    }

    .scroll-container button {
        white-space: nowrap;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .material-card {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease;
        height: 500px;
    }

    .material-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 16px rgba(0,0,0,0.15);
    }

    .material-image-container {
        height: 250px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fafafa;
    }

    .material-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .material-image-container:hover img {
        transform: scale(1.1);
    }

    .card-body {
        flex: 1;
        padding: 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-title {
        font-weight: 600;
        font-size: 1.2rem;
        margin-bottom: 10px;
        color: #34495e;
    }

    .price-text {
        color: #2ecc71;
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .quantity-control {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }

    .quantity-control button {
        width: 30px;
        height: 30px;
    }

    .quantity-input {
        width: 50px;
        margin: 0 5px;
    }

    .btn-sm {
        border-radius: 20px;
        padding: 5px 15px;
        font-size: 0.9rem;
    }

    .cart_shop {
    position: fixed;
    top: 600px;
    left: 1300px;
    z-index: 1000;
}

/* Cart Link basic */
.cart-link {
    transition: all 0.3s ease;
    border: 2px solid #00bcd4;
    border-radius: 15px;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    background-color: #e0f7fa;
}

/* Cart Icon bigger */
.cart-icon {
    background-color: #f0f0f0;
    transition: background-color 0.3s, transform 0.3s;
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

/* Hover effect */
.cart-link:hover {
    background-color: #e0f7fa;
    border: 2px solid #00bcd4;
    transform: translateY(-3px);
}

.cart-link:hover .cart-icon {
    background-color: #00bcd4;
    transform: rotate(10deg);
}

.cart-link:hover .material-icons {
    color: white;
}

/* Text stronger */
.nav-link-text {
    font-size: 1rem;
    font-weight: 600;
}

/* RESPONSIVE MEDIA QUERIES */
@media (max-width: 1400px) {
    .cart_shop {
        left: 1100px;
        top: 580px;
    }
}

@media (max-width: 1200px) {
    .cart_shop {
        left: 900px;
        top: 550px;
    }
}

@media (max-width: 992px) {
    .cart_shop {
        left: 750px;
        top: 500px;
    }
}

@media (max-width: 768px) {
    .cart_shop {
        left: 85%;
        top: 85%;
        transform: translate(-50%, -50%);
    }
    .cart-link {
        padding: 8px 16px;
    }
    .cart-icon {
        width: 45px;
        height: 45px;
    }
    .nav-link-text {
        display: none; /* hide text, keep only icon on small screen */
    }
}

@media (max-width: 576px) {
    .cart_shop {
        left: 80%;
        top: 85%;
        transform: translate(-50%, -50%);
    }
    .cart-icon {
        width: 40px;
        height: 40px;
    }
}


  
</style>

<!-- Cart Button -->
<div class="nav-item cart_shop">
    <a class="nav-link cart-link" href="/payment" id="cartLink">
        <i class="material-icons text-dark text-xl">shopping_cart</i>
        <span class="nav-link-text ms-2">Cart (<span id="cart-count">0</span>)</span>
    </a>
</div>

<div class="container container-shop">
    <h1 class="text-center mb-4">🛍️ Our Shop</h1>
    <p class="text-center mb-5">Find the best materials you need!</p>

    <!-- Category Buttons -->
    <div class="scrollable-container">
        <div class="scroll-container">
            <?php if (isset($categories) && is_array($categories)): ?>
                <button class="btn btn-outline-primary rounded-pill" onclick="filterMaterials('all')">All</button>
                <?php foreach ($categories as $category): ?>
                    <button class="btn btn-outline-secondary rounded-pill" onclick="filterMaterials('<?= htmlspecialchars($category['CategoryName']) ?>')">
                        <?= htmlspecialchars($category['CategoryName']) ?>
                    </button>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No categories available.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input 
            type="text" 
            id="search" 
            class="form-control" 
            placeholder="Search for materials..."
        >
    </div>

    <!-- Materials Cards -->
    <div class="card-container">
        <?php if (isset($materials) && is_array($materials)): ?>
            <?php foreach ($materials as $material): ?>
                <div class="card material-card shadow-sm"
                     data-category="<?= htmlspecialchars($material['CategoryName']) ?>"
                     data-Size="<?= htmlspecialchars($material['Size']) ?>"
                     data-unit-price="<?= htmlspecialchars($material['UnitPrice']) ?>"
                     data-id="<?= htmlspecialchars($material['MaterialID']) ?>">
                     
                    <div class="material-image-container">
                        <img src="<?= htmlspecialchars($material['ImagePath']) ?>" alt="<?= htmlspecialchars($material['Name']) ?>">
                    </div>

                    <div class="card-body text-center">
                        <div>
                            <h5 class="card-title material-name"><?= htmlspecialchars($material['Name']) ?></h5>
                            <p class="price-text">$<span class="price"><?= number_format($material['UnitPrice'], 2) ?></span></p>

                            <!-- Quantity Selector -->
                            <div class="quantity-control">
                                <button class="btn btn-sm btn-outline-secondary" onclick="decreaseQuantity(this)">-</button>
                                <input type="text" value="1" class="quantity-input text-center" readonly>
                                <button class="btn btn-sm btn-outline-secondary" onclick="increaseQuantity(this)">+</button>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-center gap-2 mt-2">
                            <button class="btn btn-primary btn-sm" onclick="addToCart(this)">Add to Cart</button>
                            <button class="btn btn-outline-info btn-sm">  
                                <a href="/material/detail/<?= htmlspecialchars($material['MaterialID']) ?>" class="dropdown-item d-flex align-items-center">
                                    <i class="material-icons me-2" style="font-size:18px;">visibility</i> View
                                </a>
                            </button>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No materials available.</p>
        <?php endif; ?>
    </div>
</div>

<!-- JavaScript -->
<script>
// Initialize the cart
let cart = JSON.parse(localStorage.getItem('cart')) || [];
let currentCategory = 'all';

// Update cart count
function updateCartCount() {
    document.getElementById('cart-count').textContent = cart.reduce((total, item) => total + item.quantity, 0);
}

// Function to filter materials
function filterMaterials(category) {
    currentCategory = category;
    const cards = document.querySelectorAll('.material-card');
    const searchValue = document.getElementById('search').value.toLowerCase().trim();

    cards.forEach(card => {
        const cardCategory = card.getAttribute('data-category');
        const nameElement = card.querySelector('.material-name');
        const materialName = nameElement ? nameElement.textContent.toLowerCase() : '';

        const matchesCategory = (category === 'all' || cardCategory === category);
        const matchesSearch = (materialName.includes(searchValue));

        if (matchesCategory && matchesSearch) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}

// Listen for search input changes
document.getElementById('search').addEventListener('input', function() {
    filterMaterials(currentCategory);
});

// Update quantity and price
function increaseQuantity(button) {
    const input = button.previousElementSibling;
    let value = parseInt(input.value);
    if (!isNaN(value)) {
        value++;
        input.value = value;
        updatePrice(button, value);
    }
}

function decreaseQuantity(button) {
    const input = button.nextElementSibling;
    let value = parseInt(input.value);
    if (!isNaN(value) && value > 1) {
        value--;
        input.value = value;
        updatePrice(button, value);
    }
}

// Update price based on quantity
function updatePrice(button, quantity) {
    const card = button.closest('.material-card');
    const unitPrice = parseFloat(card.getAttribute('data-unit-price'));
    const priceElement = card.querySelector('.price');
    const totalPrice = unitPrice * quantity;
    priceElement.textContent = totalPrice.toFixed(2);
}

// Add to Cart function
function addToCart(button) {
    const card = button.closest('.material-card');
    const name = card.querySelector('.material-name').textContent;
    const image = card.querySelector('img').src;
    const price = parseFloat(card.getAttribute('data-unit-price'));
    const quantity = parseInt(card.querySelector('.quantity-input').value);
    const materialID = card.getAttribute('data-id');

    // Check if item is already in the cart
    const existingItem = cart.find(item => item.materialID === materialID);
    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({ materialID, name, image, price, quantity });
    }

    // Update cart in localStorage and update cart count
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    alert('Item added to cart!');
}

// Call this function to initialize the cart count on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
    filterMaterials(currentCategory);
});

</script>
