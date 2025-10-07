<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Products List</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
::-webkit-scrollbar { width: 8px; }
::-webkit-scrollbar-track { background: #f1f1f1; }
::-webkit-scrollbar-thumb { background: #888; border-radius: 4px; }
::-webkit-scrollbar-thumb:hover { background: #555; }
body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif; background: #f5f5f5; min-height: 100vh; margin: 0; display: flex; }

/* Sidebar */
.sidebar { width: 250px; background: #1a1a2e; min-height: 100vh; padding: 30px 0; position: fixed; left: 0; top: 0; display: flex; flex-direction: column; }
.logo { color: #fff; font-size: 24px; font-weight: 700; padding: 0 30px; margin-bottom: 50px; display: flex; align-items: center; gap: 10px; }
.nav-menu { flex: 1; }
.nav-item { color: #999; padding: 15px 30px; text-decoration: none; display: flex; align-items: center; gap: 10px; transition: all 0.3s ease; cursor: pointer; font-size: 15px; }
.nav-item i { width: 20px; text-align: center; }
.nav-item:hover { background: rgba(255,255,255,0.05); color: #fff; }
.nav-item.active { color: #fff; background: rgba(255,255,255,0.1); border-left: 3px solid #fff; }
.sidebar-footer { margin-top: auto; }

/* Main Content */
.main-content { margin-left: 250px; flex: 1; padding: 30px 40px; }

/* Header */
.header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
.header h1 { color: #1a1a2e; font-size: 28px; font-weight: 700; }
.header-icons { display: flex; gap: 15px; align-items: center; }
.icon-btn { width: 40px; height: 40px; border-radius: 50%; background: #fff; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
.icon-btn:hover { background: #f5f5f5; transform: translateY(-2px); }
.icon-btn i { color: #333; font-size: 16px; }

/* Container */
.container { background: #fff; border-radius: 15px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }

/* Floating Alert */
.alert { position: fixed; top: 20px; right: 20px; background-color: #17002B; color: #ffffff; padding: 15px 25px; border-radius: 10px; font-weight: 600; box-shadow: 0 4px 15px #17002B; z-index: 9999; opacity: 0; animation: slideIn 0.5s forwards; }
.alert.success { background-color: #17002B; color: #fff; }
@keyframes slideIn { from { opacity: 0; transform: translateX(100px); } to { opacity: 1; transform: translateX(0); } }
@keyframes slideOut { from { opacity: 1; transform: translateX(0); } to { opacity: 0; transform: translateX(100px); } }
.alert.hide { animation: slideOut 0.5s forwards; }

/* Filter & Search Section */
.filter-section { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px; }
.filter-left { display: flex; gap: 10px; align-items: center; }
.filter-btn { padding: 10px 20px; border-radius: 8px; border: 1px solid #ddd; background: #fff; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px; }
.filter-btn:hover { background: #1a1a2e; color: #fff; border-color: #1a1a2e; }
.search-container { position: relative; display: flex; align-items: center; }
.search-container i { position: absolute; left: 15px; color: #999; font-size: 14px; }
.search-container input { padding: 10px 15px 10px 40px; border-radius: 8px; border: 1px solid #ddd; font-size: 14px; width: 300px; transition: all 0.3s ease; }
.search-container input:focus { outline: none; border-color: #1a1a2e; box-shadow: 0 0 0 3px rgba(26, 26, 46, 0.1); }
.filter-right { display: flex; gap: 10px; }
.btn-add { padding: 10px 20px; border-radius: 8px; background: #fff; border: 1px solid #ddd; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; text-decoration: none; color: #333; display: flex; align-items: center; gap: 8px; }
.btn-add:hover { background: #1a1a2e; color: #fff; border-color: #1a1a2e; }
.btn-export { padding: 10px 20px; border-radius: 8px; background: #1a1a2e; border: none; color: #fff; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px; }
.btn-export:hover { background: #0f0f1e; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(26, 26, 46, 0.3); }

/* Table */
.table-wrapper { overflow-x: auto; border-radius: 10px; border: 1px solid #e5e5e5; }
table { width: 100%; border-collapse: collapse; }
thead { background: #fafafa; border-bottom: 2px solid #e5e5e5; }
th { padding: 15px; text-align: left; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase; letter-spacing: 0.5px; }
th.sortable { cursor: pointer; user-select: none; }
th.sortable:hover { background: #f0f0f0; }
td { padding: 18px 15px; border-bottom: 1px solid #f0f0f0; font-size: 14px; color: #333; }
tbody tr { transition: background 0.2s ease; }
tbody tr:hover { background: #fafafa; }
.actions { display: flex; gap: 10px; justify-content: flex-start; }
.btn-icon { background: none; border: none; cursor: pointer; font-size: 16px; padding: 6px; border-radius: 6px; transition: all 0.3s ease; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; }
.btn-icon.view { color: #666; }
.btn-icon.view:hover { background: #f0f0f0; color: #1a1a2e; }
.btn-icon.edit { color: #666; }
.btn-icon.edit:hover { background: #e3f2fd; color: #2196f3; }
.btn-icon.delete { color: #666; }
.btn-icon.delete:hover { background: #ffebee; color: #f44336; }

/* Pagination */
.pagination-container { display: flex; justify-content: space-between; align-items: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e5e5; }
.per-page-selector { display: flex; align-items: center; gap: 10px; font-size: 14px; color: #666; }
.per-page-selector select { padding: 8px 12px; border-radius: 6px; border: 1px solid #e5e5e5; background: #fff; font-size: 14px; cursor: pointer; transition: all 0.3s ease; }
.per-page-selector select:focus { outline: none; border-color: #1a1a2e; box-shadow: 0 0 0 3px rgba(26, 26, 46, 0.1); }
.per-page-selector select:hover { border-color: #1a1a2e; }
.pagination { display: flex; gap: 5px; list-style: none; padding: 0; margin: 0; }
.pagination li { display: inline-block; }
.pagination .page-link { display: flex; align-items: center; justify-content: center; min-width: 32px; height: 32px; padding: 0 10px; border-radius: 6px; background: #fff; color: #333; border: 1px solid #ddd; text-decoration: none; font-weight: 500; font-size: 13px; transition: all 0.3s ease; }
.pagination .page-link:hover { background: #f5f5f5; border-color: #999; }
.pagination .active .page-link { background: #1a1a2e; color: #fff; border-color: #1a1a2e; pointer-events: none; }
.pagination .disabled .page-link { opacity: 0.4; pointer-events: none; cursor: not-allowed; }

/* Delete & Add Modal */
.modal { position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; border-radius: 15px; box-shadow: 0 10px 40px rgba(0,0,0,0.3); width: 400px; max-width: 90%; padding: 30px; display: none; z-index: 2000; }
.modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: none; z-index: 1999; }
.modal h2 { margin: 0 0 10px; font-size: 22px; color: #1a1a2e; }
.modal p { margin-bottom: 25px; color: #666; font-size: 15px; }
.modal-buttons { display: flex; justify-content: flex-end; gap: 10px; }
.modal-buttons button { padding: 10px 24px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; font-size: 14px; }
.btn-cancel { background: #f5f5f5; color: #333; }
.btn-cancel:hover { background: #e5e5e5; }
.btn-confirm { background: #f44336; color: #fff; }
.btn-confirm:hover { background: #d32f2f; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(244, 67, 54, 0.3); }

/* Modal form inputs */
.modal form div { display: flex; flex-direction: column; gap: 6px; margin-bottom: 12px; }
.modal label { font-size: 13px; color: #555; font-weight: 700; }
.modal input[type="text"],
.modal input[type="number"],
.modal input[type="email"],
.modal input[type="password"] {
  padding: 12px 14px;
  border: 1px solid #e5e5e5;
  border-radius: 10px;
  background: #fafafa;
  font-size: 14px;
  color: #333;
  transition: all 0.2s ease;
}
.modal input[type="text"]:focus,
.modal input[type="number"]:focus,
.modal input[type="email"]:focus,
.modal input[type="password"]:focus {
  outline: none;
  border-color: #1a1a2e;
  box-shadow: 0 0 0 3px rgba(26, 26, 46, 0.1);
  background: #fff;
}
.error-message { color: #f44336; font-size: 12px; }

/* Responsive */
@media (max-width: 768px) {
  .sidebar { width: 70px; }
  .logo span, .nav-item span { display: none; }
  .main-content { margin-left: 70px; padding: 20px; }
  .filter-section { flex-direction: column; align-items: stretch; }
  .search-container input { width: 100%; }
}
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="logo"><i class="fas fa-store"></i> <span>Logo</span></div>
  <nav class="nav-menu">
    <a href="products" class="nav-item active"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
    <a href="#" class="nav-item"><i class="fas fa-boxes"></i><span>Services</span></a>
    <a href="#" class="nav-item"><i class="fas fa-users"></i><span>Events</span></a>
  </nav>
  <div class="sidebar-footer">
    <a href="#" class="nav-item"><i class="fas fa-cog"></i><span>Settings</span></a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="button" class="nav-item" style="background:none;border:none;width:100%;text-align:left;" onclick="confirmLogout(this)">
        <i class="fas fa-sign-out-alt"></i><span>Logout</span>
      </button>
    </form>
  </div>
</div>

<!-- Main Content -->
<div class="main-content">
  <div class="header">
    <h1>Total Residents</h1>
    <div class="header-icons">
      <button class="icon-btn"><i class="fas fa-bell"></i></button>
      <button class="icon-btn"><i class="fas fa-user"></i></button>
    </div>
  </div>

  @if(session('Success'))
    <div class="alert success" id="successAlert">{{ session('Success') }}</div>
  @else
    <div class="alert" id="welcomeAlert">Welcome Admin!</div>
  @endif

  <div class="container">
    <!-- Filter & Search -->
    <div class="filter-section">
      <div class="filter-left">
        <button class="filter-btn">ALL <i class="fas fa-chevron-down"></i></button>
        <button class="filter-btn">FILTER <i class="fas fa-chevron-down"></i></button>
        <div class="search-container">
          <i class="fas fa-search"></i>
          <input type="text" id="searchInput" placeholder="Search" value="{{ request('search') }}" onkeyup="liveSearch()" />
        </div>
      </div>
      <div class="filter-right">
        <button class="btn-add" onclick="openAddModal()">ADD <i class="fas fa-plus"></i></button>
        <button class="btn-export">EXPORT <i class="fas fa-download"></i></button>
      </div>
    </div>

    <!-- Table -->
    <div class="table-wrapper">
      <table id="productsTable">
        <thead>
          <tr>
            <th>ID</th>
            <th class="sortable" onclick="sortTable(1,'string')">LASTNAME <i class="fas fa-sort sort-arrow"></i></th>
            <th class="sortable" onclick="sortTable(2,'string')">NAME <i class="fas fa-sort sort-arrow"></i></th>
            <th>AGE</th>
            <th>ADDRESS</th>
            <th>ADDED ON</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->qty }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->created_at->format('M d, Y') }}</td>
            <td>
              <div class="actions">
                <a href="{{ route('product.show', $product->id) }}" class="btn-icon view"><i class="fas fa-eye"></i></a>
                <a href="#" class="btn-icon edit" onclick="openEditModal('{{ route('product.update', $product->id) }}','{{ addslashes($product->name) }}','{{ $product->qty }}','{{ $product->price }}','{{ addslashes($product->description) }}'); return false;"><i class="fas fa-edit"></i></a>
                <button type="button" class="btn-icon delete" onclick="openDeleteModal('{{ route('product.destroy', $product->id) }}')"><i class="fas fa-trash"></i></button>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" style="text-align:center;color:#999;">No products found.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="pagination-container">
      <div class="per-page-selector">
        <span>Show</span>
        <select onchange="changePerPage(this.value)">
          <option value="10" {{ request('per_page')==10?'selected':'' }}>10</option>
          <option value="25" {{ request('per_page')==25?'selected':'' }}>25</option>
          <option value="50" {{ request('per_page')==50?'selected':'' }}>50</option>
          <option value="100" {{ request('per_page')==100?'selected':'' }}>100</option>
        </select>
        <span>per page</span>
        <span style="margin-left:16px;color:#666;">Total Residents: <strong>{{ number_format($totalResidents) }}</strong></span>
      </div>
      {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
  </div>
</div>

<!-- Add Product Modal -->
<div class="modal-overlay" id="addProductOverlay"></div>
<div class="modal" id="addProductModal">
  <h2>Create New Product</h2>
  <form method="POST" action="{{ route('product.store') }}">
    @csrf
    <div>
      <label>Name</label>
      <input type="text" name="name" placeholder="Product name" value="{{ old('name') }}">
      @error('name')<div class="error-message">{{ $message }}</div>@enderror
    </div>
    <div>
      <label>Lastname</label>
      <input type="text" name="qty" placeholder="Lastname" value="{{ old('qty') }}">
      @error('qty')<div class="error-message">{{ $message }}</div>@enderror
    </div>
    <div>
      <label>Age</label>
      <input type="text" name="price" placeholder="Age" value="{{ old('price') }}">
      @error('price')<div class="error-message">{{ $message }}</div>@enderror
    </div>
    <div>
      <label>Address</label>
      <input type="text" name="description" placeholder="Address" value="{{ old('description') }}">
      @error('description')<div class="error-message">{{ $message }}</div>@enderror
    </div>
    <div class="modal-buttons" style="margin-top:15px;">
      <button type="submit" class="btn-add">Save</button>
      <button type="button" class="btn-cancel" onclick="closeAddModal()">Cancel</button>
    </div>
  </form>
</div>

  <!-- Edit Product Modal (same design as Add) -->
  <div class="modal-overlay" id="editProductOverlay"></div>
  <div class="modal" id="editProductModal">
    <h2>Update Product</h2>
    <form id="editProductForm" method="POST">
      @csrf
      @method('PUT')
      <div>
        <label>Name</label>
        <input type="text" name="name" id="edit_name" placeholder="Product name">
        @error('name')<div class="error-message">{{ $message }}</div>@enderror
      </div>
      <div>
        <label>Lastname</label>
        <input type="text" name="qty" id="edit_qty" placeholder="Lastname">
        @error('qty')<div class="error-message">{{ $message }}</div>@enderror
      </div>
      <div>
        <label>Age</label>
        <input type="text" name="price" id="edit_price" placeholder="Age">
        @error('price')<div class="error-message">{{ $message }}</div>@enderror
      </div>
      <div>
        <label>Address</label>
        <input type="text" name="description" id="edit_description" placeholder="Address">
        @error('description')<div class="error-message">{{ $message }}</div>@enderror
      </div>
      <div class="modal-buttons" style="margin-top:15px;">
        <button type="submit" class="btn-add">Save</button>
        <button type="button" class="btn-cancel" onclick="closeEditModal()">Cancel</button>
      </div>
    </form>
  </div>

<!-- Delete Modal -->
<div class="modal-overlay" id="modalOverlay"></div>
<div class="modal" id="deleteModal">
  <h2>Delete Product</h2>
  <p>Are you sure you want to delete this product?</p>
  <div class="modal-buttons">
    <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
    <form id="deleteForm" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn-confirm">Delete</button>
    </form>
  </div>
</div>

<script>
function openDeleteModal(action) {
  document.getElementById('deleteForm').action = action;
  document.getElementById('modalOverlay').style.display = 'block';
  document.getElementById('deleteModal').style.display = 'block';
}
function closeDeleteModal() {
  document.getElementById('modalOverlay').style.display = 'none';
  document.getElementById('deleteModal').style.display = 'none';
}
function openAddModal() {
  document.getElementById('addProductOverlay').style.display = 'block';
  document.getElementById('addProductModal').style.display = 'block';
}
function closeAddModal() {
  document.getElementById('addProductOverlay').style.display = 'none';
  document.getElementById('addProductModal').style.display = 'none';
}
function openEditModal(action, name, qty, price, description) {
  document.getElementById('editProductOverlay').style.display = 'block';
  document.getElementById('editProductModal').style.display = 'block';
  const form = document.getElementById('editProductForm');
  form.action = action;
  document.getElementById('edit_name').value = name;
  document.getElementById('edit_qty').value = qty;
  document.getElementById('edit_price').value = price;
  document.getElementById('edit_description').value = description;
}
function closeEditModal() {
  document.getElementById('editProductOverlay').style.display = 'none';
  document.getElementById('editProductModal').style.display = 'none';
}
function confirmLogout(button) {
  if(confirm('Are you sure you want to log out?')) button.closest('form').submit();
}
setTimeout(()=>{
  const alert = document.getElementById('successAlert') || document.getElementById('welcomeAlert');
  if(alert){ alert.classList.add('hide'); setTimeout(()=>alert.remove(),500); }
},3000);
function liveSearch() {
  const input=document.getElementById('searchInput').value.toLowerCase();
  const rows=document.getElementById('productsTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
  for(let row of rows){
    let match=false;
    for(let cell of row.getElementsByTagName('td')){
      if(cell.textContent.toLowerCase().includes(input)){ match=true; break; }
    }
    row.style.display=match?'':'none';
  }
}

function changePerPage(value){
  const params = new URLSearchParams(window.location.search);
  params.set('per_page', value);
  window.location.search = params.toString();
}

// Sort table by column index and type ('string' or 'number')
function sortTable(columnIndex, type){
  const table = document.getElementById('productsTable');
  const tbody = table.tBodies[0];
  const rows = Array.from(tbody.querySelectorAll('tr')).filter(r => r.style.display !== 'none');
  const current = table.getAttribute('data-sort-col');
  const dir = current == columnIndex && table.getAttribute('data-sort-dir') === 'asc' ? 'desc' : 'asc';
  rows.sort((a,b)=>{
    const av = a.children[columnIndex].textContent.trim();
    const bv = b.children[columnIndex].textContent.trim();
    if(type==='number'){
      const an = parseFloat(av) || 0; const bn = parseFloat(bv) || 0;
      return dir==='asc' ? an-bn : bn-an;
    }
    return dir==='asc' ? av.localeCompare(bv) : bv.localeCompare(av);
  });
  rows.forEach(r=>tbody.appendChild(r));
  table.setAttribute('data-sort-col', columnIndex);
  table.setAttribute('data-sort-dir', dir);
}
</script>
</body>
</html>
