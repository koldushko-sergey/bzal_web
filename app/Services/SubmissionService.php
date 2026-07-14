<?php

namespace App\Services;

use App\Mail\NewSubmissionMail;
use App\Models\SiteSetting;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubmissionService
{
    public function store(string $type, array $data, ?Request $request = null): Submission
    {
        $submission = Submission::create([
            'type' => $type,
            'name' => $data['name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'company' => $data['company'] ?? null,
            'unp' => $data['unp'] ?? null,
            'message' => $data['message'],
            'ip_address' => $request?->ip(),
        ]);

        $notifyEmail = SiteSetting::get('notification_email', SiteSetting::get('email'));

        if ($notifyEmail) {
            Mail::to($notifyEmail)->send(new NewSubmissionMail($submission));
        }

        return $submission;
    }
}
