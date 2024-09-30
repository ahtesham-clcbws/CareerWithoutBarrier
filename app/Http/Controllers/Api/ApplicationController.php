<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApplicationCodeList;
use App\Models\BoardAgencyStateModel;
use App\Models\Category;
use App\Models\District;
use App\Models\Educationtype;
use App\Models\Gn_DisplayExamAgencyBoardUniversity;
use App\Models\Gn_OtherExamClassDetailModel;
use App\Models\State;
use App\Models\Student;
use App\Models\StudentCode;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    // applyFormAllData
    public function index(Request $request)
    {
        // Cache::clear();
        try {
            $states = Cache::get('states');
            if (!$states) {
                $states = State::select('id', 'name')->get();
                Cache::put('States', $states, 3600);
            }
            $districts = Cache::get('districts');
            if (!$districts) {
                $districts = District::select('id', 'name', 'state_id')->get();
                Cache::put('districts', $districts, 3600);
            }
            $qualifications = Cache::get('qualifications');
            if (!$qualifications) {
                $qualifications = BoardAgencyStateModel::select('id', 'name')->with('education')->with('classesGroupExam')->get();
                Cache::put('qualifications', $qualifications, 3600);
            }

            $scholarship_category = Cache::get('scholarship_category');
            if (!$scholarship_category) {
                $scholarship_category = Educationtype::select('id', 'name')->get();
                Cache::put('scholarship_category', $scholarship_category, 3600);
            }
            // $scholarship_opted_for = Cache::get('scholarship_opted_for');
            // if (!$scholarship_opted_for) {
            //     $scholarship_opted_for = Gn_OtherExamClassDetailModel::select('id', 'name', 'education_type_id', 'classes_group_exams_id', 'agency_board_university_id')->get();
            //     Cache::put('scholarship_opted_for', $scholarship_opted_for, 3600);
            // }

            return response()->json([
                'success' => true,
                'data' => [
                    'qualifications' => $qualifications,
                    'scholarship_category' => $scholarship_category,
                    // 'scholarship_opted_for' => $scholarship_opted_for,
                    'states' => $states,
                    'districts' => $districts,
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }

    }

    public function applicationSubmition(Request $request)
    {
        try {
            $student = $request->user();
            if ($request->form_step == 1) {
                $student->father_name = $request->father_name;
                $student->dob = $request->dob;
                $student->address = $request->address;
                $student->state_id = $request->state_id;
                $student->district_id = $request->district_id;
                $student->pincode = $request->pincode;
                $student->landmark = !empty(trim($request->landmark)) ? trim($request->landmark) : null;
                if (!$student->form_step || $student->form_step < 1) {
                    $student->form_step = 1;
                }
                $student->save();

            } elseif ($request->form_step == 2) {
                $student->qualification = $request->qualification;
                $student->scholarship_category = $request->scholarship_category;
                $student->scholarship_opted_for = $request->scholarship_opted_for;
                $student->test_center_a = $request->test_center_a;
                $student->test_center_b = $request->test_center_b;

                if (!$student->form_step || $student->form_step < 2) {
                    $student->form_step = 2;
                }
                $student->save();

            }

            // <option value="1" {{$student->family_income == '1' ? 'selected' : ''}}>Less than 1L</option>
            // <option value="2" {{$student->family_income == '2' ? 'selected' : ''}}>1L to 2L</option>
            // <option value="3" {{$student->family_income == '3' ? 'selected' : ''}}>2L to 3L</option>
            // <option value="4" {{$student->family_income == '4' ? 'selected' : ''}}>3L to 5L</option>
            // <option value="5" {{$student->family_income == '5' ? 'selected' : ''}}>5L and above</option>

            // 'is_gov_exam_participated' => 'required',
            // 'govt_exams_1' => "$examRequired|string",
            // 'exam_one_year' => "nullable|string",
            // 'exam_one_result' => "nullable|string",
            // 'govt_exams_2' => 'nullable|string',
            // 'exam_two_year' => 'nullable|string',
            // 'exam_two_result' => 'nullable|string',

            // 'is_apply_career_without_barrier' => 'required',
            // 'career_exams_1' => 'nullable',
            // 'year' => "$careerRequired|string",
            // 'career_one_result' => 'nullable',
            // 'career_exams_2' => 'nullable',
            // 'career_two_year' => 'nullable',
            // 'career_two_result' => 'nullable',

            // 'family_income' => 'nullable|string',
            // 'father_occupation' => 'nullable|string',
            // 'mother_occupation' => 'nullable|string',

            // 'terms_conditions' => 'required',
            // 'signature' => "$signReq|file|mimes:jpeg,png|max:2048",
            elseif ($request->form_step == 3) {
                $student->is_gov_exam_participated = $request->is_gov_exam_participated;
                if (strtolower($request->is_gov_exam_participated) == 'yes') {
                    $student->govt_exams_1 = $request->govt_exams_1;
                    $student->exam_one_year = intval($request->exam_one_year);
                    $student->exam_one_result = $request->exam_one_result;

                    // $student->govt_exams_2 = $request->govt_exams_2;
                    // $student->exam_two_year = intval($request->exam_two_year);
                    // $student->exam_two_result = $request->exam_two_result;
                } else {
                    $student->govt_exams_1 = null;
                    $student->exam_one_year = null;
                    $student->exam_one_result = null;

                    $student->govt_exams_2 = null;
                    $student->exam_two_year = null;
                    $student->exam_two_result = null;
                }

                $student->is_apply_career_without_barrier = $request->is_apply_career_without_barrier;
                if (strtolower($request->is_apply_career_without_barrier) == 'yes') {
                    $student->career_exams_1 = $request->career_exams_1;
                    $student->year = intval($request->year);
                    $student->career_one_result = $request->career_one_result;

                    // $student->career_exams_2 = $request->career_exams_2;
                    // $student->career_two_year = intval($request->career_two_year);
                    // $student->career_two_result = $request->career_two_result;
                } else {
                    $student->career_exams_1 = null;
                    $student->year = null;
                    $student->career_one_result = null;

                    $student->career_exams_2 = null;
                    $student->career_two_year = null;
                    $student->career_two_result = null;
                }

                $student->family_income = $request->family_income;
                $student->father_occupation = $request->father_occupation;
                $student->mother_occupation = $request->mother_occupation;
                $student->terms_conditions = 1;

                // Handle the profile image upload
                if ($request->hasFile('signature')) {
                    $image = $request->file('signature');

                    // Get the original file nameprofile_picture
                    $originalName = $image->getClientOriginalName();

                    // Define the path where the file should be stored
                    $filePath = 'student/signature/' . date('Y/M/') . $originalName;

                    $path = Storage::disk('public')->put('', $image, $filePath);

                    $student->signature = $path;
                    $student->save();
                }

                $student->save();

            } elseif ($request->form_step == 4) {
                $student->name_checked = 1;
                $student->father_name_checked = 1;
                $student->dob_checked = 1;
                $student->mobile_checked = 1;
                $student->email_checked = 1;
                $student->qualification_checked = 1;
                $student->scholarship_category_checked = 1;
                $student->scholarship_opted_for_checked = 1;
                $student->choiceCenterA_checked = 1;
                $student->choiceCenterB_checked = 1;

                if (!$student->form_step || $student->form_step < 4) {
                    $student->form_step = 4;
                }
                $student->is_final_submitted = 1;
                $student->save();

                $studentCode = new StudentCode();
                $studentCode->application_code = $this->generateAppCode($student);
                $studentCode->stud_id = $student->id;
                $studentCode->save();
            }

            return response()->json([
                'success' => true,
                'message' => '',
                'student' => getStudentById($student->id)
            ]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    // public function applyCoupon(Request $request)
    // {
    //     $student = Auth::guard('student')->user();

    //     $studentCode = StudentCode::where('stud_id', $student->id)->get()->last();
    //     if (!$studentCode) {
    //         $studentCode = new StudentCode();
    //     }

    //     $validated = $request->validate([
    //         'coupan_code' => 'required|string',
    //     ]);

    //     try {
    //         DB::beginTransaction();
    //         $couponCode = CouponCode::where('is_applied', 0)
    //             ->where('couponcode', $validated['coupan_code'])
    //             ->first();

    //         if (is_null($couponCode)) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => "Coupon Code invalid"
    //             ]);
    //         }

    //         $couponCode->is_applied = 1;
    //         $couponCode->save();


    //         $afterAppliedRemainValue = $student->disability == 'Yes' ? 0 : couponValueApply($couponCode->valueType, $couponCode->value);

    //         $corporate = $couponCode->corporate;
    //         if ($corporate) {
    //             $studentCode->corporate_id = $corporate->id;
    //             $studentCode->corporate_name = $corporate->name;
    //         }
    //         $studentCode->forceFill($validated);
    //         $studentCode->stud_id = $student->id;
    //         $studentCode->coupan_code = $couponCode->couponcode;
    //         $studentCode->is_coupan_code_applied = 1;
    //         $studentCode->coupan_value = 750 - $afterAppliedRemainValue > 0 ?  750 - $afterAppliedRemainValue : 0;
    //         $studentCode->fee_amount = $afterAppliedRemainValue;

    //         if ($studentCode->fee_amount <= 0) {
    //             $studentCode->used_coupon = 1;
    //         }
    //         $studentCode->save();

    //         DB::commit();
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Coupon code applied successfully.',
    //             'amount' => $studentCode->fee_amount,
    //             'discount_amount' => $studentCode->coupan_value,
    //             'coupon_code' => $couponCode->couponcode,
    //             'corporate_name' => $studentCode->corporate_name
    //         ]);
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         logger('Failed:', [$th]);
    //         return back()->withErrors('Failed to apply code');
    //     }

    //     // Redirect back or return a response

    // }

    // public function removeCoupon(Request $request)
    // {
    //     $student = Auth::guard('student')->user();

    //     try {
    //         DB::beginTransaction();
    //         $studentCode = StudentCode::where('stud_id', $student->id)->where('coupan_code', $request->coupon_code)->first();

    //         if (!$studentCode) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'No coupon applied to remove.',
    //             ]);
    //         }

    //         $studentCode->corporate_name = null;
    //         $studentCode->corporate_id = null;
    //         $studentCode->coupan_code = null;
    //         $studentCode->is_coupan_code_applied = false;
    //         $studentCode->fee_amount = 750;
    //         if ($studentCode->fee_amount > 0) {
    //             $studentCode->used_coupon = false;
    //         }
    //         $studentCode->coupan_value = 0;
    //         $studentCode->save();

    //         $couponCode = CouponCode::where('couponcode', $request->coupon_code)->first();

    //         if ($couponCode) {
    //             $couponCode->is_applied = false;
    //             $couponCode->save();
    //         }

    //         DB::commit();
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Coupon removed successfully.',
    //         ]);
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         logger('Failed:', [$th]);
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Failed to remove coupon.',
    //         ]);
    //     }
    // }

    public function generateAppCode($student)
    {
        try {
            DB::beginTransaction();

            $city = $student->district->name;
            $cityPrefix = strtoupper(substr($city, 0, 3));

            // Check if the city already exists in the roll_numbers table
            $appCodeRecord = ApplicationCodeList::orderBy('last_app_code', 'desc')->first();

            if ($appCodeRecord) {
                $existCityAppCodeList = ApplicationCodeList::where('city', $city)->orderBy('last_app_code', 'desc')->first();

                if ($existCityAppCodeList) {
                    $defaultStartNumber = $appCodeRecord->last_app_code;
                    $defaultStartNumber = $defaultStartNumber + 1;
                } else {
                    $defaultStartNumber = $appCodeRecord->last_app_code;
                    $additionalIncrement = 20;
                    $defaultStartNumber = $defaultStartNumber + $additionalIncrement;
                }
                $appCodeRecord = new ApplicationCodeList();
                $appCodeRecord->city = $city;
                $appCodeRecord->last_app_code = $defaultStartNumber;
                $appCodeRecord->save();
            } else {

                $defaultStartNumber = 31010;

                $appCodeRecord = new ApplicationCodeList();

                $appCodeRecord->city = $city;
                $appCodeRecord->last_app_code = $defaultStartNumber;
                $appCodeRecord->save();
            }

            // Generate the full roll number
            $appCode = $appCodeRecord->last_app_code;
            $fullAppCodeList = $cityPrefix . $appCode;

            DB::commit();

            return $fullAppCodeList;
        } catch (\Throwable $th) {
            DB::rollBack();
            logger('Failed to generate App Code', [$th]);
        }
    }


    public function onSelectQualification_ScholarshipCategory($id)
    {
        $boardConnection = Gn_DisplayExamAgencyBoardUniversity::where('board_id', 'LIKE', '%' . $id . '%')
            ->with('educations')
            ->get();
        $educations = $boardConnection->pluck('educations')->flatten()->unique('id');

        foreach ($educations as $key => $education) {
            $educations[$key]->name = str_replace("\r\n", ' ', $education->name);
        }

        return response()->json(['success' => true, 'message' => '', 'data' => $educations]);
    }


    public function getScholarshipCategoryOptedFor($id, $qualificationId)
    {
        $scholarOptedFor = Gn_OtherExamClassDetailModel::where('education_type_id', $id)->where('agency_board_university_id', $qualificationId)->get();

        if ($scholarOptedFor->isNotEmpty()) {
            return response()->json(['success' => true, 'data' => $scholarOptedFor]);
        }
        return response()->json(['success' => false, 'message' => 'Select another scholarship category.', 'data' => $scholarOptedFor]);
    }

}
