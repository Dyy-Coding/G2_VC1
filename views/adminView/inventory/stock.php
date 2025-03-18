
<div class="container mt-3 card" style="width: 95%; padding: 20px;">
    <div class="d-flex justify-content-between mb-1">
        <div>
            <h1>All materials</h1>
            <p>Sand, Pebble, Cement,.....</p>
        </div>
        <div>
            <a href="/materials/form"class="btn btn-primary me-2">+ New Meterail</a>
            <button class="btn btn-secondary">Import</button>
            <button class="btn btn-secondary">Export</button>
        </div>
    </div>
    <div class="input-group mt-0 mb-0">
            <div class="inline-controls">
                <label for="rowsPerPage" class="me-2">Rows per page:</label>
                <select id="rowsPerPage" class="form-select" style="width: 7%;">
                    <option value="10">10</option>
                    <option value="25" selected>25</option>
                    <option value="50">50</option>
                </select>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="showOutOfStock">
                    <label class="form-check-label" for="showOutOfStock">Show out of stock</label>
                </div>
            </div>
            <div class="form-outline" data-mdb-input-init>
                <input type="search" id="form1" class="form-control"  placeholder="search"/>
            </div>
    </div>

    <table class="table text-center" >
        <thead>
            <tr>
                <th class="th-1">Product</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Supplier</th>
                <th class=" dropdown-toggle"> Type or Size</th>
                <th class=" dropdown-toggle">Price</th>
                <th>Last updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
            <tr>
                <td class="td-1">
                    <input type="checkbox" name="" id="">
                    <img src="views/assets/img/building-sand.jpg" alt="">
                     Sand number one
                </td>
                <td>Construction</td>
                <td>168</td>
                <td><button type="button" class="btn btn-success btn-sm" data-mdb-ripple-init>OUT OF STOCK</button></td>
                <td>Chandy Neat</td>
                <td>Sand</td>
                <td>15$</td>
                <td>14 April 2025</td>
                <td>
                    <a><i class="material-icons">edit</i></a>
                    <a><i class="material-icons text-danger">delete</i></a>
                </td>
            </tr>
            <tr>
                <td class="td-1">
                    <input type="checkbox" name="" id="">
                    <img src="views/assets/img/building-sand.jpg" alt="">
                     Sand number one
                </td>
                <td>Construction</td>
                <td>168</td>
                <td><button type="button" class="btn btn-success  btn-sm" data-mdb-ripple-init>OUT OF STOCK</td>
                <td>Chandy Neat</td>
                <td>Sand</td>
                <td>10$</td>
                <td>14 April 2025</td>
                <td>
                    <i class="material-icons">edit</i>
                    <i class="material-icons text-danger">delete</i>
                   
                </td>
            </tr>
            <tr>
                <td class="td-1">
                    <input type="checkbox" name="" id="">
                    <img src="views/assets/img/building-sand.jpg" alt="">
                     Sand number one
                </td>
                <td>Construction</td>
                <td>168</td>
                <td><button type="button" class="btn btn-success btn-sm" data-mdb-ripple-init>OUT OF STOCK</button></td>
                <td>Chandy Neat</td>
                <td>Sand</td>
                <td>20$</td>
                <td>14 April 2025</td>
                <td>
                    <i class="material-icons">edit</i>
                    <i class="material-icons text-danger">delete</i>
                   
                </td>
            </tr>
        </tbody>
    </table>
</div>