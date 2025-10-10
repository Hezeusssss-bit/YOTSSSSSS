<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Health Center</title>
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

/* Emergency Info */
.emergency-info { background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 12px; padding: 20px; margin-top: 20px; }
.emergency-info h3 { color: #721c24; font-size: 18px; margin-bottom: 10px; }
.emergency-info p { color: #721c24; line-height: 1.6; }

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
    <h1>Health Center</h1>
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
    
    <div class="facility-info">
      <div class="facility-details">
        <h2>Barangay Health Center</h2>
        <p><strong>Primary Purpose:</strong> Medical facility providing basic healthcare services and emergency response</p>
        <p><strong>Services:</strong> Basic medical care, maternal care, immunization, and health education</p>
        <p><strong>Operating Hours:</strong> 24/7 Emergency Services, Regular Hours: 8:00 AM - 5:00 PM</p>
        <p><strong>Emergency Hotline:</strong> (123) 456-7890</p>
        <p><strong>Location:</strong> Strategic location with easy emergency vehicle access</p>
      </div>
      <div class="facility-image">
        <i class="fas fa-hospital"></i>
      </div>
    </div>

    <h2 style="margin: 30px 0 20px 0; color: #1a1a2e;">Available Services</h2>
    
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-stethoscope"></i></div>
        <div class="feature-title">General Consultation</div>
        <div class="feature-description">Basic medical consultation and diagnosis for common health concerns</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-ambulance"></i></div>
        <div class="feature-title">Emergency Services</div>
        <div class="feature-description">24/7 emergency medical response and first aid treatment</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-baby"></i></div>
        <div class="feature-title">Maternal & Child Care</div>
        <div class="feature-description">Pre-natal, post-natal care and pediatric services</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-syringe"></i></div>
        <div class="feature-title">Immunization</div>
        <div class="feature-description">Regular immunization programs for children and adults</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-capsules"></i></div>
        <div class="feature-title">Pharmacy</div>
        <div class="feature-description">Essential medicines and medical supplies available</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-microscope"></i></div>
        <div class="feature-title">Laboratory</div>
        <div class="feature-description">Basic laboratory tests and diagnostic services</div>
        <span class="feature-status status-maintenance">Under Maintenance</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-tooth"></i></div>
        <div class="feature-title">Dental Services</div>
        <div class="feature-description">Basic dental check-ups and minor dental procedures</div>
        <span class="feature-status status-available">Available</span>
      </div>

      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-heartbeat"></i></div>
        <div class="feature-title">Health Programs</div>
        <div class="feature-description">Regular health education and wellness programs</div>
        <span class="feature-status status-available">Available</span>
      </div>
    </div>

    <div class="emergency-info">
      <h3><i class="fas fa-exclamation-triangle"></i> Emergency Contact Information</h3>
      <p><strong>Emergency Hotline:</strong> (123) 456-7890 (Available 24/7)</p>
      <p><strong>For Medical Emergencies:</strong> Contact the health center immediately or call the emergency hotline. Our medical staff is trained to handle various emergency situations and can coordinate with nearby hospitals for more serious cases.</p>
      <p><strong>Ambulance Service:</strong> Emergency transport is available for critical cases requiring hospital care.</p>
    </div>
  </div>
</div>

</body>
</html>
