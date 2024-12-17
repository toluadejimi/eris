<?php

namespace App\Http\Controllers;

use App\Models\ExamMarkLedger;
use App\Models\ParentDetail;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdjustResultController extends Controller
{
    public function adjust_result()
    {


        $data['message'] = null;
        $data['exam'] = ExamMarkLedger::where('total', 0)->get();
        $data['vacation_day'] = Setting::where('id', 1)->first()->vacation_day;
        $data['resumption_day'] = Setting::where('id', 1)->first()->resumption_day;

        return view('adjust-result', $data);


    }

    public function adjust_resumption(request $request)
    {

        Setting::where('id', 1)->update(['resumption_day' => $request->resumption_day]);
        return back()->with('messsage', 'Resumption Date updated successfully');

    }

    public function adjust_vacation(request $request)
    {

        Setting::where('id', 1)->update(['vacation_day' => $request->vacation_day]);
        return back()->with('messsage', 'Vacation Date updated successfully');


    }





    public function delete_exam(request $request)
    {


        $exam = ExamMarkLedger::where('id', $request->id)->delete();
        $data['message'] = "Exam has been successfully deleted";
        $data['exam'] = ExamMarkLedger::where('total', 0)->get();


        return view('adjust-result', $data);


    }


    public function reg_info(request $request)
    {


        $pd_ck = ParentDetail::where('students_id', $request->id)->first() ?? null;
        if($pd_ck != null){
            return back()->with('error', "Parent Info already esist");
        }

       $pd =  new ParentDetail();
       $pd->students_id = $request->id;
        $pd->father_first_name = $request->father_first_name;
        $pd->father_middle_name = $request->father_middle_name;
        $pd->father_last_name = $request->father_last_name ?? "Name";
        $pd->father_residence_number = $request->father_residence_number;
        $pd->father_email = $request->father_email;
        $pd->father_mobile_1 = $request->father_mobile_1;
        $pd->father_occupation = $request->father_occupation;
        $pd->father_office_number = $request->father_office_number;
        $pd->father_office = $request->father_office;
        $pd->mother_first_name = $request->mother_first_name;
        $pd->mother_middle_name = $request->mother_middle_name;
        $pd->mother_last_name = $request->mother_last_name;
        $pd->mother_residence_number = $request->mother_residence_number;
        $pd->mother_email = $request->mother_email;
        $pd->mother_mobile_1 = $request->mother_mobile_1;
        $pd->mother_occupation = $request->mother_occupation;
        $pd->mother_office_number = $request->mother_office_number;
        $pd->mother_office = $request->mother_office;
        $pd->save();


        return back()->with('message', "Information has been  successfully updated");


    }


}
