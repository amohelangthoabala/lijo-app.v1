<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function send(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'message' => 'required',
        ]);

        try {
            $response = $this->twilio->sendSms($request->phone, $request->message);

            if ($response['success']) {
                return response()->json(['message' => $response['message']], 200);
            }

            return response()->json(['error' => $response['message']], 400);
        } catch (\Exception $e) {
            \Log::error('SMS Controller Error: ' . $e->getMessage());

            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }

    }
}
