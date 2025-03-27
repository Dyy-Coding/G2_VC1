<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Edit Category</h2>
        </div>
        <div class="card-body">
            <form action="/category/update/<?= htmlspecialchars($category['CategoryID']) ?>" method="POST">
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Category Name</label>
                    <input type="text" id="categoryName" name="CategoryName" class="form-control"
                        value="<?= htmlspecialchars($category['CategoryName'] ?? '') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="Description" class="form-control" required>
                        <?= htmlspecialchars($category['Description'] ?? '') ?>
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Category</button>
                <a href="/category" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
