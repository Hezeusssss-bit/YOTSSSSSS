<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    public function sendEvacuationAlert(Request $request)
    {
        $phoneNumber = '09648990664';
        $message = "🚨 EMERGENCY EVACUATION ALERT! 🚨\n\n" .
                   "EVACUATE IMMEDIATELY!\n\n" .
                   "ACTION REQUIRED:\n" .
                   "1. Stay calm and move quickly\n" .
                   "2. Proceed to nearest evacuation route\n" .
                   "3. Go to designated assembly point\n" .
                   "4. Do NOT use elevators\n\n" .
                   "Emergency: 911\n" .
                   "Red Cross: 143\n" .
                   "Fire: 160\n\n" .
                   "This is not a drill!";

        try {
            // Using Semaphore SMS API (Popular in Philippines)
            // You need to register at https://semaphore.co and get API key
            // Replace 'YOUR_SEMAPHORE_API_KEY' with your actual API key
            
            $apiKey = env('SEMAPHORE_API_KEY', 'YOUR_SEMAPHORE_API_KEY');
            
            // If you don't have Semaphore API key yet, this will simulate the SMS
            if ($apiKey === 'YOUR_SEMAPHORE_API_KEY') {
                // Simulation mode - log the SMS instead of sending
                \Log::info('SMS would be sent to: ' . $phoneNumber);
                \Log::info('Message: ' . $message);
                
                return response()->json([
                    'success' => true,
                    'message' => 'SMS simulation successful! Check logs.',
                    'note' => 'To enable real SMS: Get API key from semaphore.co and add SEMAPHORE_API_KEY to .env file'
                ]);
            }

            // Real SMS sending using Semaphore
            $response = Http::post('https://api.semaphore.co/api/v4/messages', [
                'apikey' => $apiKey,
                'number' => $phoneNumber,
                'message' => $message,
                'sendername' => 'EVACALERT'
            ]);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Emergency SMS sent successfully!'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to send SMS. Please check your API configuration.'
                ], 500);
            }

        } catch (\Exception $e) {
            \Log::error('SMS Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'SMS service error: ' . $e->getMessage()
            ], 500);
        }
    }
}
