<?php

namespace App\Http\Controllers;

use App\Models\ExamMarkLedger;
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


}
