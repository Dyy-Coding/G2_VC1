<div class="container mt-3 card" style="width: 95%; padding: 25px;">
    <h1 class="h3">Add Sale Order</h1>
    <form action="/admin/saleorder/add" method="POST">
        <div class="mb-3">
            <label for="customerID" class="form-label">Customer</label>
            <input type="number" class="form-control" id="customerID" name="customerID" required>
        </div>
        <div class="mb-3">
            <label for="materialID" class="form-label">Material</label>
            <input type="number" class="form-control" id="materialID" name="materialID" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="mb-3">
            <label for="totalAmount" class="form-label">Total Amount</label>
            <input type="text" class="form-control" id="totalAmount" name="totalAmount" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Sale Order</button>
    </form>
</div>