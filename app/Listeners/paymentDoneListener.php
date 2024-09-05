<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\Admin\StudentPaymentAdminMail;
use App\Notifications\Student\StudentPaymentMail;
class paymentDoneListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $studentCode = $event->studCode;

        $student = $studentCode->student;

        $admins = User::where('roles', 'admin')->whereNotNull('email')->get();

        $student->notify(new StudentPaymentMail($studentCode));
        foreach ($admins as $admin) {
            $admin->notify(new StudentPaymentAdminMail($studentCode));
        }
    }
}
