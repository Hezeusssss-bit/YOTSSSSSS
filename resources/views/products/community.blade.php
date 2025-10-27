<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Community Center</title>
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

/* Facility Info Section */
.facility-info { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px; }
.facility-details { }
.facility-details h2 { color: #1a1a2e; font-size: 24px; margin-bottom: 15px; }
.facility-details p { color: #666; line-height: 1.6; margin-bottom: 10px; }
.facility-image { background: #f8f9fa; border-radius: 12px; display: flex; align-items: center; justify-content: center; min-height: 200px; }
.facility-image i { font-size: 80px; color: #1a1a2e; }

/* Features Grid */
.features-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
.feature-card { background: #f8f9fa; border-radius: 12px; padding: 20px; border: 2px solid #e9ecef; transition: all 0.3s ease; cursor: pointer; }
.feature-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-color: #1a1a2e; }
.feature-icon { font-size: 32px; color: #1a1a2e; margin-bottom: 10px; }
.feature-title { font-size: 16px; font-weight: 700; color: #1a1a2e; margin-bottom: 8px; }
.feature-description { font-size: 14px; color: #666; line-height: 1.5; margin-bottom: 10px; }
.feature-status { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
.status-available { background: #d4edda; color: #155724; }
.status-unavailable { background: #f8d7da; color: #721c24; }
.status-maintenance { background: #fff3cd; color: #856404; }

/* Info Box */
.info-box { background: #e3f2fd; border: 1px solid #90caf9; border-radius: 12px; padding: 20px; margin-top: 20px; }
.info-box h3 { color: #1976d2; font-size: 18px; margin-bottom: 10px; }
.info-box p { color: #1976d2; line-height: 1.6; }

/* Back Button */
.back-btn { display: inline-flex; align-items: center; gap: 8px; color: #1a1a2e; text-decoration: none; font-weight: 600; margin-bottom: 20px; transition: all 0.3s ease; }
.back-btn:hover { color: #007bff; transform: translateX(-2px); }

/* Responsive */
@media (max-width: 768px) {
  .sidebar { width: 70px; }
  .logo span, .nav-item span { display: none; }
  .main-content { margin-left: 70px; padding: 20px; }
  .facility-info { grid-template-columns: 1fr; }
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
    <h1>Community Center</h1>
  </div>

  <div class="container">
    <a href="{{ route('facilities') }}" class="back-btn">
      <i class="fas fa-arrow-left"></i>
      Back to Facilities
    </a>
    
    <div class="facility-info">
      <div class="facility-details">
        <h2>Community Center</h2>
        <p><strong>Primary Purpose:</strong> Main gathering space for community events, meetings, and activities</p>
        <p><strong>Capacity:</strong> Can accommodate up to 300 people for events</p>
        <p><strong>Operating Hours:</strong> 8:00 AM - 6:00 PM (Monday - Saturday)</p>
        <p><strong>Location:</strong> Central area of the barangay for easy community access</p>
      </div>
      <div class="facility-image">
        <i class="fas fa-home"></i>
      </div>
    </div>

    <h2 style="margin: 30px 0 20px 0; color: #1a1a2e;">Available Amenities</h2>
    
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-users"></i></div>
        <div class="feature-title">Main Hall</div>
        <div class="feature-description">Large gathering space for community events, meetings, and celebrations</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-chalkboard"></i></div>
        <div class="feature-title">Conference Room</div>
        <div class="feature-description">Meeting space for barangay meetings and community discussions</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-dumbbell"></i></div>
        <div class="feature-title">Sports Area</div>
        <div class="feature-description">Recreational space for community sports and fitness activities</div>
        <span class="feature-status status-maintenance">Under Maintenance</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-child"></i></div>
        <div class="feature-title">Children's Area</div>
        <div class="feature-description">Safe play area for children's activities and programs</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-wifi"></i></div>
        <div class="feature-title">Free Wi-Fi</div>
        <div class="feature-description">Internet access available throughout the facility</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-parking"></i></div>
        <div class="feature-title">Parking Area</div>
        <div class="feature-description">Designated parking space for visitors and event attendees</div>
        <span class="feature-status status-available">Available</span>
      </div>
    </div>

    <div class="info-box">
      <h3><i class="fas fa-info-circle"></i> Booking Information</h3>
      <p>To book the community center for events or activities, please contact the barangay office during operating hours. Advanced booking is recommended for large events. The facility is available for free to community members for approved activities.</p>
    </div>
  </div>
</div>

</body>
</html>
