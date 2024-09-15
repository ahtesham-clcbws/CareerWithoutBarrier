<?php

namespace App\Observers;

use App\Models\Student;
use App\Models\User;
use App\Notifications\Student\StudentPaymentMail;
use App\Notifications\Admin\StudentRegisteredMail as AdminStudentRegisteredMail;
use App\Notifications\Student\StudentRegisteredMail;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        $adminUser = User::where('email', 'careerwithoutbarrier@gmail.com')->orWhere('email', 'vinod190596@gmail.com')->first();
        if ($adminUser) {
            $adminUser->notify(new AdminStudentRegisteredMail($student));
        }
        $student->notify(new StudentRegisteredMail($student));
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void {}

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        // ...
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        // ...
    }

    /**
     * Handle the Student "forceDeleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        // ...
    }
}
