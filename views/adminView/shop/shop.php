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
</style>

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
                     data-unit-price="<?= htmlspecialchars($material['UnitPrice']) ?>">
                     
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
                            <button class="btn btn-primary btn-sm">Add to Cart</button>
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
let currentCategory = 'all';

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

document.getElementById('search').addEventListener('input', function() {
    filterMaterials(currentCategory);
});

// Quantity functions
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

// Update price when quantity changes
function updatePrice(button, quantity) {
    const card = button.closest('.material-card');
    const unitPrice = parseFloat(card.getAttribute('data-unit-price'));
    const priceElement = card.querySelector('.price');
    const totalPrice = unitPrice * quantity;
    priceElement.textContent = totalPrice.toFixed(2);
}

// Category Buttons
const categoryButtons = document.querySelectorAll('.scroll-container button');
categoryButtons.forEach(button => {
    button.addEventListener('click', function() {
        const category = this.textContent.trim();
        filterMaterials(category === 'All' ? 'all' : category);
    });
});
</script>
