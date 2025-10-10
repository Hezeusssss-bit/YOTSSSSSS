# SMS Emergency Alert Setup Instructions

This document explains how to set up the SMS functionality to send emergency evacuation alerts to phone number **09648990664**.

## Current Status

✅ **SMS Code is Ready!** The system is currently in **SIMULATION MODE**.

When you click the "Start Exploring" button:
- ✅ Alert message displays
- ✅ Phone vibrates (on mobile)
- ✅ Audio beeps play
- ✅ SMS function is called
- ⚠️ SMS is simulated (logged to console, not actually sent yet)

## To Enable REAL SMS Sending

Follow these steps to send actual SMS messages:

### Step 1: Register for Semaphore SMS API

1. Go to [https://semaphore.co](https://semaphore.co)
2. Click **"Sign Up"** or **"Get Started"**
3. Fill in your details:
   - Full Name
   - Email Address
   - Mobile Number (your Philippine number)
   - Password
4. Verify your email address
5. Complete phone verification via SMS code

### Step 2: Get Your API Key

**IMPORTANT:** Follow these exact steps:

1. Login to [https://semaphore.co](https://semaphore.co)
2. Go to your **Dashboard**
3. On the left sidebar, click **"API"** or **"Account"** → **"API Keys"**
4. You'll see your API Key displayed (it's a long string of letters and numbers)
5. Click **"Copy"** to copy your API Key
6. **Keep this key SECRET!** Never share it publicly

**Your API Key looks like:** `abc123def456ghi789jkl012mno345pqr678stu901`

**Documentation:** https://semaphore.co/docs

### Step 3: Add API Key to Your Project

1. In your project, locate the `.env` file in the root folder
2. Open `.env` with a text editor
3. Add this line at the end (or find and update if it exists):
   ```
   SEMAPHORE_API_KEY=your_actual_api_key_here
   ```
4. Replace `your_actual_api_key_here` with your **actual API key** from Step 2
5. Save the `.env` file
6. **Example:**
   ```
   SEMAPHORE_API_KEY=abc123def456ghi789jkl012mno345pqr678stu901
   ```

**⚠️ IMPORTANT:** After adding the API key to `.env`, restart your Laravel server if it's running!

### Step 4: Buy SMS Credits (If Needed)

1. Semaphore provides FREE credits for testing
2. For production use, you may need to buy credits
3. Go to your Semaphore dashboard → **Credits**
4. Choose a package (prices are affordable in Philippines)

### Step 5: Test the System

1. Go to your Try All page: `http://localhost/kyle/try-all`
2. Click the "Start Exploring" button
3. Check your phone (09648990664) for the SMS
4. The message should arrive within seconds!

## SMS Message Content

The evacuation alert SMS will contain:

```
🚨 EMERGENCY EVACUATION ALERT! 🚨

EVACUATE IMMEDIATELY!

ACTION REQUIRED:
1. Stay calm and move quickly
2. Proceed to nearest evacuation route
3. Go to designated assembly point
4. Do NOT use elevators

Emergency: 911
Red Cross: 143
Fire: 160

This is not a drill!
```

## Troubleshooting

### SMS Not Sending?

1. **Check API Key**: Make sure it's correctly added to `.env`
2. **Check Credits**: Ensure you have SMS credits in your Semaphore account
3. **Check Phone Number**: Verify 09648990664 is correct
4. **Check Logs**: Look in `storage/logs/laravel.log` for error messages

### How to Check if SMS Was Sent (Simulation Mode)

While in simulation mode (no API key set), check:
1. Browser console (F12 → Console tab)
2. Look for message: "✅ Emergency SMS sent successfully"
3. Check Laravel logs: `storage/logs/laravel.log`

## File Locations

- SMS Controller: `app/Http/Controllers/SmsController.php`
- Route: `routes/web.php` (line with `send.evacuation.sms`)
- Frontend: `resources/views/products/tryall.blade.php`

## Security Notes

⚠️ **IMPORTANT SECURITY TIPS:**

1. Never commit your `.env` file to Git
2. Keep your API key secret
3. The `.env` file is already in `.gitignore`
4. Don't share your API key publicly

## Alternative SMS Services

If you prefer other SMS services, you can modify `app/Http/Controllers/SmsController.php`:

**Other Philippine SMS Services:**
- **Semaphore** (Recommended) - https://semaphore.co
- **Twilio** - https://www.twilio.com
- **Nexmo/Vonage** - https://www.vonage.com
- **Globe Labs API** - https://www.globe.com.ph/business/business-and-ict-solutions/developers.html

## Cost Estimate

**Semaphore Pricing (Philippines):**
- Around ₱0.50 - ₱1.00 per SMS
- Bulk packages available for cheaper rates
- Free credits for testing

## Support

For SMS API issues:
- Semaphore Support: support@semaphore.co
- Documentation: https://semaphore.co/docs

---

**Ready to Go!** Once you add your API key, the system will automatically start sending real SMS alerts! 📱🚨
