<table width="100%" class="table table-bordered">
    <tr>
        <td class="text-right">Reg No. : </td>
        <td>{{ $student->reg_no }}</td>

        <td class="text-right">Name : </td>
        <td>{{ $student->first_name.' '.$student->middle_name.' '.$student->last_name }}</td>
        <td class="text-right">Term : </td>
        <td>{{ ViewHelper::getSemesterTitle($term) }}</td>
    </tr>

    <tr>
        <td class="text-right">Class : </td>
        <td>{{ $class }}</td>
        <td class="text-right">Academic Session : </td>
        <td>{{ $year }}</td>
      
    </tr>

    {{-- <tr>
        <td class="text-right">Date of Birth : </td>
        <td>{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d-M-Y') }}</td>
       <td class="text-right">Son/Daughter of : </td>
        <td>{{$student->faculty}}</td>
    </tr> --}}
</table>