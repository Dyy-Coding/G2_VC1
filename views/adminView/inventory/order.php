<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Management</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #f72585;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --border-color: #dee2e6;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --border-radius: 0.375rem;
            --transition: all 0.2s ease-in-out;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {

            margin-top: 56px;
            height: 12vh;
            border-radius: 6px;
            margin-left: 44px;
            width: 93%;
            background-color: white;
            box-shadow: var(--shadow);
            padding: 20px 0;
            margin-bottom: 30px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            font-size: 1.8rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        #title {
            margin-left: 400px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            font-size: 0.875rem;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            box-shadow: var(--shadow-md);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--border-color);
            color: var(--dark-color);
        }

        .btn-outline:hover {
            background-color: var(--light-color);
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        .card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .filter-section {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .form-control {
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 0.875rem;
            transition: var(--transition);
            flex: 1 1 200px;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        th, td {
            padding: 0.75rem 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        th {
            background-color: var(--light-color);
            font-weight: 600;
            color: var(--dark-color);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success-color);
        }

        .badge-warning {
            background-color: rgba(248, 150, 30, 0.1);
            color: var(--warning-color);
        }

        .badge-danger {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--danger-color);
        }

        .actions {
            position: relative;
        }

        .dropdown-toggle {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--dark-color);
            padding: 0.25rem;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .dropdown-toggle:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            min-width: 160px;
            z-index: 1000;
            display: none;
            padding: 0.5rem 0;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            color: var(--dark-color);
            text-decoration: none;
            transition: var(--transition);
            gap: 0.5rem;
            font-size: 0.875rem;
        }

        .dropdown-item:hover {
            background-color: var(--light-color);
        }

        .dropdown-item i {
            width: 16px;
            text-align: center;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1050;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .modal.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-dialog {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .alert {
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .detail-card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .detail-title {
            font-size: 1rem;
            font-weight: 600;
        }

        .detail-body {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }

        .detail-item {
            margin-bottom: 0.5rem;
        }

        .detail-label {
            font-size: 0.75rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }

        .detail-value {
            font-weight: 500;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
            gap: 0.5rem;
        }

        .page-item {
            list-style: none;
        }

        .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: white;
            border: 1px solid var(--border-color);
            color: var(--dark-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .page-link:hover {
            background-color: var(--light-color);
        }

        .page-link.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--border-color);
        }

        .empty-state h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .filter-section {
                flex-direction: column;
            }
            
            .form-control {
                width: 100%;
            }
            
            .detail-body {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <h1 id="title"><i class="fas fa-boxes"></i> Order Management</h1>
        </div>
    </header>

    <main class="container">
        <!-- Alert Section -->
        <div id="alertContainer"></div>

        <!-- Filter Section -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">Filters</div>
            </div>
            <div class="filter-section">
                <input type="text" id="searchMaterial" class="form-control" placeholder="Search by id or product ..." onkeyup="filterMaterials()">
                <select id="filterCategory" class="form-control" onchange="filterMaterials()">
                    <option value="">All Categories</option>
                    <option value="Raw Material">Raw Material</option>
                    <option value="Equipment">Equipment</option>
                    <option value="Tools">Tools</option>
                    <option value="Consumables">Consumables</option>
                </select>
                <select id="filterStatus" class="form-control" onchange="filterMaterials()">
                    <option value="">All Statuses</option>
                    <option value="In Stock">In Stock</option>
                    <option value="Low Stock">Low Stock</option>
                    <option value="Out of Stock">Out of Stock</option>
                </select>
            </div>
        </div>

        <!-- Materials Table -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">Materials Inventory</div>
                <div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="materialTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Supplier</th>
                            <th>Type/Size</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic rows will be added here -->
                    </tbody>
                </table>
            </div>
            <div id="pagination" class="pagination">
                <!-- Pagination will be added here -->
            </div>
        </div>

        <!-- Details Section -->
        <div id="detailsSection" class="detail-card" style="display: none;">
            <div class="detail-header">
                <div class="detail-title">Material Details</div>
                <button class="btn btn-outline btn-sm" onclick="closeDetails()">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
            <div id="detailItems" class="detail-body">
                <!-- Detail items will be added here dynamically -->
            </div>
        </div>
    </main>

    <!-- Add/Edit Modal -->
    <div id="materialModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <div class="modal-title" id="modalTitle">Add New Material</div>
                <button class="dropdown-toggle" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="materialForm">
                    <div class="form-group">
                        <label for="product" class="form-label">Product Name</label>
                        <input type="text" id="product" class="form-control" placeholder="Enter product name" required>
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" class="form-control" required>
                            <option value="">Select category</option>
                            <option value="Raw Material">Raw Material</option>
                            <option value="Equipment">Equipment</option>
                            <option value="Tools">Tools</option>
                            <option value="Consumables">Consumables</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" id="quantity" class="form-control" placeholder="Enter quantity" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" class="form-control" required>
                            <option value="In Stock">In Stock</option>
                            <option value="Low Stock">Low Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="supplier" class="form-label">Supplier</label>
                        <input type="text" id="supplier" class="form-control" placeholder="Enter supplier name" required>
                    </div>
                    <div class="form-group">
                        <label for="typeOrSize" class="form-label">Type/Size</label>
                        <input type="text" id="typeOrSize" class="form-control" placeholder="Enter type or size">
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Price (USD)</label>
                        <input type="number" id="price" class="form-control" placeholder="Enter price" min="0" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea id="notes" class="form-control" placeholder="Additional notes..." rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal()">Cancel</button>
                <button class="btn btn-primary" id="saveButton" onclick="saveMaterial()">Save Material</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-dialog" style="max-width: 400px;">
            <div class="modal-header">
                <div class="modal-title">Confirm Deletion</div>
                <button class="dropdown-toggle" onclick="closeDeleteModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this material? This action cannot be undone.</p>
                <p id="deleteMaterialName" style="font-weight: 600;"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeDeleteModal()">Cancel</button>
                <button class="btn btn-danger" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
    </div>

    <script>
        // Enhanced Material Management System
        let materials = [
            { 
                id: 1,
                product: 'Sand', 
                category: 'Raw Material', 
                quantity: 1000, 
                status: 'In Stock', 
                supplier: 'Supplier A', 
                typeOrSize: 'Fine', 
                price: 10.00,
                notes: 'High quality construction sand',
                lastUpdated: '2023-06-15'
            },
            { 
                id: 2,
                product: 'Pebble', 
                category: 'Raw Material', 
                quantity: 5, 
                status: 'Low Stock', 
                supplier: 'Supplier B', 
                typeOrSize: 'Medium', 
                price: 15.00,
                notes: 'Decorative pebbles for landscaping',
                lastUpdated: '2023-06-10'
            },
            { 
                id: 3,
                product: 'Cement', 
                category: 'Raw Material', 
                quantity: 0, 
                status: 'Out of Stock', 
                supplier: 'Supplier C', 
                typeOrSize: '50kg', 
                price: 20.00,
                notes: 'Portland cement for general construction',
                lastUpdated: '2023-05-28'
            },
            { 
                id: 4,
                product: 'Steel Bars', 
                category: 'Raw Material', 
                quantity: 120, 
                status: 'In Stock', 
                supplier: 'Supplier D', 
                typeOrSize: '12mm', 
                price: 8.50,
                notes: 'Reinforcement steel bars',
                lastUpdated: '2023-06-12'
            },
            { 
                id: 5,
                product: 'Bricks', 
                category: 'Raw Material', 
                quantity: 2500, 
                status: 'In Stock', 
                supplier: 'Supplier E', 
                typeOrSize: 'Standard', 
                price: 0.45,
                notes: 'Clay bricks for wall construction',
                lastUpdated: '2023-06-05'
            }
        ];

        let filteredMaterials = [...materials];
        let currentPage = 1;
        const itemsPerPage = 5;
        let selectedMaterialId = null;
        let isEditMode = false;

        // DOM Elements
        const materialTable = document.getElementById('materialTable');
        const detailsSection = document.getElementById('detailsSection');
        const pagination = document.getElementById('pagination');
        const alertContainer = document.getElementById('alertContainer');

        // Initialize the application
        function init() {
            populateMaterialTable();
            setupPagination();
            setupEventListeners();
        }

        // Set up event listeners
        function setupEventListeners() {
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.dropdown-toggle') && !event.target.closest('.dropdown-menu')) {
                    closeAllDropdowns();
                }
            });
        }

        // Close all dropdown menus
        function closeAllDropdowns() {
            document.querySelectorAll('.dropdown-menu').forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }

        // Populate the materials table
        function populateMaterialTable() {
            const tbody = materialTable.querySelector('tbody');
            tbody.innerHTML = '';

            if (filteredMaterials.length === 0) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td colspan="9" class="empty-state">
                        <i class="fas fa-box-open"></i>
                        <h3>No materials found</h3>
                        <p>Try adjusting your filters or add new materials</p>
                        <button class="btn btn-primary" onclick="openAddModal()">
                            <i class="fas fa-plus"></i> Add Material
                        </button>
                    </td>
                `;
                tbody.appendChild(row);
                return;
            }

            const startIndex = (currentPage - 1) * itemsPerPage;
            const paginatedItems = filteredMaterials.slice(startIndex, startIndex + itemsPerPage);

            paginatedItems.forEach(material => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${material.id}</td>
                    <td>${material.product}</td>
                    <td>${material.category}</td>
                    <td>${material.quantity}</td>
                    <td>
                        <span class="badge ${getStatusClass(material.status)}">
                            ${material.status}
                        </span>
                    </td>
                    <td>${material.supplier}</td>
                    <td>${material.typeOrSize}</td>
                    <td>$${material.price.toFixed(2)}</td>
                    <td class="actions">
                        <button class="dropdown-toggle" onclick="toggleDropdown(event, ${material.id})">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu" id="dropdown-${material.id}">
                            <a href="#" class="dropdown-item" onclick="showMaterialDetails(${material.id})">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                            <a href="#" class="dropdown-item" onclick="openEditModal(${material.id})">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="#" class="dropdown-item text-danger" onclick="openDeleteModal(${material.id})">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        // Get status badge class
        function getStatusClass(status) {
            switch (status) {
                case 'In Stock': return 'badge-success';
                case 'Low Stock': return 'badge-warning';
                case 'Out of Stock': return 'badge-danger';
                default: return '';
            }
        }

        // Toggle dropdown menu - FIXED: Proper event handling and positioning
        function toggleDropdown(event, materialId) {
            event.preventDefault();
            event.stopPropagation();
            
            // Close all other dropdowns first
            closeAllDropdowns();
            
            // Open the clicked dropdown
            const dropdown = document.getElementById(`dropdown-${materialId}`);
            if (dropdown) {
                dropdown.classList.toggle('show');
            }
        }

        // Setup pagination
        function setupPagination() {
            pagination.innerHTML = '';
            const pageCount = Math.ceil(filteredMaterials.length / itemsPerPage);

            if (pageCount <= 1) return;

            // Previous button
            const prevLi = document.createElement('li');
            prevLi.className = 'page-item';
            prevLi.innerHTML = `
                <a class="page-link" href="#" onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'style="pointer-events: none; opacity: 0.5;"' : ''}>
                    <i class="fas fa-chevron-left"></i>
                </a>
            `;
            pagination.appendChild(prevLi);

            // Page numbers
            for (let i = 1; i <= pageCount; i++) {
                const li = document.createElement('li');
                li.className = 'page-item';
                li.innerHTML = `
                    <a class="page-link ${i === currentPage ? 'active' : ''}" href="#" onclick="changePage(${i})">
                        ${i}
                    </a>
                `;
                pagination.appendChild(li);
            }

            // Next button
            const nextLi = document.createElement('li');
            nextLi.className = 'page-item';
            nextLi.innerHTML = `
                <a class="page-link" href="#" onclick="changePage(${currentPage + 1})" ${currentPage === pageCount ? 'style="pointer-events: none; opacity: 0.5;"' : ''}>
                    <i class="fas fa-chevron-right"></i>
                </a>
            `;
            pagination.appendChild(nextLi);
        }

        // Change page
        function changePage(page) {
            if (page < 1 || page > Math.ceil(filteredMaterials.length / itemsPerPage)) return;
            currentPage = page;
            populateMaterialTable();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Filter materials
        function filterMaterials() {
            const searchTerm = document.getElementById('searchMaterial').value.toLowerCase();
            const categoryFilter = document.getElementById('filterCategory').value;
            const statusFilter = document.getElementById('filterStatus').value;

            filteredMaterials = materials.filter(material => {
                const matchesSearch = material.product.toLowerCase().includes(searchTerm) || 
                                    material.supplier.toLowerCase().includes(searchTerm);
                const matchesCategory = categoryFilter ? material.category === categoryFilter : true;
                const matchesStatus = statusFilter ? material.status === statusFilter : true;
                
                return matchesSearch && matchesCategory && matchesStatus;
            });

            currentPage = 1;
            populateMaterialTable();
            setupPagination();
        }

        // Reset filters
        function resetFilters() {
            document.getElementById('searchMaterial').value = '';
            document.getElementById('filterCategory').value = '';
            document.getElementById('filterStatus').value = '';
            filteredMaterials = [...materials];
            currentPage = 1;
            populateMaterialTable();
            setupPagination();
        }

        // Show material details
        function showMaterialDetails(materialId) {
            event.preventDefault();
            event.stopPropagation();
            
            const material = materials.find(m => m.id === materialId);
            if (!material) return;

            detailsSection.style.display = 'block';
            const detailItems = document.getElementById('detailItems');
            detailItems.innerHTML = '';

            const details = [
                { label: 'Product Name', value: material.product },
                { label: 'Category', value: material.category },
                { label: 'Quantity', value: material.quantity },
                { label: 'Status', value: `<span class="badge ${getStatusClass(material.status)}">${material.status}</span>` },
                { label: 'Supplier', value: material.supplier },
                { label: 'Type/Size', value: material.typeOrSize },
                { label: 'Price', value: `$${material.price.toFixed(2)}` },
                { label: 'Last Updated', value: material.lastUpdated },
                { label: 'Notes', value: material.notes || 'N/A' }
            ];

            details.forEach(detail => {
                const item = document.createElement('div');
                item.className = 'detail-item';
                item.innerHTML = `
                    <div class="detail-label">${detail.label}</div>
                    <div class="detail-value">${detail.value}</div>
                `;
                detailItems.appendChild(item);
            });

            // Scroll to details section
            detailsSection.scrollIntoView({ behavior: 'smooth' });
        }

        // Close details section
        function closeDetails() {
            detailsSection.style.display = 'none';
        }

        // Open add modal
        function openAddModal() {
            isEditMode = false;
            selectedMaterialId = null;
            document.getElementById('modalTitle').textContent = 'Add New Material';
            document.getElementById('saveButton').textContent = 'Add Material';
            document.getElementById('materialForm').reset();
            document.getElementById('materialModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        // Open edit modal - FIXED: Proper event handling
        function openEditModal(materialId) {
            event.preventDefault();
            event.stopPropagation();
            
            const material = materials.find(m => m.id === materialId);
            if (!material) return;

            isEditMode = true;
            selectedMaterialId = materialId;
            document.getElementById('modalTitle').textContent = 'Edit Material';
            document.getElementById('saveButton').textContent = 'Update Material';
            
            // Fill form with material data
            document.getElementById('product').value = material.product;
            document.getElementById('category').value = material.category;
            document.getElementById('quantity').value = material.quantity;
            document.getElementById('status').value = material.status;
            document.getElementById('supplier').value = material.supplier;
            document.getElementById('typeOrSize').value = material.typeOrSize;
            document.getElementById('price').value = material.price;
            document.getElementById('notes').value = material.notes || '';
            
            document.getElementById('materialModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        // Save material (add or edit)
        function saveMaterial() {
            const product = document.getElementById('product').value.trim();
            const category = document.getElementById('category').value;
            const quantity = parseInt(document.getElementById('quantity').value);
            const status = document.getElementById('status').value;
            const supplier = document.getElementById('supplier').value.trim();
            const typeOrSize = document.getElementById('typeOrSize').value.trim();
            const price = parseFloat(document.getElementById('price').value);
            const notes = document.getElementById('notes').value.trim();

            // Simple validation
            if (!product || isNaN(quantity) || !supplier || isNaN(price)) {
                showAlert('Please fill in all required fields with valid data.', 'danger');
                return;
            }

            const today = new Date().toISOString().split('T')[0];

            if (isEditMode) {
                // Update existing material
                const index = materials.findIndex(m => m.id === selectedMaterialId);
                if (index !== -1) {
                    materials[index] = {
                        ...materials[index],
                        product,
                        category,
                        quantity,
                        status,
                        supplier,
                        typeOrSize,
                        price,
                        notes,
                        lastUpdated: today
                    };
                    showAlert('Material updated successfully!', 'success');
                }
            } else {
                // Add new material
                const newId = materials.length > 0 ? Math.max(...materials.map(m => m.id)) + 1 : 1;
                materials.push({
                    id: newId,
                    product,
                    category,
                    quantity,
                    status,
                    supplier,
                    typeOrSize,
                    price,
                    notes,
                    lastUpdated: today
                });
                showAlert('Material added successfully!', 'success');
            }

            closeModal();
            filterMaterials();
        }

        // Open delete confirmation modal - FIXED: Proper event handling
        function openDeleteModal(materialId) {
            event.preventDefault();
            event.stopPropagation();
            
            const material = materials.find(m => m.id === materialId);
            if (!material) return;

            selectedMaterialId = materialId;
            document.getElementById('deleteMaterialName').textContent = material.product;
            document.getElementById('deleteModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        // Close delete modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        // Confirm deletion
        function confirmDelete() {
            if (!selectedMaterialId) return;
            
            materials = materials.filter(m => m.id !== selectedMaterialId);
            showAlert('Material deleted successfully!', 'success');
            closeDeleteModal();
            filterMaterials();
        }

        // Close modal
        function closeModal() {
            document.getElementById('materialModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        // Show alert message
        function showAlert(message, type) {
            const alert = document.createElement('div');
            alert.className = `alert alert-${type}`;
            alert.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                ${message}
                <button class="btn btn-outline btn-sm" onclick="this.parentElement.remove()" style="float: right;">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            alertContainer.innerHTML = '';
            alertContainer.appendChild(alert);
            
            // Auto-remove after 5 seconds
            setTimeout(() => {
                alert.remove();
            }, 5000);
        }

        // Initialize the application when the page loads
        window.onload = init;
    </script>
</body>
</html>