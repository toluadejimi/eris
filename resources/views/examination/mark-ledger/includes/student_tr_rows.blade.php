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
        totalCal", "input", "min"=>"0","max"=>"15",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('ca_test2[]', $student->ca_test2, ["id"=> "ca_test2", "class" => "form-control border-form
        totalCal", "input", "min"=>"0","max"=>"15",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('assign[]', $student->assign, ["id"=> "assign", "class" => "form-control border-form
        totalCal", "input", "min"=>"0","max"=>"4",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('class_exe[]', $student->class_exe, ["id"=> "class_exe","class" => "form-control border-form totalCal", "input","min"=>"0",
        "max"=>"6",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('affective[]', $student->affective, ["id"=> "affective", "class" => "form-control border-form totalCal", "input", "min"=>"0",
        "max"=>"10",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('physc[]', $student->physc, ["id"=> "physc", "class" => "form-control border-form totalCal","input","min"=>"0",
        "max"=>"10",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('obtain_mark_theory[]', $student->obtain_mark_theory, ["id"=> "obtain_mark_theory", "class" => "form-control border-form
        totalCal", "input", "min"=>"0", "max"=>"40",'step'=>'any']) !!}
    </td>


    <td>
        {!! Form::number('total[]', $student->total, ["id"=> "result",  "value"=> "total", "class" => "form-control border-form","min"=>"0",
        "max"=>"100", "result", 'step'=>'any']) !!}
    </td>





    <td>
        <div class="btn-group">
            <label class="btn btn-xs btn-danger" onclick="$(this).closest('tr').remove();">
                <i class="ace-icon fa fa-trash-o bigger-120"></i>
            </label>
        </div>
    </td>
</tr>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">


$('input').keyup(function() { // run anytime the value changes
                var ca_test1 = Number($('#ca_test1').val()); // get value of field
                var ca_test2 = Number($('#ca_test2').val()); // get value of field
                var assign =   Number($('#assign').val()); // convert it to a float
                var affective = Number($('#affective').val()); // get value of field
                var physc = Number($('#physc').val()); // get value of field
                var obtain_mark_theory = Number($('#obtain_mark_theory').val()); // convert it to a float


                document.getElementById('result').value = Math.round(ca_test1+ca_test2+assign+affective+physc+obtain_mark_theory);
                // add them and output it
});


numbers.forEach(number => {
  number.addEventListener('input', calculate);
});

console.log(results);

</script>






@endforeach