<?php
/*
 * Mr. Umesh Kumar Yadav
 * Business With Technology Pvt. Ltd.
 * Kathmandu-32 (Subidhanagar, Tinkune), Nepal
 * +977-9868156047
 * freelancerumeshnepal@gmail.com
 * https://codecanyon.net/item/unlimited-edu-firm-school-college-information-management-system/21850988
 */
/**
 * Created by PhpStorm.
 * User: Umesh Kumar Yadav
 * Date: 03/03/2018
 * Time: 7:05 PM
 */
namespace App\Http\Controllers\Examination;

use App\Http\Controllers\CollegeBaseController;
use App\Models\Exam;
use App\Models\ExamMarkLedger;
use App\Models\ExamSchedule;
use App\Models\Faculty;
use App\Models\Month;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use URL;

class ExamMarkLedgerController extends CollegeBaseController
{
    protected $base_route = 'exam.mark-ledger';
    protected $view_path = 'examination.mark-ledger';
    protected $panel = 'Exam Mark Ledger';
    protected $filter_query = [];

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $data = [];

        \Artisan::call('view:clear');
        \Artisan::call('cache:clear');


        $year = $request->get('year');
        $month = $request->get('month');
        $exam = $request->get('exam');
        $faculty = $request->get('faculty');
        $semester = $request->get('semester');
        $subject = $request->get('subject');

        if($year && $month && $exam && $faculty && $semester && $subject) {
            $examScheduleCondition = [
                ['years_id', '=', $year],
                ['months_id', '=', $month],
                ['exams_id', '=', $exam],
                ['faculty_id', '=', $faculty],
                ['semesters_id', '=', $semester],
                ['subjects_id', '=', $subject]
            ];

            /*Find Exam Schedule Id*/
            $examScheduleId = ExamSchedule::select('id')
                ->where($examScheduleCondition)
                ->get();
            $examScheduleId = $examScheduleId->pluck('id')->all();

            $data['ledger_exist'] = ExamMarkLedger::select('exam_mark_ledgers.exam_schedule_id', 'exam_mark_ledgers.students_id',
                'exam_mark_ledgers.obtain_mark_theory','exam_mark_ledgers.ca_test1', 'exam_mark_ledgers.ca_test2','exam_mark_ledgers.assign','exam_mark_ledgers.class_exe','exam_mark_ledgers.affective','exam_mark_ledgers.physc', 'exam_mark_ledgers.total','exam_mark_ledgers.obtain_mark_practical', 'exam_mark_ledgers.absent_theory','exam_mark_ledgers.absent_practical',
                'exam_mark_ledgers.status', 's.id as student_id', 's.reg_no', 's.first_name', 's.middle_name', 's.last_name',
                's.last_name')
                ->where('exam_mark_ledgers.exam_schedule_id', $examScheduleId)
                ->join('students as s', 's.id', '=', 'exam_mark_ledgers.students_id')
                ->get();

        }

        $data['years'] = $this->activeYears();
        $data['months'] = $this->activeMonths();
        $data['exams'] = $this->activeExams();
        $data['faculties'] = $this->activeFaculties();

        $data['url'] = URL::current();
        $data['filter_query'] = $this->filter_query;

        return view(parent::loadDataToView($this->view_path.'.index'), compact('data'));
    }

    public function add(Request $request)
    {
        $data = [];

        $data['years'] = $this->activeYears();
        $data['months'] = $this->activeMonths();
        $data['exams'] = $this->activeExams();
        $data['faculties'] = $this->activeFaculties();

        $data['url'] = URL::current();
        $data['filter_query'] = $this->filter_query;
        return view(parent::loadDataToView($this->view_path.'.add'), compact('data'));
    }

    public function store(Request $request)
    {
        $response = [];
        $response['error'] = true;
        $year = $request->get('years_id');
        $month = $request->get('months_id');
        $exam = $request->get('exams_id');
        $faculty = $request->get('faculty');
        $semester = $request->get('semester_select');
        $subject = $request->get('schedule_subject');

        /*For Mark Schedule*/
        $examScheduleCondition = [
            ['years_id', '=' , $year],
            ['months_id', '=' , $month],
            ['exams_id', '=' , $exam],
            ['faculty_id', '=' , $faculty],
            ['semesters_id', '=' , $semester],
            ['subjects_id', '=' , $subject],
        ];

        /*Find Exam Schedule Id*/
        $examScheduleId = ExamSchedule::select('id')->where($examScheduleCondition)->first();

        if($request->has('students_id')) {
            foreach ($request->get('students_id') as $key => $student) {

                if($request->has('absent_theory') && in_array($student, $request->get('absent_theory'))) {
                    $trAbsentStudent = 1;
                }else {
                    $trAbsentStudent = 0;
                }

                if($request->has('absent_practical') && in_array($student, $request->get('absent_practical'))) {
                    $prAbsentStudent = 1;
                }else {
                    $prAbsentStudent = 0;
                }

                /*Ledger Already Exist*/
                $ledgerWhere = [
                    ['exam_schedule_id','=',$examScheduleId->id],
                    ['students_id','=', $student]
                ];
                $ledgerExist = ExamMarkLedger::select('id')->where($ledgerWhere)->first();

                if ($ledgerExist) {
                    /*Update Already Register Mark Ledger*/

                   
                    
                    //dd($total , $request->all());

                    $ledgerUpdate = [
                        'exam_schedule_id' => $examScheduleId->id,
                        'students_id' => $student,
                        'ca_test1' => $request->get('ca_test1')[$key]?$request->get('ca_test1')[$key]:0,
                        'ca_test2' => $request->get('ca_test2')[$key]?$request->get('ca_test2')[$key]:0,
                        'assign' => $request->get('assign')[$key]?$request->get('assign')[$key]:0,
                        'class_exe' => $request->get('class_exe')[$key]?$request->get('class_exe')[$key]:0,
                        'affective' => $request->get('affective')[$key]?$request->get('affective')[$key]:0,
                        'physc' => $request->get('physc')[$key]?$request->get('physc')[$key]:0,
                        'total' => $request->get('total')[$key]?$request->get('total')[$key]:0,
                        'obtain_mark_theory' => $request->get('obtain_mark_theory')[$key]?$request->get('obtain_mark_theory')[$key]:0,
                       // 'obtain_mark_practical' => $request->get('obtain_mark_practical')[$key]?$request->get('obtain_mark_practical')[$key]:0,
                        
                        'absent_theory' => $trAbsentStudent,
                        'absent_practical' => $prAbsentStudent,
                        'sorting_order' => $key+1,
                        'last_updated_by' => auth()->user()->id
                    ];

                    $ledgerExist->update($ledgerUpdate);

                    $request->session()->flash($this->message_success, $this->panel. ' Update Successfully.');

                }else{
                    /*Schedule When Not Scheduled Yet*/



                    ExamMarkLedger::create([
                        'exam_schedule_id' => $examScheduleId->id,
                        'students_id' => $student,
                        'ca_test1' => $request->get('ca_test1')[$key]?$request->get('ca_test1')[$key]:0,
                        'ca_test2' => $request->get('ca_test2')[$key]?$request->get('ca_test2')[$key]:0,
                        'assign' => $request->get('assign')[$key]?$request->get('assign')[$key]:0,
                        'class_exe' => $request->get('class_exe')[$key]?$request->get('class_exe')[$key]:0,
                        'affective' => $request->get('affective')[$key]?$request->get('affective')[$key]:0,
                        'physc' => $request->get('physc')[$key]?$request->get('physc')[$key]:0,
                        'total' => $request->get('total')[$key]?$request->get('total')[$key]:0,
                         'obtain_mark_theory' => $request->get('obtain_mark_theory')[$key]?$request->get('obtain_mark_theory')[$key]:0,
                        //'obtain_mark_practical' => $request->get('obtain_mark_practical')[$key]?$request->get('obtain_mark_practical')[$key]:0,
                        'absent_theory' => $trAbsentStudent,
                        'absent_practical' => $prAbsentStudent,
                        'sorting_order' => $key+1,
                        'created_by' => auth()->user()->id,
                    ]);

                }
            }
            $request->session()->flash($this->message_success, $this->panel. ' Manage Successfully.');
        }else{
            $request->session()->flash($this->message_warning, 'You Have No Manage Student Mark Yet, Mark Ledger Not Manage. ');
        }

        if($request->add_markledger_another) {
            return back();
        }else{
            return redirect()->route($this->base_route);
        }
    }

    public function delete(Request $request, $exam=null, $student=null)
    {

        $row = ExamMarkLedger::where([
            ['exam_schedule_id', '=' , $exam],
            ['students_id', '=' , $student]
        ])->first();

        if (!$row) return parent::invalidRequest();

       $row->delete();

        $request->session()->flash($this->message_success, $this->panel.' Deleted Successfully.');
        return redirect()->route($this->base_route);
    }

    public function active(Request $request, $exam=null, $student=null)
    {

        $row = ExamMarkLedger::where([
            ['exam_schedule_id', '=' , $exam],
            ['students_id', '=' , $student]
        ])->first();

        if (!$row) return parent::invalidRequest();

        $row->update([
            'status' => 1
        ]);

        $request->session()->flash($this->message_success, $this->panel.' Active Successfully.');
        return redirect()->route($this->base_route);
    }

    public function inActive(Request $request, $exam=null, $student=null)
    {

        $row = ExamMarkLedger::where([
            ['exam_schedule_id', '=' , $exam],
            ['students_id', '=' , $student]
            ])->first();

        if (!$row) return parent::invalidRequest();

        $row->update([
            'status' => 0
        ]);

        $request->session()->flash($this->message_success, $this->panel.' In-Active Successfully.');
        return redirect()->route($this->base_route);
    }

    public function findSubject(Request $request)
    {
        $row = ExamSchedule::where([
                    ['years_id', '=' , $request->get('years_id')],
                    ['months_id', '=' , $request->get('months_id')],
                    ['exams_id', '=' , $request->get('exams_id')],
                    ['faculty_id', '=' , $request->get('faculty_id')],
                    ['semesters_id', '=' , $request->get('semester_id')],
                 ])
                ->get();

        /*Get Subjects Ids as Arrays*/
        $existSubject = $row->pluck('subjects_id')->all();

        /*Find Subject Title with associated Ids*/
        if(auth()->user()->role_id == 5){
            $subjects = Subject::select('id','title')->whereIn('id',$existSubject)->where('staff_id',auth()->user()->hook_id)->get();
        }else{
            $subjects = Subject::select('id','title')->whereIn('id',$existSubject)->get();
        }


        if ($subjects->count() > 0) {

            $response['subjects'] = $subjects;
            $response['success'] = 'Scheduled Subject Get, Choose For Manage Mark.';
        }else {
            $response['error'] = 'No Any Subject Or you have not the permission. Please Schedule First.';
        }

        return response()->json(json_encode($response));
    }

    public function studentHtmlRow(Request $request)
    {

       
        $response = [];
        $response['error'] = true;
        $year = $request->get('years_id');
        $month = $request->get('months_id');
        $exam = $request->get('exams_id');
        $faculty = $request->get('faculty_id');
        $semester = $request->get('semester_id');
        $subject = $request->get('subject_id');

        /*For Student List*/
        $studentCondition = [['faculty', '=' , $faculty], ['semester', '=' , $semester] ];

        /*For Mark Schedule*/
        $examScheduleCondition = [
            ['years_id', '=' , $year],
            ['months_id', '=' , $month],
            ['exams_id', '=' , $exam],
            ['faculty_id', '=' , $faculty],
            ['semesters_id', '=' , $semester],
            ['subjects_id', '=' , $subject]
        ];

        /*Find Exam Schedule Id*/
        $examScheduleId = ExamSchedule::select('id')
                ->where($examScheduleCondition)
                ->get();
        $examScheduleId  = $examScheduleId->pluck('id')->all();

        if($examScheduleId){
            $ledgerExist = ExamMarkLedger::select('exam_mark_ledgers.exam_schedule_id',
                'exam_mark_ledgers.students_id',
                'exam_mark_ledgers.obtain_mark_theory',
                'exam_mark_ledgers.obtain_mark_practical',
                'exam_mark_ledgers.absent_theory',
                'exam_mark_ledgers.ca_test1', 
                'exam_mark_ledgers.ca_test2',
                'exam_mark_ledgers.assign',
                'exam_mark_ledgers.class_exe',
                'exam_mark_ledgers.affective',
                'exam_mark_ledgers.physc', 
                'exam_mark_ledgers.total', 
                'exam_mark_ledgers.absent_practical',
                's.id as student_id','s.reg_no','s.first_name','s.middle_name','s.last_name')
                ->where('exam_mark_ledgers.exam_schedule_id',$examScheduleId)
                ->join('students as s','s.id','=','exam_mark_ledgers.students_id')
                ->get();

            /*get ledger exist student id*/
            $existStudentId  = $ledgerExist->pluck('students_id')->all();

            //Get Active Student For Related Faculty and Semester
            $activeStudent = Student::select('id','reg_no','first_name','middle_name','last_name')
                ->where($studentCondition)
                ->whereNotIn('id',$existStudentId)
                ->Active()
                ->orderBy('id','asc')
                ->get();


            if($activeStudent) {
                /*filter absent student*/
                $trAbsentStudent =  $ledgerExist->filter(function ($item)
                {
                    return $item->absent_theory == 1;
                });
                /*get Absent student id*/
                $trAbsentStudent  = $trAbsentStudent->pluck('students_id')->all();

                $prAbsentStudent =  $ledgerExist->filter(function ($item)
                {
                    return $item->absent_practical == 1;
                });
                /*get Absent student id*/
                $prAbsentStudent  = $prAbsentStudent->pluck('students_id')->all();



                if($ledgerExist){
                    $response['error'] = false;

                    $response['exist'] = view($this->view_path.'.includes.student_tr_rows', [
                        'exist' => $ledgerExist,
                        'absent_theory' => $trAbsentStudent,
                        'absent_practical' => $prAbsentStudent
                    ])->render();

                    $response['students'] = view($this->view_path.'.includes.student_tr', [
                        'students' => $activeStudent
                    ])->render();

                    $response['message'] = 'Active Students Found. Please, Manage Mark.';
                }else{
                    $response['error'] = false;

                    $response['students'] = view($this->view_path.'.includes.student_tr', [
                        'students' => $activeStudent
                    ])->render();

                    $response['message'] = 'Active Students Found. Please, Manage Mark.';
                }
            }else{
                $response['error'] = 'No Any Active Students in This Faculty/Semester.';
            }
        }else{
            $response['error'] = 'Exam Not Scheduled. Please Schedule First';
        }


        return response()->json(json_encode($response));
    }

    /**
     * Bulk upload result - show import form
     */
    public function importResult(Request $request)
    {
        $data = [];
        $data['years'] = $this->activeYears();
        $data['months'] = $this->activeMonths();
        $data['exams'] = $this->activeExams();
        $data['faculties'] = $this->activeFaculties();
        $data['url'] = URL::current();
        $data['filter_query'] = $this->filter_query;
        return view(parent::loadDataToView($this->view_path . '.import'), compact('data'));
    }

    /**
     * Process bulk upload CSV
     */
    public function handleImportResult(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:2048',
            'years_id' => 'required|exists:years,id',
            'months_id' => 'required|exists:months,id',
            'exams_id' => 'required|exists:exams,id',
            'faculty' => 'required|exists:faculties,id',
            'semester_select' => 'required|exists:semesters,id',
            'schedule_subject' => 'required|exists:subjects,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $examScheduleCondition = [
            ['years_id', '=', $request->years_id],
            ['months_id', '=', $request->months_id],
            ['exams_id', '=', $request->exams_id],
            ['faculty_id', '=', $request->faculty],
            ['semesters_id', '=', $request->semester_select],
            ['subjects_id', '=', $request->schedule_subject],
        ];

        $examSchedule = ExamSchedule::where($examScheduleCondition)->first();
        if (!$examSchedule) {
            return redirect()->back()->with($this->message_warning, 'Exam not scheduled for the selected criteria. Please schedule the exam first.')->withInput();
        }

        $file = $request->file('file');
        $csvData = file_get_contents($file->getRealPath());
        $csvData = preg_replace('/^\xEF\xBB\xBF/', '', $csvData); // Remove BOM if present
        $rows = array_map('str_getcsv', explode("\n", $csvData));
        $header = array_shift($rows);

        if (!$header || !in_array('reg_no', $header)) {
            return redirect()->back()->with($this->message_warning, 'Invalid CSV format. First row must contain header with "reg_no" column.')->withInput();
        }

        $imported = 0;
        $skipped = 0;
        $errors = [];

        foreach ($rows as $rowIndex => $row) {
            if (count($row) < count($header)) {
                $row = array_pad($row, count($header), '');
            }
            if (count($row) != count($header)) {
                continue;
            }

            $row = array_combine($header, $row);
            $regNo = trim($row['reg_no'] ?? '');
            if (empty($regNo)) {
                continue;
            }

            $student = Student::where('reg_no', $regNo)
                ->where('faculty', $request->faculty)
                ->where('semester', $request->semester_select)
                ->first();

            if (!$student) {
                $skipped++;
                $errors[] = "Row " . ($rowIndex + 2) . ": Student with Reg.No. {$regNo} not found.";
                continue;
            }

            $absentTheory = isset($row['absent_theory']) && in_array(strtoupper(trim($row['absent_theory'])), ['1', 'Y', 'YES', 'A', 'ABSENT']) ? 1 : 0;
            $absentPractical = isset($row['absent_practical']) && in_array(strtoupper(trim($row['absent_practical'])), ['1', 'Y', 'YES', 'A', 'ABSENT']) ? 1 : 0;

            $caTest1 = (int) ($row['ca_test1'] ?? 0);
            $caTest2 = (int) ($row['ca_test2'] ?? 0);
            $assign = (int) ($row['assign'] ?? 0);
            $classExe = (int) ($row['class_exe'] ?? 0);
            $affective = (int) ($row['affective'] ?? 0);
            $physc = (int) ($row['physc'] ?? 0);
            $obtainMarkTheory = (int) ($row['obtain_mark_theory'] ?? 0);
            $obtainMarkPractical = (int) ($row['obtain_mark_practical'] ?? 0);
            $total = isset($row['total']) && $row['total'] !== '' ? (int) $row['total'] : ($caTest1 + $caTest2 + $assign + $classExe + $affective + $physc + $obtainMarkTheory);

            $ledgerWhere = [
                ['exam_schedule_id', '=', $examSchedule->id],
                ['students_id', '=', $student->id],
            ];
            $ledgerExist = ExamMarkLedger::where($ledgerWhere)->first();

            $ledgerData = [
                'exam_schedule_id' => $examSchedule->id,
                'students_id' => $student->id,
                'ca_test1' => $caTest1,
                'ca_test2' => $caTest2,
                'assign' => $assign,
                'class_exe' => $classExe,
                'affective' => $affective,
                'physc' => $physc,
                'obtain_mark_theory' => $obtainMarkTheory,
                'obtain_mark_practical' => $obtainMarkPractical,
                'total' => $total,
                'absent_theory' => $absentTheory,
                'absent_practical' => $absentPractical,
                'sorting_order' => $imported + 1,
            ];

            if ($ledgerExist) {
                $ledgerData['last_updated_by'] = auth()->id();
                $ledgerExist->update($ledgerData);
            } else {
                $ledgerData['created_by'] = auth()->id();
                ExamMarkLedger::create($ledgerData);
            }
            $imported++;
        }

        $message = "{$imported} result(s) imported successfully.";
        if ($skipped > 0) {
            $message .= " {$skipped} row(s) skipped.";
        }
        if (count($errors) > 0 && count($errors) <= 5) {
            $message .= ' ' . implode(' ', array_slice($errors, 0, 5));
        } elseif (count($errors) > 5) {
            $message .= ' First 5 errors: ' . implode(' ', array_slice($errors, 0, 5));
        }

        $request->session()->flash($imported > 0 ? $this->message_success : $this->message_warning, $message);
        return redirect()->route($this->base_route);
    }

}