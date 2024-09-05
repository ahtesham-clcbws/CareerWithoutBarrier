<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('course')->group(function () {
    Route::get('/category', [CourseController::class, 'category'])->name('course.category');
    Route::get('/subcategoryall', [CourseController::class, 'subcategoryall'])->name('course.subcategory');
    Route::get('/subcategorybyId/{id}', [CourseController::class, 'subcategorybyId'])->name('courses.subcategorybyid');
    Route::get('/deleteCategory/{id}', [CourseController::class, 'deleteCategory'])->name('courses.deleteCategory');

    Route::get('/subjects', [CourseController::class, 'subjects'])->name('course.subjects');
    Route::get('/courses', [CourseController::class, 'courses'])->name('course.courses');
    Route::post('/savecategory', [CourseController::class, 'savecategory'])->name('course.savecategory');
    Route::post('/savesubcategory', [CourseController::class, 'savesubcategory'])->name('course.savesubcategory');
    Route::get('/courseslist', [CourseController::class, 'courseslist'])->name('course.courseslist');

    Route::get('/courses', [CourseController::class, 'courses'])->name('course.courses');
    Route::post('/coursesubmit', [CourseController::class, 'coursesubmit'])->name('course.coursesubmit');

    Route::post('/savesubject', [CourseController::class, 'savesubject'])->name('course.savesubject');
    Route::get('/deleteSubject/{id}', [CourseController::class, 'deleteSubject'])->name('courses.deleteSubject');
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

    Route::post('/corporateSubmit', [HomeController::class, 'corporateSubmit'])->name('home.corporateSubmit');
    Route::post('/sendOtp', [HomeController::class, 'sendOtp'])->name('home.sendOtp');
    Route::post('/sendMail', [HomeController::class, 'sendMail'])->name('home.sendMail');
    Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('home.aboutus');
    Route::get('/preparation', [HomeController::class, 'preparation'])->name('home.preparation');
    Route::get('/scholarship', [HomeController::class, 'scholarship'])->name('home.scholarship');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/', [HomeController::class, 'index'])->name('home.front');
    Route::post('/enquirySubmit',[HomeController::class,'enquirySubmit'])->name('home.contactPage');
    Route::get('/faq',[HomeController::class,'faq'])->name('home.faq');
    Route::post('/faqSave',[HomeController::class,'faqSave'])->name('home.faqSave');
    Route::get('/faqDelete/{id}',[HomeController::class,'faqDelete'])->name('home.faqDelete');
    Route::get('/company',[HomeController::class,'company'])->name('home.company');
});


Route::prefix('students')->group(function () {
    Route::get('/students', [StudentController::class, 'studentslist'])->name('students.studentslist');
    Route::get('/addstudents', [StudentController::class, 'addstudent'])->name('students.addstudent');
});

Route::prefix('result')->group(function () {
    Route::get('/newresult', [ResultController::class, 'category'])->name('result.newresult');
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
    Route::get('/lists', [CenterController::class, 'category'])->name('centers.lists');
    Route::get('/manage', [CenterController::class, 'subcategory'])->name('centers.manage');
});

Route::prefix('enquiry')->group(function () {
    Route::get('/instituteList', [EnquiryController::class, 'instituteList'])->name('enquiry.institute');
    Route::get('/studentList', [EnquiryController::class, 'subcategory'])->name('enquiry.students');
    Route::get('/quickContact', [EnquiryController::class, 'quickContact'])->name('enquiry.quickContact');
    Route::get('/contactPage', [EnquiryController::class, 'contactPage'])->name('enquiry.contactPage');
});

Route::prefix('admin')->group(function () {
    Route::get('/changepassword', [AdminController::class, 'changepassword'])->name('admin.changepassword');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});


