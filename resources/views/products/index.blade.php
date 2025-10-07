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
.header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
.header h1 { color: #1a1a2e; font-size: 28px; font-weight: 700; }
.header-icons { display: flex; gap: 12px; align-items: center; }
.icon-btn { width: 40px; height: 40px; border-radius: 50%; background: #fff; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
.icon-btn i { color: #333; font-size: 16px; }
.icon-btn:hover { background: #f5f5f5; transform: translateY(-2px); }

/* Dashboard Cards */
.cards { display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap; }
.card { flex: 1 1 260px; background: #fff; border-radius: 14px; padding: 18px; box-shadow: 0 10px 24px rgba(0,0,0,0.06); min-height: 96px; display: flex; flex-direction: column; justify-content: space-between; }
.card.primary { background: #1a1126; color: #fff; box-shadow: 0 10px 24px rgba(26,17,38,0.35); }
.card .title { font-weight: 700; font-size: 14px; color: #232323; }
.card.primary .title { color: #fff; }
.card .cta { align-self: flex-end; font-size: 12px; font-weight: 600; color: #666; text-decoration: none; cursor: pointer; }
.card.primary .cta { color: #fff; }

/* Panels */
.panel-row { display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap; }
.panel { background: #fff; border-radius: 14px; padding: 18px; box-shadow: 0 10px 24px rgba(0,0,0,0.06); min-height: 220px; flex: 1 1 520px; }
.panel.small { flex: 1 1 280px; min-height: 220px; }
.panel.full { min-height: 140px; }

/* Floating Alert */
.alert { position: fixed; top: 20px; right: 20px; background-color: #17002B; color: #ffffff; padding: 15px 25px; border-radius: 10px; font-weight: 600; box-shadow: 0 4px 15px #17002B; z-index: 9999; opacity: 0; animation: slideIn 0.5s forwards; }
.alert.success { background-color: #17002B; color: #fff; }
@keyframes slideIn { from { opacity: 0; transform: translateX(100px); } to { opacity: 1; transform: translateX(0); } }
@keyframes slideOut { from { opacity: 1; transform: translateX(0); } to { opacity: 0; transform: translateX(100px); } }
.alert.hide { animation: slideOut 0.5s forwards; }

/* Logout Modal */
.modal-overlay {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.5);
  display: none;
  z-index: 1000;
}
.modal {
  position: fixed;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
  border-radius: 12px;
  padding: 30px;
  width: 400px;
  max-width: 90%;
  display: none;
  z-index: 1001;
  box-shadow: 0 10px 30px rgba(0,0,0,0.3);
  text-align: center;
}
.modal h2 {
  margin-bottom: 10px;
  font-size: 22px;
  color: #1a1a2e;
}
.modal p {
  margin-bottom: 25px;
  color: #555;
  font-size: 15px;
}
.modal-buttons {
  display: flex;
  justify-content: center;
  gap: 15px;
}
.modal-buttons button {
  padding: 10px 20px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 14px;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
}
.btn-cancel {
  background: #f5f5f5;
  color: #333;
}
.btn-cancel:hover {
  background: #e5e5e5;
}
.btn-logout-confirm {
  background: #f44336;
  color: #fff;
}
.btn-logout-confirm:hover {
  background: #d32f2f;
  transform: translateY(-2px);
}

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
    <a href="#" class="nav-item active"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
    <a href="#" class="nav-item"><i class="fas fa-boxes"></i><span>Services</span></a>
    <a href="#" class="nav-item"><i class="fas fa-users"></i><span>Events</span></a>
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
    <h1>Dashboard</h1>
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


  <!-- Dashboard Cards beside the sidebar -->
  <div class="cards" style="margin-top: 16px;">
    <div class="card primary">
      <div class="title">Total Residents</div>
      <a href="{{ route('home') }}" class="cta">View all</a>
    </div>
    <div class="card">
      <div class="title">Total Facilities</div>
      <a href="{{ route('product.index') }}" class="cta">View all</a>
    </div>
    <div class="card">
      <div class="title">Total Kung Pagidnts</div>
      <a href="{{ route('product.index') }}" class="cta">View all</a>
    </div>
  </div>

  <div class="panel-row">
    <div class="panel" style="font-weight:700;color:#333;margin-bottom:8px;">Analytics</div>
    <div class="panel small">
      <div style="font-weight:700;color:#333;margin-bottom:8px;">Recent Activities</div>
    </div>
  </div>

  <div class="panel full" style="font-weight:700;color:#333;margin-bottom:8px;">Ambot ano nadi pa</div>
</div>

<!-- Logout Confirmation Modal -->
<div class="modal-overlay" id="logoutModalOverlay"></div>
<div class="modal" id="logoutModal">
  <h2>Log Out</h2>
  <p>Are you sure you want to log out?</p>
  <div class="modal-buttons">
    <button class="btn-cancel" onclick="closeLogoutModal()">Cancel</button>
    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn-logout-confirm">Yes, Log Out</button>
    </form>
  </div>
</div>

<script>
function openLogoutModal() {
  document.getElementById('logoutModalOverlay').style.display = 'block';
  document.getElementById('logoutModal').style.display = 'block';
}

function closeLogoutModal() {
  document.getElementById('logoutModalOverlay').style.display = 'none';
  document.getElementById('logoutModal').style.display = 'none';
}

setTimeout(()=>{
  const alert = document.getElementById('successAlert') || document.getElementById('welcomeAlert');
  if(alert){ alert.classList.add('hide'); setTimeout(()=>alert.remove(),500); }
},3000);
</script>
</body>
</html>
