<?php

namespace App\Http\Controllers;

use App\Models\ExamMarkLedger;
use App\Models\ParentDetail;
use App\Models\Setting;
use App\Models\Student;
use App\Models\StudentExamAccess;
use App\Vacation;
use Illuminate\Http\Request;

class AdjustResultController extends Controller
{
    public function exam_activate(request $req)
    {
        if ($req->status === 1) {
            Student::where('id', $req->id)->update(['fee_status' => 1]);
        } else {
            Student::where('id', $req->id)->update(['fee_status' => 0]);
        }
        return back()->with('success', 'Fee Adjust Successfully');
    }

    /**
     * Toggle exam result visibility per student. When disabled, parent/student sees pay-fee message.
     */
    public function toggleExamVisibility(Request $req)
    {
        $req->validate([
            'student_id' => 'required|integer',
            'year' => 'required|integer',
            'month' => 'required|integer',
            'exam' => 'required|integer',
            'faculty' => 'required|integer',
            'semester' => 'required|integer',
            'visible' => 'required|in:0,1',
        ]);

        StudentExamAccess::updateOrCreate(
            [
                'students_id' => $req->student_id,
                'years_id' => $req->year,
                'months_id' => $req->month,
                'exams_id' => $req->exam,
                'faculty_id' => $req->faculty,
                'semesters_id' => $req->semester,
            ],
            ['visible' => (int) $req->visible]
        );

        return response()->json(['success' => true, 'visible' => (int) $req->visible]);
    }

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
        return back()->with('message', 'Resumption Date updated successfully');

    }

    public function adjust_vacation(request $request)
    {

        Setting::where('id', 1)->update(['vacation_day' => $request->vacation_day]);
        return back()->with('message', 'Vacation Date updated successfully');


    }


    public function delete_vacation(request $request)
    {
        Vacation::where('id', $request->id)->delete();
        return back()->with('message', 'Vacation Date deleted successfully');

    }

    public function set_vacation(request $request)
    {

        $vac = new Vacation();
        $vac->session = $request->year;
        $vac->month = $request->month;
        $vac->vacation_day = $request->vacation_day;
        $vac->resumption_day = $request->resumption_day;
        $vac->save();

        return back()->with('message', 'Vacation Date updated successfully');

    }

    public function index_vacation(request $request)
    {

        $data['vacations'] = Vacation::all();
        return view('vacation', $data);


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
        if ($pd_ck != null) {
            return back()->with('error', "Parent Info already esist");
        }

        $pd = new ParentDetail();
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
