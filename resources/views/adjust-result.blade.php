<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>


<div class="container">

    <div class="row">

   
      



    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif


    <div class="col-6">
        <input id="myInput" class="form-control my-2" type="text" placeholder="Search..">
    </div>


    <div class="mt-4">
        <table class="table responsive">

            <thead>

                <tr>

                    <th>Exam ID</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>1ST CA (15 Marks)</th>
                    <th>2ND CA (15 Marks)</th>
                    <th>ASSIGNMENT(4 Marks)</th>
                    <th>CLASS EXERCISE (6 Marks)</th>
                    <th>PSYCHOMOTOR (10 Marks)</th>
                    <th>EXAM (40 MARKS)</th>
                    <th>TOTAL MARK (100 MARKS)</th>
                    <th>Action</th>


                    




                </tr>

            </thead>

            <tbody id="myTable">

                @foreach($exam as $user)


                @php
                $f_name = \App\Models\Student::where('id',$user->students_id)->first()->first_name;
                $l_name = \App\Models\Student::where('id',$user->students_id)->first()->last_name;
                $l_name = \App\Models\Student::where('id',$user->students_id)->first()->middle_name;
                $faculty = \App\Models\Student::where('id',$user->students_id)->first()->faculty;
                $class = \App\Models\Faculty::where('id', $faculty )->first()->faculty;
      
                @endphp

                <tr>

                    <td>{{ $user->id }}</td>
                    <td>{{ $f_name }} {{ $m_name }} {{ $l_name  }} </td>
                    <td>{{ $class }}</td>
                    <td>{{ $user->obtain_mark_theory }}</td>
                    <td>{{ $user->ca_test1 }}</td>
                    <td>{{ $user->ca_test2 }}</td>
                    <td>{{ $user->assign }}</td>
                    <td>{{ $user->class_exe }}</td>
                    <td>{{ $user->physc }}</td>
                    <td>{{ $user->total }}</td>


                    <td>

                        <p id="demo"></p>

                       
                    </td>


                    <td>
                        <div class="col-lg-12">
                            <form method="POST" action="/public/delete-exam?id={{ $user->id }}">
                                @csrf
                                @method('POST')

                                <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                            </form>
                        </div>
                    </td>


                    
                    </td>


                </tr>

                @endforeach

            </tbody>

        </table>

    </div>






</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


</html>