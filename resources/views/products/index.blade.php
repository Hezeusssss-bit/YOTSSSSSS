<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products List</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        min-height: 100vh;
        margin: 0;
        padding: 80px 20px 20px; /* leave space for alerts */
    }

    .container {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        width: 1100px;
        max-width: 100%;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        position: relative;
        margin: 0 auto;
        overflow: hidden;
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
        text-align: center;
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

    .alert.hide {
        animation: fadeOut 0.5s forwards;
    }

    /* Search bar */
    .search-box {
        margin-bottom: 20px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 10px;
    }

    .search-box input {
        padding: 10px 15px;
        width: 280px;
        border-radius: 8px;
        border: 1px solid #ccc;
        outline: none;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        border-color: #2575fc;
        box-shadow: 0 0 5px rgba(37,117,252,0.5);
    }

    /* Buttons */
    .btn-create, .btn-logout, .btn-edit, .btn-delete {
        text-decoration: none;
        padding: 10px 16px;
        border-radius: 8px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-create { background: #5c6bc0; color: #fff; }
    .btn-create:hover { transform: scale(1.05); background: #3949ab; }

    .btn-logout { background:rgb(161, 13, 62); color: #fff; float: right; }
    .btn-logout:hover { background:rgb(192, 21, 21); transform: scale(1.05); }

    .btn-edit { background: #3949ab; color: #fff; }
    .btn-edit:hover { background: #5c6bc0; transform: scale(1.05); }

    .btn-delete { background: #ff9800; color: #fff; }
    .btn-delete:hover { background: #fb8c00; transform: scale(1.05); }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
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
    }

    tr:nth-child(even) { background: #f1f5f9; }
    tr:hover { background: #e3f2fd; }

    .actions {
        display: flex;
        gap: 5px;
        justify-content: center;
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
            <input type="text" id="searchInput" placeholder="Search products...">
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
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Description</th>
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
                    <td class="actions">
                        <a href="{{ route('product.edit', $product) }}" class="btn-edit">Edit</a>
                        <form method="POST" action="{{ route('product.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

<script>
    // Auto-dismiss welcome alert
    setTimeout(() => {
        const alert = document.getElementById('welcomeAlert');
        if(alert) {
            alert.classList.add('hide');
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);

    // Auto-dismiss success alert
    setTimeout(() => {
        const successAlert = document.getElementById('successAlert');
        if(successAlert) {
            successAlert.classList.add('hide');
            setTimeout(() => successAlert.remove(), 500);
        }
    }, 3000);

    // Search filter
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#productsTable tbody tr");

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>
</body>
</html>
