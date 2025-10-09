<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>School Facilities</title>
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
.header-icons { display: flex; gap: 15px; align-items: center; }
.icon-btn { width: 40px; height: 40px; border-radius: 50%; background: #fff; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
.icon-btn:hover { background: #f5f5f5; transform: translateY(-2px); }
.icon-btn i { color: #333; font-size: 16px; }

/* Container */
.container { background: #fff; border-radius: 15px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }

/* School Info Section */
.school-info { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px; }
.school-details { }
.school-details h2 { color: #1a1a2e; font-size: 24px; margin-bottom: 15px; }
.school-details p { color: #666; line-height: 1.6; margin-bottom: 10px; }
.school-image { background: #f8f9fa; border-radius: 12px; display: flex; align-items: center; justify-content: center; min-height: 200px; }
.school-image i { font-size: 80px; color: #1a1a2e; }

/* Features Grid */
.features-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
.feature-card { background: #f8f9fa; border-radius: 12px; padding: 20px; border: 2px solid #e9ecef; transition: all 0.3s ease; }
.feature-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-color: #1a1a2e; }
.feature-icon { font-size: 32px; color: #1a1a2e; margin-bottom: 10px; }
.feature-title { font-size: 16px; font-weight: 700; color: #1a1a2e; margin-bottom: 8px; }
.feature-description { font-size: 14px; color: #666; line-height: 1.5; margin-bottom: 10px; }
.feature-status { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
.status-available { background: #d4edda; color: #155724; }
.status-unavailable { background: #f8d7da; color: #721c24; }
.status-maintenance { background: #fff3cd; color: #856404; }

/* Emergency Info */
.emergency-info { background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 12px; padding: 20px; margin-top: 20px; }
.emergency-info h3 { color: #856404; font-size: 18px; margin-bottom: 10px; }
.emergency-info p { color: #856404; line-height: 1.6; }

/* Back Button */
.back-btn { display: inline-flex; align-items: center; gap: 8px; color: #1a1a2e; text-decoration: none; font-weight: 600; margin-bottom: 20px; transition: all 0.3s ease; }
.back-btn:hover { color: #007bff; transform: translateX(-2px); }

/* Responsive */
@media (max-width: 768px) {
  .sidebar { width: 70px; }
  .logo span, .nav-item span { display: none; }
  .main-content { margin-left: 70px; padding: 20px; }
  .school-info { grid-template-columns: 1fr; }
  .features-grid { grid-template-columns: 1fr; }
}
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="logo"><i class="fas fa-store"></i> <span>Logo</span></div>
  <nav class="nav-menu">
    <a href="{{ route('resident.index') }}" class="nav-item"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
    <a href="{{ route('facilities') }}" class="nav-item"><i class="fas fa-building"></i><span>Facilities</span></a>
    <a href="{{ route('home') }}" class="nav-item"><i class="fas fa-users"></i><span>Residents</span></a>
  </nav>
  <div class="sidebar-footer">
    <a href="#" class="nav-item"><i class="fas fa-cog"></i><span>Settings</span></a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="nav-item" style="background:none;border:none;width:100%;text-align:left;">
        <i class="fas fa-sign-out-alt"></i><span>Logout</span>
      </button>
    </form>
  </div>
</div>

<!-- Main Content -->
<div class="main-content">
  <div class="header">
    <h1>School Facilities</h1>
    <div class="header-icons">
      <button class="icon-btn"><i class="fas fa-bell"></i></button>
      <button class="icon-btn"><i class="fas fa-user"></i></button>
    </div>
  </div>

  <div class="container">
    <a href="{{ route('facilities') }}" class="back-btn">
      <i class="fas fa-arrow-left"></i>
      Back to Facilities
    </a>
    
    <div class="school-info">
      <div class="school-details">
        <h2>Community School</h2>
        <p><strong>Primary Purpose:</strong> Educational facility serving the community</p>
        <p><strong>Emergency Role:</strong> Designated evacuation center and emergency response hub</p>
        <p><strong>Capacity:</strong> Can accommodate up to 500 people during emergencies</p>
        <p><strong>Location:</strong> Central area of the community for easy access</p>
        <p><strong>Status:</strong> <span style="color: #28a745; font-weight: 600;">Operational</span></p>
      </div>
      <div class="school-image">
        <i class="fas fa-school"></i>
      </div>
    </div>

    <h2 style="margin: 30px 0 20px 0; color: #1a1a2e;">Available Features</h2>
    
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-school"></i></div>
        <div class="feature-title">Hinigaran National High School</div>
        <div class="feature-description"> Address : 7V83+P53, Barangay III, Hinigaran, Negros Occidental</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-school"></i></div>
        <div class="feature-title">Hinigaran Institute </div>
        <div class="feature-description">Address : 7VG3+28Q, Lopez Jaena St, Barangay 1, Hinigaran, Negros Occidental</div>
        <span class="feature-status status-maintenance">Under Maintenance</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-school"></i></div>
        <div class="feature-title">Madeline Academy</div>
        <div class="feature-description">Address : 7VC2+MG7, Rizal Street, Negros South Road, Hinigaran, 6106 Negros Occidental</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-school"></i></div>
        <div class="feature-title"> Hinigaran Elementary School A</div>
        <div class="feature-description">Address : 7VC2+Q7G, Osmeña St, Hinigaran, 6106 Negros Occidental</div>
        <span class="feature-status status-unavailable">Unavailable</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-school"></i></div>
        <div class="feature-title">Hinigaran Elementary School B</div>
        <div class="feature-description">Address : 7VC2+623, Rizal St, Hinigaran, Negros Occidental</div>
        <span class="feature-status status-available">Available</span>
      </div>

    </div>

    <div class="emergency-info">
      <h3><i class="fas fa-exclamation-triangle"></i> Emergency Procedures</h3>
      <p>In case of emergency or natural disaster, this school serves as a primary evacuation center. Residents should follow evacuation routes and report to the main office for registration and assistance. Emergency supplies and temporary shelter are available for affected families.</p>
    </div>
  </div>
</div>

</body>
</html>
