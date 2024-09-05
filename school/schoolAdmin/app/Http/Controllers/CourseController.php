<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CourseDetailsModel;
use App\Models\SubCategoryModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    //******************************** Course ********************************* */
    public function courses()
    {
        return view('Admin.courses.courses');
    }

    //******************************** End Course ********************************* */



    //******************************** Category Start *****************************
    public function deleteCategory($id)
    {
        // Find the category by its ID
        $category = Category::find($id);

        // Check if the category exists
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Delete the category
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    public function category()
    {
        $categories = Category::all();
        return view('Admin.courses.category', ['categories' => $categories]);
    }

    public function savecategory(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Get the category name from the request
        $categoryName = $request->input('category');

        // Save the image file
        $imagePath = $request->file('image')->store('category_images', 'public');

        // Create a new Category instance
        $category = new Category();
        $category->name = $categoryName;
        $category->image = $imagePath; // Save the image path to the database
        $category->save();

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Category added successfully!');
    }


    //******************************** Category End *****************************

    //******************************** Sub Category Start *****************************
    public function subcategorybyId($id)
    {
        $category = Category::find($id);
        $subCategories = SubCategoryModel::where('category_id', $id)->get();
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        return view('Admin.courses.subcategory_by_id', ['category' => $category, 'subCategory' => $subCategories]);
    }

    public function savesubcategory(Request $request)
    {
        // Validate the request data
        $request->validate([
            'subcategory' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Get the category name from the request
        $subcategoryName = $request->input('subcategory');
        $category_id = $request->input('category_id');

        // Save the image file
        $imagePath = $request->file('image')->store('category_images', 'public');

        // Create a new Category instance
        $subcategory = new SubCategoryModel();
        $subcategory->subcategory_name = $subcategoryName;
        $subcategory->category_id = $category_id;
        $subcategory->image = $imagePath; // Save the image path to the database
        $subcategory->save();

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Category added successfully!');
    }


    public function subcategoryall()
    {
        $subcategories = SubCategoryModel::all();
        return view('Admin.courses.subcategoryall', ['subcategories' => $subcategories]);
    }

    public function subcategory(Request $req)
    {
        return view('Admin.courses.subcategory');
    }
    //******************************** Sub Category Start *****************************


    //***************************** Course Start ************************************** */
    public function courseslist()
    {
        $course = CourseDetailsModel::all();
        return view('Admin.courses.courseList', ['course' => $course]);
    }
    public function coursesubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'overview' => 'required',
            // Add validation rules for other fields as needed
        ]);

        // Handle file uploads
        $notificationFilePath = null;
        if ($request->hasFile('notification_file')) {
            $notificationFilePath = $request->file('notification_file')->store('public/files');
        }

        $examDetailsFilePath = null;
        if ($request->hasFile('exam_details_file')) {
            $examDetailsFilePath = $request->file('exam_details_file')->store('public/files');
        }

        // Create a new CourseDetails instance
        $courseDetails = new CourseDetailsModel();
        $courseDetails->overview = $request->input('overview');
        $courseDetails->otherdetails = $request->input('otherdetails');
        $courseDetails->notification = $request->input('notification');
        $courseDetails->registration = $request->input('registration');
        $courseDetails->exam_date = $request->input('exam_Date');
        $courseDetails->exam_mode = $request->input('exam_mode');
        $courseDetails->exam_pattern = $request->input('exam_pattern');
        $courseDetails->vacancies = $request->input('vacancies');
        $courseDetails->pay_scale = $request->input('pay_scale');
        $courseDetails->age_criteria = $request->input('age_criteria');
        $courseDetails->eligibility = $request->input('eligibility');
        $courseDetails->official_site = $request->input('official_site');
        $courseDetails->notification_file_path = $notificationFilePath;
        $courseDetails->exam_details_file_path = $examDetailsFilePath;

        // Save the CourseDetails instance to the database
        $courseDetails->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Course details submitted successfully!');
    }
    //***************************** End of Course *************************************** */


    //******************************* Subject Start ******************************************* */

    public function subjects()
    {
        $subjectList = SubjectModel::all();
        return view('Admin.courses.subjectList', ['subject' => $subjectList]);

    }

    public function deleteSubject($id)
    {
        $subjectId = SubjectModel::find($id);
        if (!$subjectId) {
            return redirect()->back()->with('error', 'Subject Not Found');
        } else {
            $subjectId->delete();
            return redirect()->back()->with('success', 'Subject Deleted');
        }
    }

    public function savesubject(Request $request)
    {
        // Validate the request data
        $request->validate([
            'subjectName' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Get the category name from the request
        $subjectName = $request->input('subjectName');
        // Save the image file
        $imagePath = $request->file('image')->store('category_images', 'public');

        // Create a new Category instance
        $subject = new SubjectModel();
        $subject->subjectName = $subjectName;
        $subject->image = $imagePath; // Save the image path to the database
        $subject->save();

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Category added successfully!');

    }


    //********************************* End of Subject ********************************************* */




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
