<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try All - Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: #fff;
            border-radius: 20px;
            padding: 60px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .icon-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .icon-container i {
            color: #fff;
            font-size: 50px;
        }

        h1 {
            color: #1a1a2e;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        p {
            color: #666;
            font-size: 16px;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .action-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 18px 50px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            text-decoration: none;
            display: inline-block;
        }

        .action-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
        }

        .action-button:active {
            transform: translateY(-1px);
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .back-link i {
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 40px 20px;
            }

            h1 {
                font-size: 24px;
            }

            .action-button {
                padding: 15px 40px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon-container">
            <i class="fas fa-rocket"></i>
        </div>
        
        <h1>MSWD Information System</h1>
        <p>
        
        </p>

        <button class="action-button" onclick="handleAction()">
            <i class="fas fa-play"></i> Send Alert
        </button>

        <br>
        <a href="{{ route('resident.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <script>
        function handleAction() {
            // Send SMS first
            sendEvacuationSMS();
            
            // Emergency Evacuation Alert
            alert('🚨 EMERGENCY EVACUATION ALERT! 🚨\n\n' +
                  '⚠️ EVACUATE IMMEDIATELY! ⚠️\n\n' +
                  'THIS IS NOT A DRILL!\n\n' +
                  '📍 ACTION REQUIRED:\n' +
                  '1. Stay calm and move quickly\n' +
                  '2. Proceed to nearest evacuation route\n' +
                  '3. Go to designated assembly point\n' +
                  '4. Do NOT use elevators\n' +
                  '5. Assist those who need help\n\n' +
                  '🆘 EMERGENCY CONTACTS:\n' +
                  '• Emergency: 911\n' +
                  '• Red Cross: 143\n' +
                  '• Fire: 160\n\n' +
                  '📱 SMS Alert sent to 09648990664\n\n' +
                  'Your safety is our priority!\n' +
                  'Follow evacuation coordinators!');
            
            // Play alert sound if browser supports it
            if (typeof Audio !== 'undefined') {
                try {
                    // Create a beep sound using Web Audio API
                    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
                    const oscillator = audioContext.createOscillator();
                    const gainNode = audioContext.createGain();
                    
                    oscillator.connect(gainNode);
                    gainNode.connect(audioContext.destination);
                    
                    oscillator.frequency.value = 800;
                    oscillator.type = 'sine';
                    
                    gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
                    oscillator.start(audioContext.currentTime);
                    oscillator.stop(audioContext.currentTime + 0.2);
                    
                    // Repeat beep 3 times
                    setTimeout(() => {
                        const osc2 = audioContext.createOscillator();
                        const gain2 = audioContext.createGain();
                        osc2.connect(gain2);
                        gain2.connect(audioContext.destination);
                        osc2.frequency.value = 800;
                        osc2.type = 'sine';
                        gain2.gain.setValueAtTime(0.3, audioContext.currentTime);
                        osc2.start();
                        osc2.stop(audioContext.currentTime + 0.2);
                    }, 300);
                    
                    setTimeout(() => {
                        const osc3 = audioContext.createOscillator();
                        const gain3 = audioContext.createGain();
                        osc3.connect(gain3);
                        gain3.connect(audioContext.destination);
                        osc3.frequency.value = 800;
                        osc3.type = 'sine';
                        gain3.gain.setValueAtTime(0.3, audioContext.currentTime);
                        osc3.start();
                        osc3.stop(audioContext.currentTime + 0.2);
                    }, 600);
                } catch (e) {
                    console.log('Audio not supported');
                }
            }
            
            // Vibrate phone if supported (for mobile devices)
            if ('vibrate' in navigator) {
                // Vibrate pattern: vibrate for 200ms, pause 100ms, repeat 3 times
                navigator.vibrate([200, 100, 200, 100, 200, 100, 200]);
            }
        }

        // Function to send evacuation SMS
        function sendEvacuationSMS() {
            fetch('{{ route("send.evacuation.sms") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                console.log('SMS Response:', data);
                if (data.success) {
                    console.log('✅ Emergency SMS sent successfully to 09648990664');
                } else {
                    console.log('⚠️ SMS failed:', data.message);
                }
            })
            .catch(error => {
                console.error('SMS Error:', error);
            });
        }
    </script>
</body>
</html>
