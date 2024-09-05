<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\FaqModel;
use App\Models\QuickContactModel;
use App\Services\TextlocalService;
use Illuminate\Support\Facades\DB;
use App\Models\BenefitsModel;
use App\Models\Corporate;
use App\Models\GovtwebsiteModel;
use App\Models\SliderModel;
use App\Models\TestimonialsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    protected $textlocalService;

    public function __construct(TextlocalService $textlocalService)
    {
        $this->textlocalService = $textlocalService;
    }

    public function faq(){
        $faq=FaqModel::all();
        return view('Admin.Home.faq',['faq'=>$faq]);
    }

    public function company(){
        return view('Admin.Home.company');
    }

    public function index()
    {
        return view('website.homepage');
    }

    public function aboutus()
    {
        return view('website.aboutus');
    }

    public function preparation()
    {
        return view('website.preparation');
    }

    public function scholarship()
    {
        return view('website.scholarship');
    }

    public function contact()
    {
        $faq=FaqModel::all();
        return view('website.contact',['faq'=>$faq]);
    }


    public function sendMail(Request $request)
    {
        $otp = mt_rand(100000, 999999);

        // Save OTP in session
        $request->session()->put('otp', $otp);
        $email = $request->input('email');
        // Mail::to($request->user())->send(new OTPMail($otp));
        Mail::to('vishal@ppnsolutions.com')->send(new OTPMail($otp));
        return response()->json(['message' => 'OTP sent successfully'], 200);
    }

    public function sendOtp(Request $request)
    {
        // Generate OTP
        $otp = mt_rand(100000, 999999);

        // Save OTP in session
        $request->session()->put('otp', $otp);

        // Phone number to send OTP
        $phoneNumber = $request->input('phone');

        // Compose message
        //  $message = "Your OTP is: $otp";

        $message = "Dear user
        Your OTP for sign up to The Gyanology portal is $otp.
        Valid for 10 minutes. Please do not share this OTP.
        Regards
        The Gyanology Team";

        // Send OTP via SMS
        $response = $this->textlocalService->sendSms([$phoneNumber], $message);

        // Handle response
        if ($response) {
            return response()->json(['success' => true, 'message' => 'OTP sent successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to send OTP']);
        }

    }

    public function enquirySubmit(Request $request){
        $name=$request->name;
        $mobile=$request->mobile;
        $message=$request->message;
        $enq=new QuickContactModel();
        $enq->name=$name;
        $enq->mobile=$mobile;
        $enq->message=$message;
        $enq->save();
        if($enq){
            return redirect()->back()->with('success','Enquiry Submit');
        }else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function corporateSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'institute_name' => 'required|string',
            'type_institution' => 'required|string',
            'interested_for' => 'required|string',
            'established_year' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'otp' => 'required|string', // Ensure OTP is provided
            'address' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'privacy_policy' => 'required|accepted',
        ]);

        // Validate OTP
        $enteredOTP = $request->input('otp');
        $storedOTP = $request->session()->get('otp');

        // if ($enteredOTP !== $storedOTP) {
        //     return redirect()->back()->with('error', 'OTP mismatch. Please enter the correct OTP.');
        // }

        // Handle file upload
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('corporate_attachments');
            $validatedData['attachment'] = $attachmentPath;
        }

        // Create a new Corporate instance and save the data
        $institute = new Corporate();
        $institute->name = $request->name;
        $institute->institute_name = $request->institute_name;
        $institute->type_institution = $request->type_institution;
        $institute->interested_for = $request->interested_for;
        $institute->established_year = $request->established_year;
        $institute->email = $request->email;
        $institute->phone = $request->phone;
        $institute->otp = $request->otp;
        $institute->address = $request->address;
        $institute->city = $request->city;
        $institute->pincode = $request->pincode;
        $institute->attachment = $request->attachmentPath;
        $institute->save();
        return redirect()->back()->with('success', 'Corporate inquiry submitted successfully!');
    }


    public function slider()
    {
        $slider = SliderModel::all();
        return view('Admin.Home.slider', ['slider' => $slider]);
    }



    public function saveSlider(Request $request)
    {
        // Validate the request data
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Save the image file
        $imagePath = $request->file('image')->store('slider', 'public');

        // Create a new Category instance
        $slider = new SliderModel();
        $slider->image = $imagePath; // Save the image path to the database
        $slider->save();

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function deleteSlider($id)
    {
        // Find the category by its ID
        $slider = SliderModel::find($id);

        // Check if the category exists
        if (!$slider) {
            return redirect()->back()->with('error', 'Image not found.');
        }

        // Delete the category
        $slider->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    public function benefit()
    {
        $benefits = BenefitsModel::all();
        return view('Admin.Home.benefit', ['benefit' => $benefits]);
    }

    public function deletebenefits($id)
    {
        $benefit = BenefitsModel::find($id);
        // Check if the category exists
        if (!$benefit) {
            return redirect()->back()->with('error', 'Image not found.');
        }

        // Delete the category
        $benefit->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    public function savebenefits(Request $request)
    {
        // Validate the request data
        $request->validate([
            'benefit' => 'required', // Adjust file types and size as needed
        ]);
        $benefit_txt = $request->benefit;
        // Create a new Category instance
        $benefit = new BenefitsModel();
        $benefit->benefits = $benefit_txt;
        $benefit->save();
        // Redirect back or return a response
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function govtwebsite()
    {
        $website = GovtwebsiteModel::all();
        return view('Admin.Home.govtwebsite', ['website' => $website]);
    }

    public function deleteGovtwebsite($id)
    {
        $govtWebsite = GovtwebsiteModel::find($id);
        // Check if the category exists
        if (!$govtWebsite) {
            return redirect()->back()->with('error', 'Image not found.');
        }

        // Delete the category
        $govtWebsite->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }



    public function savegovtwebsite(Request $request)
    {
        // Validate the request data
        $request->validate([
            'website_link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Save the image file
        $imagePath = $request->file('image')->store('slider', 'public');
        $website_link = $request->website_link;
        // Create a new Category instance
        $govtWebsite = new GovtwebsiteModel();
        $govtWebsite->image = $imagePath;
        $govtWebsite->website_link = $website_link;// Save the image path to the database
        $govtWebsite->save();

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Website added successfully!');
    }

    public function testimonials()
    {
        $testimonials = TestimonialsModel::all();
        return view('Admin.Home.testimonials', ['testimonials' => $testimonials]);
    }

    public function testimonialSubmit(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'testimonials_name' => 'required',
            'testimonials_msg' => 'required',
        ]);
        // Save the image file
        $imagePath = $request->file('profile_image')->store('slider', 'public');
        $name = $request->testimonials_name;
        $message = $request->testimonials_msg;
        // Create a new Category instance
        $testimonials = new TestimonialsModel();
        $testimonials->image = $imagePath;
        $testimonials->name = $name;
        $testimonials->message = $message;
        $testimonials->save();

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Website added successfully!');
    }

    public function deleteTestimonials($id)
    {
        $testimonials = TestimonialsModel::find($id);
        if (!$testimonials) {
            return redirect()->back()->with('error', 'Testimonials not found.');
        } else {
            $testimonials->delete();
            return redirect()->back()->with('success', 'Testimonials deleted');
        }
    }

    public function faqSave(Request $request){
        $title = $request->title;
        $details = $request->details;
        $faq = new FaqModel();
        $faq->title = $title;
        $faq->details = $details;
        $faq->save();
        return redirect()->back()->with('success', 'Faq added successfully!');
    }

    public function faqDelete($id){
        $faq = FaqModel::find($id);
        if (!$faq) {
            return redirect()->back()->with('error', 'Faq not found');
        } else {
            $faq->delete();
            return redirect()->back()->with('success', 'Faq Deleted');
        }
    }
}
