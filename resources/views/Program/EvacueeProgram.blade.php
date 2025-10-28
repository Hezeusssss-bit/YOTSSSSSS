<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Evacuee Program</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
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
.header-icons { display: flex; gap: 12px; align-items: center; }
.icon-btn { width: 40px; height: 40px; border-radius: 50%; background: #fff; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
.icon-btn i { color: #333; font-size: 16px; }
.icon-btn:hover { background: #f5f5f5; transform: translateY(-2px); }

/* Back button */
.btn-back { display: inline-flex; align-items: center; gap: 8px; padding: 10px 14px; border-radius: 999px; border: 1px solid #e5e7eb; background: #fff; color: #1a1a2e; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06); transition: transform .15s ease, box-shadow .15s ease, background .15s ease; font-weight: 600; font-size: 14px; }
.btn-back:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); background:#f9fafb; }
.btn-back i { font-size: 14px; color:#1a1a2e; }

/* Container */
.container { background: #fff; border-radius: 15px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }

/* Toolbar */
.toolbar { display:flex; align-items:center; gap:12px; flex-wrap:wrap; margin-top:20px; }
.toolbar .select, .toolbar .search { border:1px solid #e5e7eb; background:#fff; color:#1a1a2e; border-radius:10px; padding:10px 12px; font-size:14px; }
.toolbar .search { min-width: 240px; }
.btn { display:inline-flex; align-items:center; gap:8px; padding:8px 14px; border-radius:12px; border:1px solid #e5e7eb; text-decoration:none; font-weight:800; font-size:12px; text-transform:uppercase; letter-spacing:1px; }
.btn.add { background:#e9ecef; color:#1a1a2e; }
.btn.export { background:#17002B; color:#fff; border-color:#17002B; }
.btn.export i { font-size:13px; }

/* Table */
.table-wrap { margin-top:16px; border:1px solid #eee; border-radius:12px; overflow:hidden; }
table { width:100%; border-collapse:collapse; background:#fff; }
thead th { background:#fafafa; color:#6b7280; font-size:12px; letter-spacing:0.6px; text-transform:uppercase; text-align:left; padding:14px 16px; }
tbody td { padding:14px 16px; border-top:1px solid #f1f5f9; color:#111827; font-size:14px; }
.actions { display:flex; align-items:center; gap:14px; }
.actions a { color:#6b7280; text-decoration:none; font-size:16px; }
.actions a:hover { color:#111827; }

/* Floating Alert */
.alert { position: fixed; top: 20px; right: 20px; background-color: #17002B; color: #ffffff; padding: 15px 25px; border-radius: 10px; font-weight: 600; box-shadow: 0 4px 15px #17002B; z-index: 9999; opacity: 0; animation: slideIn 0.5s forwards; }
.alert.success { background-color: #17002B; color: #fff; }
@keyframes slideIn { from { opacity: 0; transform: translateX(100px); } to { opacity: 1; transform: translateX(0); } }
@keyframes slideOut { from { opacity: 1; transform: translateX(0); } to { opacity: 0; transform: translateX(100px); } }
.alert.hide { animation: slideOut 0.5s forwards; }

/* Quick Actions Hover Effects */
.quick-action { transition: all 0.3s ease; }
.quick-action:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-color: #1a1a2e !important; }

/* Analytics Cards Hover */
.analytics-card { transition: all 0.3s ease; }
.analytics-card:hover { transform: translateY(-1px); box-shadow: 0 4px 8px rgba(0,0,0,0.1); }

/* Activity Item Hover */
.activity-item { transition: background 0.2s ease; }
.activity-item:hover { background: #f8f9fa; border-radius: 6px; }

/* Responsive */
@media (max-width: 768px) {
  .sidebar { width: 70px; }
  .logo span, .nav-item span { display: none; }
  .main-content { margin-left: 70px; padding: 20px; }
}
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="logo"><i class="fas fa-store"></i> <span>Logo</span></div>
  <nav class="nav-menu">
    <a href="{{ route('resident.index') }}" class="nav-item"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
    <a href="#" class="nav-item active"><i class="fas fa-boxes"></i><span>Evacuee Program</span></a>
  </nav>
  <div class="sidebar-footer">
    <a href="#" class="nav-item"><i class="fas fa-cog"></i><span>Settings</span></a>
    <button type="button" class="nav-item" style="background:none;border:none;width:100%;text-align:left;" onclick="openLogoutModal()">
      <i class="fas fa-sign-out-alt"></i><span>Logout</span>
    </button>
  </div>
</div>

<!-- Main Content -->
<div class="main-content">
  <div class="header">
    <h1>Evacuee Program</h1>
    <a href="{{ route('program') }}" class="btn-back" title="Back to Program">
      <i class="fas fa-arrow-left"></i>
      Back
    </a>
  </div>

  <div class="container">
    <h2 style="margin-bottom:10px;color:#1a1a2e;">Static Evacuee Program Page</h2>
    <p style="color:#555;">This is a placeholder for the Evacuee Program. Replace with dynamic content and components later.</p>
    <div style="margin-top:20px; display:grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap:16px;">
      <div class="analytics-card" style="background:#fff;border:1px solid #eee;border-radius:12px;padding:16px;">
        <div style="font-weight:700;color:#1a1a2e;margin-bottom:6px;">Total Evacuees</div>
        <div style="font-size:28px;font-weight:800;color:#17002B;">128</div>
      </div>
      <div class="analytics-card" style="background:#fff;border:1px solid #eee;border-radius:12px;padding:16px;">
        <div style="font-weight:700;color:#1a1a2e;margin-bottom:6px;">Shelters</div>
        <div style="font-size:28px;font-weight:800;color:#17002B;">6</div>
      </div>
      <div class="analytics-card" style="background:#fff;border:1px solid #eee;border-radius:12px;padding:16px;">
        <div style="font-weight:700;color:#1a1a2e;margin-bottom:6px;">Available Beds</div>
        <div style="font-size:28px;font-weight:800;color:#17002B;">72</div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
      <select class="select">
        <option>PUROK</option>
        <option>Purok I</option>
        <option>Purok II</option>
        <option>Purok III</option>
        <option>Purok IV</option>
        <option>Purok V</option>
      </select>
      <select class="select">
        <option>RESIDENTS</option>
        <option>All</option>
        <option>Heads</option>
        <option>Dependents</option>
      </select>
      <input type="text" class="search" placeholder="Search" />
      <div style="margin-left:auto; display:flex; gap:10px;">
        <a href="#" class="btn add">ADD +</a>
        <a href="#" class="btn export"><i class="fas fa-download"></i> EXPORT</a>
      </div>
    </div>

    <!-- Table -->
    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Evacuation Status</th>
            <th>Evacuation Area</th>
            <th>Room Number</th>
            <th>Recieve Program</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>0001</td>
            <td>Juan Dela Cruz</td>
            <td>34</td>
            <td>Male</td>
            <td>Evacuated</td>
            <td>Barangay Hall</td>
            <td>Room 3B</td>
            <td>Yes</td>
            <td>
              <div class="actions">
                <a href="#" title="View"><i class="fas fa-eye"></i></a>
                <a href="#" title="Edit"><i class="fas fa-pen-to-square"></i></a>
                <a href="#" title="Delete"><i class="fas fa-trash"></i></a>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="9" style="text-align:center; color:#9ca3af; padding:12px 16px; font-size:12px;">Static preview row. Replace with dynamic data later.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@if(session('Success'))
  <div class="alert success" id="successAlert">{{ session('Success') }}</div>
@endif

<script>
setTimeout(()=>{
  const alert = document.getElementById('successAlert') || document.getElementById('welcomeAlert');
  if(alert){ alert.classList.add('hide'); setTimeout(()=>alert.remove(),500); }
},3000);
</script>
</body>
</html>
