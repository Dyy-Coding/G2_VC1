
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
    <div class="input-group">
        <div class="form-outline" data-mdb-input-init>
            <input type="search" id="form1" class="form-control"  placeholder="search"/>
            <br>
            <i class="material-icons search" style="font-size:32px">search</i>
        </div>
        <div class="dropdown">
            <button
                class="btn btn-primary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-mdb-dropdown-init
                data-mdb-ripple-init
                aria-expanded="false"
            >
                Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            <div class="checkbox">
                <input  type="checkbox" value="" />
                <span>Show out of stock</span>
            </div>
        </div>

    </div>

    <table class="table text-center" >
        <thead>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Supplier</th>
                <th>Last updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
            <tr>
                <td> Sand number one</td>
                <td>Construction</td>
                <td>168</td>
                <td><button type="button" class="btn btn-success " data-mdb-ripple-init>OUT OF STOCK</button></td>
                <td>
                    <h6>Chandy Neat</h6>
                    <span>chandy@gamil.com</span>
                </td>
                <td>14 April 2025</td>
                <td>
                    <a href="/users/edit/<?= $user['id'] ?>"><i class="material-icons">edit</i></a>
                    <a href="/users/delete/<?= $user['id'] ?>"><i class="material-icons text-danger">delete</i></a>
                   
                </td>
            </tr>
            <tr>
                <td> Sand number one</td>
                <td>Construction</td>
                <td>168</td>
                <td><button type="button" class="btn btn-success " data-mdb-ripple-init>OUT OF STOCK</button></td>
                <td>
                    <h6>Chandy Neat</h6>
                    <span>chandy@gamil.com</span>
                </td>
                <td>14 April 2025</td>
                <td>
                    <a href="/users/edit/<?= $user['id'] ?>"><i class="material-icons">edit</i></a>
                    <a href="/users/delete/<?= $user['id'] ?>"><i class="material-icons text-danger">delete</i></a>
                   
                </td>
            </tr>
            <tr>
                <td> Sand number one</td>
                <td>Construction</td>
                <td>168</td>
                <td><button type="button" class="btn btn-success " data-mdb-ripple-init>OUT OF STOCK</button></td>
                <td>
                    <h6>Chandy Neat</h6>
                    <span>chandy@gamil.com</span>
                </td>
                <td>14 April 2025</td>
                <td>
                    <a href="/users/edit/<?= $user['id'] ?>"><i class="material-icons">edit</i></a>
                    <a href="/users/delete/<?= $user['id'] ?>"><i class="material-icons text-danger">delete</i></a>
                   
                </td>
            </tr>

        </tbody>
    </table>
</div>