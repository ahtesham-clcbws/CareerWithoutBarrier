# Implementation Plan - Institute Name Display Correction

The user wants to display the institute name instead of the person's name in the "payment & voucher" column of the administrator student list.

## Proposed Changes

### 1. Controllers (Eager Loading)
- **File**: `app/Http/Controllers/AdminController.php`
- **Change**: Update `studentList` and `studentRollList` methods to eager load `latestStudentCode.corporate`.

### 2. Blade Views (Display Logic)
- **File**: `resources/views/administrator/dashboard/studentlist.blade.php`
- **Change**: Update the "Payment & Voucher" column to show `latestStudentCode->corporate->institute_name` if available, falling back to `corporate_name` or the default value.

### 3. Data Persistence (Moving Forward)
Update the following files to save `institute_name` into `corporate_name` (or prefer it) when a coupon is applied:
- `app/Http/Controllers/StudentController.php`
- `app/Http/Controllers/Api/ApplicationController.php`
- `app/Livewire/Auth/Registration.php`
- `app/Livewire/Auth/RegistrationForm.php`
- `app/Livewire/Student/PaymentPage.php`

## Detailed Steps

### Step 1: Update AdminController
Update eager loading to include `latestStudentCode.corporate`.

### Step 2: Update Student List View
Modify the display logic in the blade file.

### Step 3: Update Controller/Livewire Save Logic
Ensure future registrations use the institute name.

## Verification Plan
- Access `/administrator/student_list` and verify the institute name is displayed for students who used a corporate voucher.
- Test applying a coupon as a student and verify the `corporate_name` is stored correctly.
