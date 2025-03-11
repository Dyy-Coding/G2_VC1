
<div class="container mt-5 card" style="width: 95%; padding: 20px;">
    <div class="d-flex justify-content-between mb-3">
        <div>
            <h1>All products</h1>
            <p>Sand, Pebble, Cement,.....</p>
        </div>
        <div>
            <button class="btn btn-primary me-2">+ New Products</button>
            <button class="btn btn-secondary">Import</button>
            <button class="btn btn-secondary">Export</button>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
    <div >
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                3 entries per page
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">3</a></li>
                <li><a class="dropdown-item" href="#">5</a></li>
                <li><a class="dropdown-item" href="#">10</a></li>
            </ul>
        </div>
        <div>
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </div>

    <table class="table text-center" >
        <thead>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Type/Size</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody >
            <tr>
                <td><i class="bi bi-lightbulb"></i>
                <img src="" alt="image"> Sand number one</td>
                <td>Construction</td>
                <td>$1,680</td>
                <td>m³</td>
                <td>0</td>
                <td><button type="button" class="btn btn-success " data-mdb-ripple-init>OUT OF STOCK</button></td>
            </tr>
            <tr>
                <td><i class="bi bi-lightbulb"></i>
                <img src="" alt="image"> Bulb yellow light</td>
                <td>Electronic</td>
                <td>$4,310</td>
                <td>inches</td>
                <td>168</td>
                <td><button type="button" class="btn btn-danger " data-mdb-ripple-init>Have in stock</button></td>
            </tr>
        </tbody>
    </table>
</div>