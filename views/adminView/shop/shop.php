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
<div  class="container mt-3 card" style="width: 95%; padding: 20px;">
    <nav>
        <div class="scrollable-container">
            <div class="relative">
                <div class="scroll-container">
                    <?php if (isset($categories) && is_array($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <button class="btn btn-outline-secondary rounded-pill"><?= htmlspecialchars($category['CategoryName']) ?></button>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <p>No categories available.</p>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="card-container">
        
    </div>

</div>