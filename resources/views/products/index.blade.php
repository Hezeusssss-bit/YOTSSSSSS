<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products List</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        min-height: 100vh;
        margin: 0;
        padding: 80px 20px 20px;
    }

    .container {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        width: 1150px;
        max-width: 100%;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        margin: 0 auto;
        position: relative;
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Floating Alert */
    .alert {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #ffeb3b;
        color: #333;
        padding: 15px 25px;
        border-radius: 10px;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        z-index: 9999;
        opacity: 0;
        animation: fadeIn 0.5s forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translate(-50%, -20px); }
        to { opacity: 1; transform: translate(-50%, 0); }
    }

    @keyframes fadeOut {
        from { opacity: 1; transform: translate(-50%, 0); }
        to { opacity: 0; transform: translate(-50%, -20px); }
    }

    .alert.hide { animation: fadeOut 0.5s forwards; }

    /* Search bar */
    .search-box {
        margin-bottom: 20px;
        display: flex;
        gap: 10px;
    }

    .search-box input {
        padding: 10px 15px;
        width: 280px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        border-color: #2575fc;
        box-shadow: 0 0 5px rgba(37,117,252,0.5);
    }

    /* Buttons */
    .btn-create, .btn-logout {
        padding: 10px 16px;
        border-radius: 8px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-create { background: #5c6bc0; color: #fff; }
    .btn-create:hover { transform: scale(1.05); background: #3949ab; }

    .btn-logout { background: rgb(161, 13, 62); color: #fff; float: right; }
    .btn-logout:hover { background: rgb(192, 21, 21); transform: scale(1.05); }

    /* Icon buttons */
    .btn-icon {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 18px;
        padding: 6px 10px;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-icon.edit { color: #3949ab; }
    .btn-icon.edit:hover { background: #e8eaf6; transform: scale(1.2); }

    .btn-icon.delete { color: #ff9800; }
    .btn-icon.delete:hover { background: #fff3e0; transform: scale(1.2); }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 14px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    th {
        background: linear-gradient(135deg, #1976d2, #42a5f5);
        color: white;
        cursor: pointer;
        position: relative;
    }

    th.sortable:hover { background: #1565c0; }

    tr:nth-child(even) { background: #f1f5f9; }
    tr:hover { background: #e3f2fd; }

    .actions {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    /* Sorting arrows */
    .sort-arrow {
        margin-left: 8px;
        font-size: 12px;
        opacity: 0.7;
    }

    /* Delete Confirmation Modal */
    .modal {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        width: 350px;
        max-width: 90%;
        padding: 20px;
        display: none;
        z-index: 1000;
        text-align: center;
    }

    .modal h2 {
        margin: 0 0 10px;
        font-size: 20px;
        color: #333;
    }

    .modal p {
        margin-bottom: 20px;
        color: #555;
    }

    .modal-buttons {
        display: flex;
        justify-content: space-around;
    }

    .modal-buttons button {
        padding: 8px 14px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-cancel { background: #ccc; color: #333; }
    .btn-cancel:hover { background: #bbb; }

    .btn-confirm { background: #e53935; color: #fff; }
    .btn-confirm:hover { background: #c62828; }

    /* Pagination - Simple Style */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 25px;
        gap: 5px;
        flex-wrap: wrap;
        list-style: none;
        padding: 0;
        font-size: 14px;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination .page-link {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 4px;
        background: #f1f1f1;
        color: #333;
        border: 1px solid #ddd;
        text-decoration: none;
    }

    .pagination .page-link:hover {
        background: #e0e0e0;
    }

    .pagination .active .page-link {
        background: #3949ab;
        color: #fff;
        border-color: #3949ab;
        pointer-events: none;
    }

    .pagination .disabled .page-link {
        opacity: 0.5;
        pointer-events: none;
    }
</style>
</head>
<body>
    <!-- Floating Welcome Alert -->
    <div class="alert" id="welcomeAlert"> Welcome Admin!</div>

    <div class="container">
        <h1>Products List</h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>

        <!-- Search Bar -->
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Search products by name...">
            <a href="{{ route('product.create') }}" class="btn-create">+ Add New Product</a>
        </div> 

        <!-- Session Success Alert -->
        @if(session('Success'))
            <div class="alert success" id="successAlert">{{ session('Success') }}</div>
        @endif

        <table id="productsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="sortable" onclick="sortTable(1, 'string')">Name <i class="fas fa-sort sort-arrow"></i></th>
                    <th>Quantity</th>
                    <th class="sortable" onclick="sortTable(3, 'number')">Price <i class="fas fa-sort sort-arrow"></i></th>
                    <th>Description</th>
                    <th>Added On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->created_at->format('Y-m-d H:i') }}</td>
                    <td class="actions">
                        <a href="{{ route('product.edit', $product) }}" class="btn-icon edit" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('product.destroy', $product) }}" class="deleteForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-icon delete" title="Delete" onclick="confirmDelete(this)">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Laravel Pagination -->
        <div class="pagination">
            {{ $products->links() }}
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal" id="deleteModal">
            <h2>Confirm Delete</h2>
            <p>Are you sure you want to delete this product?</p>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal()">Cancel</button>
                <button class="btn-confirm" onclick="submitDelete()">Delete</button>
            </div>
        </div>
    </div>

<script>
    let currentForm = null;
    let sortDirections = {};

    function confirmDelete(button) {
        currentForm = button.closest("form");
        document.getElementById("deleteModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("deleteModal").style.display = "none";
        currentForm = null;
    }

    function submitDelete() {
        if(currentForm) {
            currentForm.submit();
        }
    }

    // Sorting function
    function sortTable(colIndex, type) {
        const table = document.getElementById("productsTable");
        const rows = Array.from(table.tBodies[0].rows);
        const dir = sortDirections[colIndex] === "asc" ? "desc" : "asc";
        sortDirections[colIndex] = dir;

        rows.sort((a, b) => {
            let valA = a.cells[colIndex].innerText.trim();
            let valB = b.cells[colIndex].innerText.trim();

            if (type === "number") {
                valA = parseFloat(valA) || 0;
                valB = parseFloat(valB) || 0;
            } else {
                valA = valA.toLowerCase();
                valB = valB.toLowerCase();
            }

            if (valA < valB) return dir === "asc" ? -1 : 1;
            if (valA > valB) return dir === "asc" ? 1 : -1;
            return 0;
        });

        rows.forEach(row => table.tBodies[0].appendChild(row));
    }

    // Auto-dismiss alerts
    setTimeout(() => {
        const alert = document.getElementById('welcomeAlert');
        if(alert) {
            alert.classList.add('hide');
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);

    setTimeout(() => {
        const successAlert = document.getElementById('successAlert');
        if(successAlert) {
            successAlert.classList.add('hide');
            setTimeout(() => successAlert.remove(), 500);
        }
    }, 3000);

    // Search filter (Name column only)
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#productsTable tbody tr");

        rows.forEach(row => {
            let nameCell = row.cells[1]?.innerText.toLowerCase(); // Only Name column
            row.style.display = nameCell && nameCell.includes(filter) ? "" : "none";
        });
    });
</script>
</body>
</html>
