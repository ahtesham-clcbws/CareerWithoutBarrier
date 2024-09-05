<?php

namespace App\Http\Controllers;

use App\Models\Corporate;
use App\Models\QuickContactModel;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function instituteList(){
        $enq=Corporate::all();
        return view('Admin.Enquiry.instituteList',['institute'=>$enq]);
    }

    public function quickContact(){
        $enq=QuickContactModel::all();
        return view('Admin.Enquiry.quickContact',['enquiry'=>$enq]);
    }

    public function contactPage(){

    }
}
