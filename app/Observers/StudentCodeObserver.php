<?php

namespace App\Observers;

use App\Models\StudentCode;
use App\Models\User;
use App\Notifications\Admin\StudentPaymentAdminMail;
use App\Notifications\Student\StudentPaymentMail;

class StudentCodeObserver
{
    /**
     * Handle the StudentCodeObserver "created" event.
     */
    public function created(StudentCode $studentCode): void
    {
    }

    /**
     * Handle the StudentCodeObserver "updated" event.
     */
    public function updated(StudentCode $studentCode): void
    {


        if ($studentCode->wasChanged('is_paid') || $studentCode->wasChanged('used_coupon')) {
            $adminUser = User::where('email', 'careerwithoutbarrier@gmail.com')->orWhere('email', 'vinod190596@gmail.com')->first();
           if($adminUser)
            $adminUser->notify(new StudentPaymentAdminMail($studentCode));

            $studentCode->student->notify(new StudentPaymentMail($studentCode));
        }
    }

    /**
     * Handle the StudentCodeObserver "deleted" event.
     */
    public function deleted(StudentCode $studentCode): void
    {
        // ...
    }

    /**
     * Handle the StudentCodeObserver "restored" event.
     */
    public function restored(StudentCode $studentCode): void
    {
        // ...
    }

    /**
     * Handle the StudentCodeObserver "forceDeleted" event.
     */
    public function forceDeleted(StudentCode $studentCode): void
    {
        // ...
    }
}
