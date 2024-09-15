<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\CouponCodeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Razorpay;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/test', function () {
//     return view('websi');
// });

Route::get('/', [HomeController::class, 'index'])->name('website.homepage');
//Route::get('/home', [HomeController::class, 'index'])->name('website.homepage');

Route::prefix('course')->group(function () {
    Route::get('/category', [CourseController::class, 'category'])->name('course.category');
    Route::get('/subcategoryall', [CourseController::class, 'subcategoryall'])->name('course.subcategory');
    Route::get('/subcategorybyId/{id}', [CourseController::class, 'subcategorybyId'])->name('courses.subcategorybyid');
    Route::get('/deleteCategory/{id}', [CourseController::class, 'deleteCategory'])->name('courses.deleteCategory');
    Route::post('/savecategory', [CourseController::class, 'savecategory'])->name('course.savecategory');
    Route::post('/savesubcategory', [CourseController::class, 'savesubcategory'])->name('course.savesubcategory');

    Route::get('/subjects', [CourseController::class, 'subjects'])->name('course.subjects');
    Route::get('/courses', [CourseController::class, 'courses'])->name('course.courses');
    Route::get('/courseslist', [CourseController::class, 'courseslist'])->name('course.courseslist');
    Route::get('/courses', [CourseController::class, 'courses'])->name('course.courses');
    Route::post('/coursesubmit', [CourseController::class, 'coursesubmit'])->name('course.coursesubmit');

    Route::post('/savesubjects', [CourseController::class, 'savesubjects'])->name('course.savesubjects');
    Route::get('/subjectssubcategory', [CourseController::class, 'subjectssubcategory'])->name('course.subjectssubcategory');
    Route::post('/savesubjectsubcategory', [CourseController::class, 'savesubjectsubcategory'])->name('course.savesubjectsubcategory');

    Route::post('/savesubject', [CourseController::class, 'savesubject'])->name('course.savesubject');
    Route::get('/deleteSubject/{id}', [CourseController::class, 'deleteSubject'])->name('courses.deleteSubject');

    Route::get('/classList', [CourseController::class, 'classList'])->name('course.classList');
});


Route::prefix('homepage')->group(function () {
    Route::get('/slider', [HomeController::class, 'slider'])->name('home.slider');
    Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('home.testimonials');
    Route::post('/testimonialSubmit', [HomeController::class, 'testimonialSubmit'])->name('home.testimonialSubmit');
    Route::get('/deleteTestimonials/{id}', [HomeController::class, 'deleteTestimonials'])->name('home.deleteTestimonials');
    Route::get('/govtwebsite', [HomeController::class, 'govtwebsite'])->name('home.govtwebsite');
    Route::post('/savegovtwebsite', [HomeController::class, 'savegovtwebsite'])->name('home.savegovtwebsite');
    Route::get('/deleteGovtwebsite/{id}', [HomeController::class, 'deleteGovtwebsite'])->name('home.deleteGovtwebsite');
    Route::post('/saveSlider', [HomeController::class, 'saveSlider'])->name('home.saveSlider');
    Route::get('/deleteSlider/{id}', [HomeController::class, 'deleteSlider'])->name('home.deleteSlider');
    Route::get('/benefit', [HomeController::class, 'benefit'])->name('home.benefit');
    Route::post('/savebenefits', [HomeController::class, 'savebenefits'])->name('home.savebenefits');
    Route::get('/deletebenefits/{id}', [HomeController::class, 'deletebenefits'])->name('home.deletebenefits');
    Route::post('/contactinsert', [HomeController::class, 'contactinsert'])->name('home.contactinsert');

    Route::post('/corporateSubmit', [HomeController::class, 'corporateSubmit'])->name('home.corporateSubmit');
    Route::post('/sendOtp', [HomeController::class, 'sendOtp'])->name('home.sendOtp');
    Route::post('/sendMail', [HomeController::class, 'sendMail'])->name('home.sendMail');
    Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('home.aboutus');
    Route::get('/career', [HomeController::class, 'career'])->name('home.career');
    Route::get('/preparation', [HomeController::class, 'preparation'])->name('home.preparation');
    Route::get('/scholarship', [HomeController::class, 'scholarship'])->name('home.scholarship');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/', [HomeController::class, 'index'])->name('home.front');
    Route::post('/enquirySubmit', [HomeController::class, 'enquirySubmit'])->name('home.contactPage');
    Route::get('/faq', [HomeController::class, 'faq'])->name('home.faq');
    Route::post('/faqSave', [HomeController::class, 'faqSave'])->name('home.faqSave');
    Route::get('/faqDelete/{id}', [HomeController::class, 'faqDelete'])->name('home.faqDelete');
    Route::get('/company', [HomeController::class, 'company'])->name('home.company');
    Route::post('/companyInsert', [HomeController::class, 'companyInsert'])->name('home.companyInsert');
    Route::get('/contactInfo', [HomeController::class, 'contactInfo'])->name('home.contactInfo');
    Route::post('/saveCompany', [HomeController::class, 'saveCompany'])->name('home.saveCompany');

    Route::get('/scholarshipList', [HomeController::class, 'scholarshipList'])->name('home.scholarshipList');
    Route::post('/savescholorship', [HomeController::class, 'savescholorship'])->name('home.savescholorship');
    Route::get('/addscholorship', [HomeController::class, 'addscholorship'])->name('home.addscholorship');

    Route::post('/usersignup', [HomeController::class, 'usersignup'])->name('home.usersignup');
    Route::post('/userLogins', [HomeController::class, 'userLoginCheck'])->name('home.userLogins');
    Route::get('/logout', [HomeController::class, 'logout'])->name('home.logout');
});



Route::get('/logout-success', function () {
    // This is just an example route for the logout success page.
    // You can replace it with the actual route you want to redirect to after logout.
    return view('logout-success'); // Assuming you have a blade view named logout-success.blade.php
})->name('logout-success');


Route::get('/product', [Razorpay::class, 'index'])->name('product');

Route::post('razorpay-payment', [Razorpay::class, 'store'])->name('razorpay.payment.store');

Route::prefix('students')->group(function () {
    Route::get('/students', [StudentController::class, 'studentslist'])->name('students.studentslist');
    Route::get('/dashboard', [StudentController::class, 'userDashboard'])->name('students.dashboard');
    Route::get('/logout', [StudentController::class, 'logout'])->name('students.logout');
    Route::get('/notification', [StudentController::class, 'notification'])->name('students.notification');
    Route::get('/allpayment', [StudentController::class, 'allpayment'])->name('students.allpayment');
    Route::get('/profile', [StudentController::class, 'profile'])->name('students.profile');
    Route::get('/scholorshipApply', [StudentController::class, 'scholorshipApply'])->name('students.scholorshipApply');
    Route::get('/exportCsv', [StudentController::class, 'exportCsv'])->name('students.exportCsv');
    Route::post('/uploadexcel', [StudentController::class, 'uploadexcel'])->name('students.uploadexcel');

    Route::get('/scholorshipApplyList', [StudentController::class, 'scholorshipApplyList'])->name('students.scholorshipApplyList');
});

Route::prefix('coupon')->group(function () {
    Route::get('/lists', [CouponCodeController::class, 'lists'])->name('coupon.lists');
    Route::get('/filter', [CouponCodeController::class, 'filter'])->name('coupon.filter');
    Route::get('/manage', [CouponCodeController::class, 'manage'])->name('coupon.manage');
    Route::post('/saveCoupon', [CouponCodeController::class, 'saveCoupon'])->name('coupon.saveCoupon');
});

Route::prefix('result')->group(function () {
    Route::get('/newresult', [ResultController::class, 'newresult'])->name('result.newresult');
    Route::get('/previousresult', [ResultController::class, 'subcategory'])->name('result.previousresult');
});

Route::prefix('news')->group(function () {
    Route::get('/blognews', [NewsController::class, 'blognews'])->name('news.blognews');
    Route::get('/notification', [NewsController::class, 'notification'])->name('news.notification');
    Route::post('/notificationSave', [NewsController::class, 'notificationSave'])->name('news.notificationSave');
    Route::get('/notificationDelete/{id}', [NewsController::class, 'notificationDelete'])->name('news.notificationDelete');

    Route::post('/blogSave', [NewsController::class, 'blogSave'])->name('news.blogSave');
    Route::get('/blogDelete/{id}', [NewsController::class, 'blogDelete'])->name('news.blogDelete');
});

Route::prefix('centers')->group(function () {
    Route::get('/lists', [CenterController::class, 'list'])->name('centers.lists');
    Route::post('/addnew', [CenterController::class, 'addCenter'])->name('centers.addnew');
    Route::get('/manage', [CenterController::class, 'manage'])->name('centers.manage');
});

Route::prefix('enquiry')->group(function () {
    Route::get('/instituteList', [EnquiryController::class, 'instituteList'])->name('enquiry.institute');
    Route::get('/studentList', [EnquiryController::class, 'subcategory'])->name('enquiry.students');
    Route::get('/quickContact', [EnquiryController::class, 'quickContact'])->name('enquiry.quickContact');
    Route::get('/contactPage', [EnquiryController::class, 'contactPage'])->name('enquiry.contactPage');
    Route::post('/replymail', [EnquiryController::class, 'replymail'])->name('enquiry.replymail');
});

Route::prefix('admin')->group(function () {
    Route::get('/changepassword', [AdminController::class, 'changepassword'])->name('admin.changepassword');
    Route::post('/changePassword', [AdminController::class, 'changeNewPassword'])->name('admin.changePassword');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::prefix('download')->group(function () {
    Route::get('/schorshipform', [AdminController::class, 'changepassword'])->name('admin.changepassword');
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/scholarshipForm', [HomeController::class, 'scholarshipForm'])->name('home.scholarshipForm');
    Route::post('/scholorship_insert', [HomeController::class, 'scholorship_insert'])->name('home.scholorship_insert');
    Route::get('/home.couponcode', [HomeController::class, 'couponcode'])->name('home.couponcode');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/result', [ProfileController::class, 'result'])->name('profile.result');
    Route::post('/searchresult', [ProfileController::class, 'searchresult'])->name('profile.searchresult');
});

Route::post('/studentsignup', [StudentController::class, 'usersignup'])->name('studentSignup');
Route::post('/student-login', [StudentController::class, 'login'])->name('studentlogin');
Route::prefix('students')->group(function () {
    Route::group(['middleware' => ['student']], function () {
        Route::get('/studentDashboard', [StudentController::class, 'studentDashboard'])->name('studentDashboard');
        Route::get('/studentform', [StudentController::class, 'studentform'])->name('studentform');
        Route::get('/student_logout', [StudentController::class, 'logout'])->name('student.logout');

        // Student form filling
        Route::post('/addstudents', [StudentController::class, 'addstudent'])->name('students.addstudent');
        Route::get('/addqualificationscreate', [StudentController::class, 'addQualificationsCreate'])->name('students.addQualificationsCreate');
        Route::post('/addqualifications', [StudentController::class, 'addQualifications'])->name('students.addQualifications');
        Route::get('/additional_details_create', [StudentController::class, 'additionalDetailsCreate'])->name('students.additionalDetailCreate');
        Route::post('/additional_details_Store', [StudentController::class, 'additionalDetailStore'])->name('students.additionalDetailStore');
        Route::post('/final_submit', [StudentController::class, 'finalSubmit'])->name('students.finalSubmit');
        Route::get('/form_review', [StudentController::class, 'form_review'])->name('students.formReview');
    });
});

Route::prefix('students')->group(function () {
    Route::group(['middleware' => ['IsStudentFinallySubmitted']], function () {
        Route::get('/payment', [StudentController::class, 'student_payment'])->name('student.payment');
        Route::get('/student_logout', [StudentController::class, 'logout'])->name('student.logout');
        Route::get('/form_review', [StudentController::class, 'form_review'])->name('students.formReview');

    });
});

Route::get('/categories', [CommonController::class, 'categoryAll'])->name('category');
Route::get('subcategories/{category}', [CommonController::class, 'subcategory'])->name('subcategory');
Route::get('subjects/{subcategory}', [CommonController::class, 'subject'])->name('subject');
Route::get('districts/{state}', [CommonController::class, 'districts']);

require __DIR__ . '/auth.php';
