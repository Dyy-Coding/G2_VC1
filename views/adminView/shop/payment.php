<style>
    .payment-container {
        max-width: 800px;
        margin: 30px auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }

    .cart-item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
        margin-right: 15px;
    }

    .cart-item-details {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .cart-item-name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .cart-summary {
        margin-top: 20px;
        text-align: right;
    }

    .checkout-btn {
        margin-top: 20px;
        width: 100%;
    }

    .payment-options {
        margin-top: 30px;
        text-align: center;
    }

    .payment-option-btn {
        margin: 10px;
        width: 100%;
    }
</style>

<style>
    .payment-container {
        max-width: 800px;
        margin: 30px auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }

    .cart-item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
        margin-right: 15px;
    }

    .cart-item-details {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .cart-item-name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .cart-summary {
        margin-top: 20px;
        text-align: right;
    }

    .payment-options {
        margin-top: 30px;
        text-align: center;
    }

    .payment-preview {
        margin-top: 30px;
        text-align: center;
        display: none;
    }

    .payment-preview img {
        width: 200px;
        margin-bottom: 15px;
    }

    .checkout-btn {
        margin-top: 20px;
        width: 100%;
    }
</style>

<div class="container payment-container">
    <h2 class="text-center mb-4">🛒 Your Cart</h2>

    <div id="cart-items">
        <!-- Items will be dynamically injected here -->
    </div>

    <div class="cart-summary">
        <h4>Total: $<span id="cart-total">0.00</span></h4>
    </div>

    <!-- Payment Methods -->
    <div class="payment-options">
        <h3>Select Payment Method</h3>
        <button class="btn btn-primary payment-option-btn" onclick="payByCase()">Pay by Case</button>
        <button class="btn btn-success payment-option-btn" onclick="payWithABA()">Pay with ABA Bank</button>
    </div>

    <!-- Payment Preview -->
    <div id="payment-preview" class="payment-preview">
        <!-- Content will be dynamically inserted -->
    </div>

    <div class="checkout-btn">
        <button class="btn btn-success checkout-btn" onclick="checkout()">Proceed to Checkout</button>
    </div>
</div>

<!-- JavaScript Cart System -->
<script>
// Load cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Function to render cart items
function updateCartDisplay() {
    const cartContainer = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    cartContainer.innerHTML = '';
    let total = 0;

    cart.forEach((item, index) => {
        total += item.price * item.quantity;
        cartContainer.innerHTML += `
            <div class="cart-item">
                <img src="${item.image}" alt="${item.name}">
                <div class="cart-item-details">
                    <div class="cart-item-name">${item.name}</div>
                    <div>Price: $${item.price.toFixed(2)}</div>
                    <div>Quantity: ${item.quantity}</div>
                </div>
                <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Remove</button>
            </div>
        `;
    });

    cartTotal.textContent = total.toFixed(2);
    localStorage.setItem('cart', JSON.stringify(cart)); // Save cart to localStorage
}

// Remove item from cart
function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartDisplay();
}

// Checkout function
function checkout() {
    if (cart.length === 0) {
        alert('Your cart is empty!');
        return;
    }

    alert('Thank you for your purchase!');
    cart = []; // Clear cart after checkout
    localStorage.setItem('cart', JSON.stringify(cart)); // Update localStorage
    updateCartDisplay(); // Update UI
    document.getElementById('payment-preview').style.display = 'none'; // Hide payment info after checkout
}

// Pay by Case (Cash)
function payByCase() {
    const paymentPreview = document.getElementById('payment-preview');
    paymentPreview.innerHTML = `
        <img src="https://cdn-icons-png.flaticon.com/512/4279/4279596.png" alt="Case Payment">
        <h4>Pay by Case</h4>
        <p>Please visit our store to complete your payment in cash. Thank you!</p>
    `;
    paymentPreview.style.display = 'block';
}

// Pay with ABA Bank
function payWithABA() {
    const paymentPreview = document.getElementById('payment-preview');
    paymentPreview.innerHTML = `
        <img src="https://i.pinimg.com/1200x/36/9f/61/369f612149566874dcbc2d8735d51ccb.jpg" alt="ABA Payment">
        <h4>Pay with ABA Bank</h4>
        <p>Account Name: <strong>ABC Materials</strong></p>
        <p>Account Number: <strong>1234567890</strong></p>
        <p>Please complete the transfer and confirm with us.</p>
    `;
    paymentPreview.style.display = 'block';
}

// Modify Add to Cart Buttons in Material Cards to update cart
document.querySelectorAll('.btn-primary').forEach(btn => {
    btn.addEventListener('click', function() {
        const card = this.closest('.material-card');
        const name = card.querySelector('.material-name').textContent;
        const image = card.querySelector('img').src;
        const price = parseFloat(card.getAttribute('data-unit-price'));
        const quantity = parseInt(card.querySelector('.quantity-input').value);

        // Check if already in cart
        const existingItem = cart.find(item => item.name === name);
        if (existingItem) {
            existingItem.quantity += quantity;
        } else {
            cart.push({ name, image, price, quantity });
        }
        alert('Item added to cart!');
        updateCartDisplay();
    });
});

// Call this function to render the cart when the page loads
document.addEventListener('DOMContentLoaded', updateCartDisplay);
</script>
