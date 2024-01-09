@foreach($exist as $student)
<tr class="option_value hours-table" style="background:lightgrey">
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
<<<<<<< HEAD
        totalCal expenses", "input", "min"=>"0","max"=>"15",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('ca_test2[]', $student->ca_test2, ["id"=> "ca_test2", "class" => "form-control border-form
        totalCal expenses", "input", "min"=>"0","max"=>"15",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('assign[]', $student->assign, ["id"=> "assign", "class" => "form-control border-form
        totalCal expenses", "input", "min"=>"0","max"=>"4",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('class_exe[]', $student->class_exe, ["id"=> "class_exe","class" => "form-control border-form totalCal expenses", "input","min"=>"0",
        "max"=>"6",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('affective[]', $student->affective, ["id"=> "affective", "class" => "form-control border-form totalCal expenses", "input", "min"=>"0",
        "max"=>"10",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('physc[]', $student->physc, ["id"=> "physc", "class" => "form-control border-form totalCal expenses","input","min"=>"0",
=======
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
>>>>>>> 9b052df5 (pushhh)
        "max"=>"10",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('obtain_mark_theory[]', $student->obtain_mark_theory, ["id"=> "obtain_mark_theory", "class" => "form-control border-form
<<<<<<< HEAD
        totalCal expenses", "input", "min"=>"0", "max"=>"40",'step'=>'any']) !!}
=======
        totalCal","min"=>"0", "max"=>"40",'step'=>'any']) !!}
>>>>>>> 9b052df5 (pushhh)
    </td>


    <td>
<<<<<<< HEAD
        {!! Form::number('total[]', $student->total, ["id"=> "result",  "value"=> "total", "class" => "form-control border-form expenses_sum","min"=>"0",
        "max"=>"100", "result", 'step'=>'any']) !!}
=======
        {!! Form::number('total[]', $student->total, ["id"=> "total",  "value"=> "total", "class" => "form-control border-form","min"=>"0",
        "max"=>"100",'step'=>'any']) !!}
>>>>>>> 9b052df5 (pushhh)
    </td>





    <td>
        <div class="btn-group">
            <label class="btn btn-xs btn-danger" onclick="$(this).closest('tr').remove();">
                <i class="ace-icon fa fa-trash-o bigger-120"></i>
            </label>
        </div>
    </td>
</tr>


<<<<<<< HEAD
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  


    $(document).ready(function() {
        $(".expenses").on('keyup change', calculateSum);
      });
      
      function calculateSum() {
        var $input = $(this);
        var $row = $input.closest('tr');
        var sum = 0;
      
        $row.find(".expenses").each(function() {
          sum += parseFloat(this.value) || 0;
        });
      
        $row.find(".expenses_sum").val(sum);
      }



</script>
=======
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

    $('input').keyup(function() { // run anytime the value changes
        var ca_test1 = Number($('#ca_test1').val()); // get value of field
        var ca_test2 = Number($('#ca_test2').val()); // get value of field
        var assign = Number($('#assign').val()); // get value of field
        var class_exe = Number($('#class_exe').val()); // get value of field 
        var affective = Number($('#affective').val()); // get value of field
        var physc = Number($('#physc').val()); // get value of field 
        var obtain_mark_theory = Number($('#obtain_mark_theory').val()); // get value of field 


        document.getElementById('total').value = ca_test1 + ca_test2 + assign + class_exe +  affective + physc + obtain_mark_theory;
        // add them and output it


        console.log('total');
    });

>>>>>>> 9b052df5 (pushhh)

</script>



@endforeach