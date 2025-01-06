<?php

namespace App\Services;

use Exception;
use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(
            env('TWILIO_SID'),
            env('TWILIO_AUTH_TOKEN')
        );
    }

    public function sendSms(string $to, string $message): array
    {
        try {
            $this->twilio->messages->create($to, [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => $message,
            ]);

            return [
                'success' => true,
                'message' => 'SMS sent successfully!',
            ];
        } catch (Exception $e) {
            // Log the error for debugging
            \Log::error('Twilio SMS Error: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to send SMS: ' . $e->getMessage(),
            ];
        }
    }
}
