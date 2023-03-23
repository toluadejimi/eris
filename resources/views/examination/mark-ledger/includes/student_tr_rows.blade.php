@foreach($exist as $student)
<tr class="option_value" style="background:lightgrey">
    <td>
        <div class="btn-group">
            <label class="btn btn-xs btn-primary">
                <i class="ace-icon fa fa-arrows bigger-120"></i>
            </label>
        </div>
    </td>
    <td>
        <input type="hidden" name="students_id[]" value="{{ $student->student_id }}">
        {{ $student->reg_no }}
    </td>
    <td>
        {{ $student->first_name.' '.$student->middle_name.' '.$student->last_name }}
    </td>

    <td>
        {!! Form::number('ca_test1[]', $student->ca_test1, ["id"=> "ca_test1", "class" => "form-control border-form
        totalCal","min"=>"0","max"=>"15",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('ca_test2[]', $student->ca_test2, ["id"=> "ca_test2", "class" => "form-control border-form
        totalCal","min"=>"0","max"=>"15",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('assign[]', $student->assign, ["id"=> "assign", "class" => "form-control border-form
        totalCal","min"=>"0","max"=>"4",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('class_exe[]', $student->class_exe, ["id"=> "class_exe","class" => "form-control border-form totalCal","min"=>"0",
        "max"=>"6",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('affective[]', $student->affective, ["id"=> "affective", "class" => "form-control border-form totalCal","min"=>"0",
        "max"=>"10",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('physc[]', $student->physc, ["id"=> "physc", "class" => "form-control border-form totalCal","min"=>"0",
        "max"=>"10",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('obtain_mark_theory[]', $student->obtain_mark_theory, ["id"=> "obtain_mark_theory", "class" => "form-control border-form
        totalCal","min"=>"0", "max"=>"40",'step'=>'any']) !!}
    </td>


    <td>
        {!! Form::number('total[]', $student->total, ["id"=> "total",  "value"=> "total", "class" => "form-control border-form","min"=>"0",
        "max"=>"100",'step'=>'any']) !!}
    </td>





    <td>
        <div class="btn-group">
            <label class="btn btn-xs btn-danger" onclick="$(this).closest('tr').remove();">
                <i class="ace-icon fa fa-trash-o bigger-120"></i>
            </label>
        </div>
    </td>
</tr>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>





@endforeach