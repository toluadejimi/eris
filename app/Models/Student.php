<?php

namespace App\Models;

class Student extends BaseModel
{
    protected $fillable = ['created_by', 'hospital_doctor_name', 'doc_phone', 'pick_image', 'pick2_image', 'written_instructions','hospital_address', 'relative_name',   'pick_phone_2',  'relative_no', 'pick_phone', 'pick_child', 'pick_child_2', 'body_max', 'child_name_consent', 'physical_activities_reasons', 'physical_activities', 'dietary_needs', 'hospital_address', 'medications', 'program_condition', 'other_information', 'weight', 'health_issues', 'other_health_issues', 'photo_publicity', 'emergency_relationship', 'challenges', 'hear_about_us', 'emergency_name', 'emergency_contact', 'last_updated_by', 'name_of_scholar_3', 'date_of_scholar_birth_3', 'reg_no', 'reg_date', 'university_reg', 'state_of_origin', 'lga', 'to_date_2', 'name_of_school', 'date_of_scholar_birth', 'year_group', 'name_of_scholar_2', 'date_of_scholar_birth_2', 'year_group_2', '', 'from_date', 'from_date_2', 'name_of_scholar', 'to_date', 'name_of_school_2', 'faculty', 'semester', 'batch',
        'academic_status', 'first_name', 'genotype', 'emergency_name_2', 'emergency_relationship_2', 'emergency_contact_2', 'middle_name', 'last_name', 'height', 'date_of_birth', 'gender', 'blood_group', 'nationality',
        'religion', 'caste', 'mother_tongue', 'email', 'extra_info', 'student_image', 'student_signature', 'status'];

    public function address()
    {
        return $this->hasOne(Addressinfo::class, 'students_id', 'id');
    }

    public function parents()
    {
        return $this->hasOne(ParentDetail::class, 'students_id', 'id');
    }

    public function guardian()
    {
        return $this->hasOne(StudentGuardian::class, 'students_id', 'id');
    }

    /* public function guardian()
    {
    return $this->belongsTo(StudentGuardian::class);
    }*/

    public function academicInfo()
    {
        return $this->hasMany(AcademicInfo::class, 'students_id', 'id');
    }

    public function studentNotes()
    {
        return $this->hasMany(Note::class, 'member_id', 'id')->where('member_type', '=', 'student');
    }

    public function studentDocuments()
    {
        return $this->hasMany(Document::class, 'member_id', 'id')->where('member_type', '=', 'student');
    }

    public function feeMaster()
    {
        return $this->hasMany(FeeMaster::class, 'students_id', 'id');
    }

    public function feeCollect()
    {
        return $this->hasMany(FeeCollection::class, 'students_id', 'id');
    }

    public function markLedger()
    {
        return $this->hasMany(ExamMarkLedger::class, 'students_id', 'id');
    }

    //assignment Answer
    public function assignmentAnswers()
    {
        return $this->hasMany(AssignmentAnswer::class, 'students_id', 'id');

    }

    //Library Member
    public function libraryMember()
    {
        return $this->hasMany(LibraryMember::class, 'member_id', 'id')->where('user_type', '=', 1);
    }

    //Library Book Requested by Member
    /*public function bookRequest()
    {
    return $this->hasMany(BookRequest::class,'member_id','id');
    }*/

    //transport User
    public function transportUser()
    {
        return $this->hasMany(TransportUser::class, 'member_id', 'id')->where('user_type', '=', 1);
    }

    //Hostel Resident
    public function hostelResident()
    {
        return $this->hasMany(Resident::class, 'member_id', 'id')->where('user_type', '=', 1);
    }

    //Regular Attendance
    public function regularAttendance()
    {
        return $this->hasMany(Attendance::class, 'link_id', 'id')->where('attendees_type', '=', 1);
    }

    //Regular Attendance
    public function subjectAttendance()
    {
        return $this->hasMany(SubjectAttendance::class, 'link_id', 'id');
    }

    //certificates
    public function certificateHistory()
    {
        return $this->hasMany(CertificateHistory::class, 'students_id', 'id');
    }

    public function attendanceCertificate()
    {
        return $this->hasOne(AttendanceCertificate::class, 'students_id', 'id');
    }

    public function transferCertificate()
    {
        return $this->hasOne(TransferCertificate::class, 'students_id', 'id');
    }

    public function characterCertificate()
    {
        return $this->hasOne(CharacterCertificate::class, 'students_id', 'id');
    }

    public function bonafideCertificate()
    {
        return $this->hasOne(BonafideCertificate::class, 'students_id', 'id');
    }

    public function courseCompletionCertificate()
    {
        return $this->hasOne(CourseCompletionCertificate::class, 'students_id', 'id');
    }

}
