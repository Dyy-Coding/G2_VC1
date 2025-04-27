<style>
    .scrollable-container {
        width: 100%; /* Ensure container takes the full width */
        overflow-x: scroll; /* Enable horizontal scrolling */
        white-space: nowrap; /* Prevent wrapping of the content */
        -webkit-overflow-scrolling: touch; /* For smooth scrolling on mobile */
        scrollbar-width: none; /* Firefox: Hide the scrollbar */
        -ms-overflow-style: none;  /* Internet Explorer 10+ */
    }

    .scrollable-container::-webkit-scrollbar {
        display: none; /* Hide the scrollbar in WebKit browsers (Chrome, Safari, etc.) */
    }

    .scroll-container {
        display: inline-flex; /* Make sure the buttons stay in a row */
        gap: 10px; /* Optional: space between the buttons */
    }

    .scroll-container button {
        white-space: nowrap; /* Prevent text from wrapping within buttons */
    }

</style>
<div class="container mt-3 card" style="width: 95%; padding: 20px;">
    <h1>Shop</h1>
    <p>Welcome to the shop! Here you can find a variety of materials available for purchase.</p>
    <div class="search">
        <input type="search" name="search" id="search" placeholder="Search here....." class="form-control" style="width: 100%; margin-bottom: 20px;">
    </div>
    <nav>
        <div class="scrollable-container mb-3">
            <div class="relative">
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
        </div>
    </nav>

    <div class="card-container d-flex  align-center justify-content-center flex-wrap gap-6">
        <?php if (isset($materials) && is_array($materials)): ?>
            <?php foreach ($materials as $material): ?>
                <div class="card material-card shadow-sm" style="width: 18rem; border-radius: 15px; overflow: hidden;" data-category="<?= htmlspecialchars($material['CategoryName']) ?>">
                <div style="height: 25vh; overflow: hidden;">
                    <img 
                        src="<?= htmlspecialchars($material['ImagePath']) ?>" 
                        class="card-img" 
                        alt="<?= htmlspecialchars($material['Name']) ?>" 
                        style="height: 100%; object-fit: cover;"
                    >
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title" style="font-weight: 600; color: #34495e;"><?= htmlspecialchars($material['Name']) ?></h5>
                    <p class="card-text" style="color: #7f8c8d;">Price: $<?= number_format($material['UnitPrice'], 2) ?></p>
                    <p class="card-text" style="color: #7f8c8d;">Quantity: <?= htmlspecialchars($material['Quantity']) ?></p>
                </div>
            </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p>No materials available.</p>
        <?php endif; ?>
    </div>
</div>

<!-- JavaScript to filter materials -->
<script>
function filterMaterials(category) {
    const cards = document.querySelectorAll('.material-card');

    cards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-category') === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

document.getElementById('search').addEventListener('input', function() {
    const searchValue = this.value.toLowerCase().trim();
    const cards = document.querySelectorAll('.material-card');

    cards.forEach(card => {
        const nameElement = card.querySelector('.material-name');
        if (nameElement) {
            const materialName = nameElement.textContent.toLowerCase();
            if (materialName.includes(searchValue)) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        }
    });
});
</script>
