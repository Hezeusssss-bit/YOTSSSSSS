<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Services</title>
  <style>
    * { box-sizing: border-box; }
    body { margin:0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif; background:#f5f5f5; color:#1a1a2e; }
    .wrapper { max-width: 1000px; margin: 40px auto; padding: 0 20px; }
    .page-header { display:flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
    h1 { font-size: 28px; margin:0; }
    .card { background:#fff; border-radius:14px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); padding:22px; }
    .grid { display:grid; grid-template-columns: repeat(auto-fill,minmax(240px,1fr)); gap:16px; }
    .svc { border:1px solid #eee; border-radius:12px; padding:18px; transition:.2s ease; background:#fafafa; }
    .svc:hover { background:#fff; box-shadow: 0 6px 18px rgba(0,0,0,0.08); transform: translateY(-2px); }
    .svc h3 { margin:0 0 8px; font-size:16px; }
    .svc p { margin:0; color:#555; font-size:14px; }
    .actions { margin-top: 18px; display:flex; gap:10px; }
    .btn { padding:10px 14px; border-radius:8px; border:1px solid #ddd; background:#fff; color:#333; text-decoration:none; font-weight:600; font-size:14px; }
    .btn:hover { background:#1a1a2e; color:#fff; border-color:#1a1a2e; }
  </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="page-header">
        <h1>Services</h1>
        <div class="actions">
          <a class="btn" href="{{ route('resident.index') }}">Back to Dashboard</a>
        </div>
      </div>

      <div class="card">
        <p style="margin-bottom:16px;color:#555;">Browse available barangay services below.</p>
        <div class="grid">
          <div class="svc">
            <h3>Community Center</h3>
            <p>Reservations and schedules for events and programs.</p>
          </div>
          <div class="svc">
            <h3>Health Services</h3>
            <p>Health center information and appointment guidelines.</p>
          </div>
          <div class="svc">
            <h3>Emergency Shelter</h3>
            <p>Preparedness and shelter locations during emergencies.</p>
          </div>
          <div class="svc">
            <h3>Education & School</h3>
            <p>School programs, assistance, and announcements.</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
