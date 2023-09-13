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
        "max"=>"10",'step'=>'any']) !!}
    </td>
    <td>
        {!! Form::number('obtain_mark_theory[]', $student->obtain_mark_theory, ["id"=> "obtain_mark_theory", "class" => "form-control border-form
        totalCal expenses", "input", "min"=>"0", "max"=>"40",'step'=>'any']) !!}
    </td>


    <td>
        {!! Form::number('total[]', $student->total, ["id"=> "result",  "value"=> "total", "class" => "form-control border-form expenses_sum","min"=>"0",
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

</script>






@endforeach