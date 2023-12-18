<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamMarkLedger;
use App\Http\Controllers\Controller;

class AdjustResultController extends Controller
{
    public function adjust_result(){


    
        $data['message'] = null;
        $data['exam'] = ExamMarkLedger::where('total', 0)->get();

        return view('adjust-result',$data);



    }



    public function delete_exam(request $request){


        $exam = ExamMarkLedger::where('id', $request->id)->delete();
        $data['message'] = "Exam has been successfully deleted";
        $data['exam'] = ExamMarkLedger::where('total', 0)->get();


        return view('adjust-result',$data);


    }


}
