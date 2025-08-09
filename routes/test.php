<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email from KP Scholarship System', function ($message) {
            $message->to('test@example.com')
                ->subject('Test Email');
        });

        return 'Email sent successfully! Check your Mailtrap inbox.';
    } catch (Exception $e) {
        return 'Email failed: ' . $e->getMessage();
    }
});
